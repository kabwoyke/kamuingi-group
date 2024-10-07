<?php

namespace App\Http\Controllers;

use App\Models\Deceased;
use App\Models\Donation;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class AdminController extends Controller
{
    //
    public function render_dashboard_page()
    {
        $members = Member::all();
        $deceased_members = Member::where('status', 'dead')->get();
        $total_ongoing_donations_total = 0;
        $donations = DB::table('donations')->join('deceased', 'deceased.id', '=', 'donations.deceasedId')
        ->select('deceased.*', 'drive_status' , 'deadline_date' , 'donations.amount')
        ->whereDate('deadline_date' , '>=' , now())
        ->where('drive_status' , '=' , 'ongoing')
        ->get();

        foreach($donations as $donation){
            $total_ongoing_donations_total = $total_ongoing_donations_total + $donation->amount;
        }
        // dd($total_ongoing_donations_total);
        return view('admin.dashboard', ['members_count' => count($members), 'deceased_count' => count($deceased_members) , 'total_ongoing_donations_total' => $total_ongoing_donations_total]);
    }

    public function render_add_member_form()
    {
        return view('admin.members.new');
    }

    public function store_member(Request $request)
    {

        $validatedMember = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
            'id_number' => 'required|string',
            'total_missed_donation' => 'required|string',
            'status' => 'required|string',
            'gender' => 'required|string',
            'member_number' => 'required|string',
        ]);


        try {

            DB::beginTransaction();

            $member = Member::create($validatedMember);

            DB::commit();

            return redirect("/admin");
        } catch (\Throwable $th) {

            report($th);

            DB::rollBack();

            throw $th;
        }
    }

    public function render_deceased_form()
    {
        return view('admin.deacesed-form');
    }

    public function add_deceased(Request $request, $id)
    {

        $validatedMember = $request->validate([
            'death_date' => 'required|date',
            'deadline_date' => 'required|date',
        ]);

        try {
            DB::beginTransaction();
            DB::table('deceased')->insert(
                [
                    'death_date' => $validatedMember['death_date'],
                    'deadline_date' => $validatedMember['deadline_date'],
                    'memberId' => $id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );

            $member = Member::where('id', $id)->first();
            $member->update(['status' => "dead"]);


            DB::commit();

            return redirect("/admin");
        } catch (\Throwable $th) {

            report($th);

            DB::rollBack();

            throw $th;
        }
    }

    public function mark_deceased(Request $request, $id)
    {
        $member = Member::where('id', $id)->first();
        // $member->update(['status' => "dead"]);
        // return redirect()->back();

        return view('admin.deacesed-form', ['member' => $member]);
    }

    public function render_update_form(Request $request, $id)
    {
        $status = ['active', 'penalized', 'dead'];
        $gender = ['MALE', 'FEMALE'];
        $member = Member::where('id', $id)->first();
        return view('admin.members.edit', ['member' => $member, 'status' => $status, 'gender' => $gender]);
    }

    public function update(Request $request, $id)
    {

        $validatedMember = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
            'id_number' => 'required|string',
            'total_missed_donation' => 'required|string',
            'status' => 'required|string',
            'gender' => 'required|string',
            'member_number' => 'required|string'
        ]);



        $member = Member::where('id', $id)->first();

        $member->update($validatedMember);

        return redirect("/admin");
    }

    public function render_member_details_page($id)
    {
        $member = Member::where('id', $id)->first();
        return view('admin.members.show', ['member' => $member]);
    }

    public function delete_member($id)
    {
        $member = Member::where('id', $id)->first();
        $member->delete();
        return redirect("/admin");
    }

    public function export_excel() {
        $members = Member::select('first_name' , 'last_name' , 'member_number' , 'id_number' , 'phone_number')->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'First Name');
        $sheet->setCellValue('B1', 'Last Name');
        $sheet->setCellValue('C1', 'Member Number');
        $sheet->setCellValue('D1', 'ID Number');
        $sheet->setCellValue('E1', 'Phone Number');

        $headerStyle = [
            'font' => [
                'bold' => true,
            ]
        ];

        $sheet->getStyle('A1:E1')->applyFromArray($headerStyle);

        $sheet->getColumnDimension('A')->setWidth(15);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(18);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(15);

         $row = 2;
         foreach ($members as $member) {
             $sheet->setCellValue('A' . $row, $member->first_name);
             $sheet->setCellValue('B' . $row, $member->last_name);
             $sheet->setCellValue('C' . $row, $member->member_number);
             $sheet->setCellValue('D' . $row, $member->id_number);
             $sheet->setCellValue('E' . $row, $member->phone_number);
             $row++;
         }

         $filename = time() .'-members.xlsx';
         $writer = new Xlsx($spreadsheet);
         $temp_file = tempnam(sys_get_temp_dir(), $filename);

        $writer->save($temp_file);

        return response()->download($temp_file, $filename)->deleteFileAfterSend(true);
    }
}
