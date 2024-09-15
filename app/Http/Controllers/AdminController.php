<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function render_dashboard_page(){
        $members = Member::all();
        return view('admin.dashboard' , ['members_count' => count($members)]);
    }

    public function render_deceased_form(){
        return view('admin.deacesed-form');
    }

    public function mark_deceased(Request $request, $id){
        $member = Member::where('id' , $id)->first();
        $member->update(['status' => "dead"]);
        return redirect()->back();
    }

    public function render_update_form(Request $request , $id){
        $member = Member::where('id' , $id)->first();
        return view('admin.members.edit' , ['member' => $member]);
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
}
