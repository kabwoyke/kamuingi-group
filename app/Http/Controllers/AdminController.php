<?php

namespace App\Http\Controllers;

use App\Models\Deceased;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function render_dashboard_page(){
        $members = Member::all();
        $deceased_members = Member::where('status' , 'dead')->get();
        return view('admin.dashboard' , ['members_count' => count($members) , 'deceased_count' => count($deceased_members)]);
    }

    public function render_deceased_form(){
        return view('admin.deacesed-form');
    }

    public function add_deceased(Request $request, $id){

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

            $member = Member::where('id' , $id)->first();
            $member->update(['status' => "dead"]);


            DB::commit();

            return redirect("/admin");




        } catch (\Throwable $th) {

            report($th);

            DB::rollBack();

            throw $th;
        }

    }

    public function mark_deceased(Request $request, $id){
        $member = Member::where('id' , $id)->first();
        // $member->update(['status' => "dead"]);
        // return redirect()->back();

        return view('admin.deacesed-form' , ['member' => $member]);
    }

    public function render_update_form(Request $request , $id){
        $status = ['active' , 'penalized' , 'dead'];
        $member = Member::where('id' , $id)->first();
        return view('admin.members.edit' , ['member' => $member , 'status' => $status]);
    }

    public function update(Request $request , $id){

        $validatedMember = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
            'id_number' => 'required|string',
            'total_missed_donation' => 'required|string',
            'status' => 'required|string'
        ]);



        $member = Member::where('id' , $id)->first();

        $member->update($validatedMember);

        return redirect("/admin");
    }

    public function render_member_details_page($id){
        $member = Member::where('id' , $id)->first();
        return view('admin.members.show' , ['member' => $member]);
    }
}
