<?php

namespace App\Http\Controllers;

use App\Models\Deceased;
use App\Models\Donation;
use App\Models\Member;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    //

    public function render_donation_form($deceasedId){

        return view('admin.donations.new' , ['deceasedId' => $deceasedId]);
    }

    public function render_donations_page(){

        return view('admin.donations.index');
    }

    public function search($query){
        $members = Member::where('id_number', 'like' , "%{$query}%")
        ->orWhere('first_name' , 'like' , "%{$query}%")
        ->orWhere('last_name' , 'like' , "%{$query}%")
        ->orWhere('member_number' , 'like' , "%{$query}%")
        ->get();
        return response()->json($members);
    }

    public function store_donation(Request $request,$deceasedId){

        $validatedDonation = $request->validate([
            'amount' => 'required|integer',
            'member_number' => 'required|string',
            'date' => 'required|date'
        ]);

        $member = Member::where('member_number' , $validatedDonation['member_number'])->first();

        if(!$member){
            return redirect()->back()->with('invalid_member_number' , 'The member number is invalid');
        }

        Donation::create([
            'memberId' => $member->id,
            'deceasedId' => $deceasedId,
            'amount' => $validatedDonation['amount'],
            'date' => $validatedDonation['date']
        ]);
        return redirect('/admin/donations');


    }

    public function render_donation_progress($deceasedId){
        $donations = Donation::where('deceasedId' , $deceasedId)->get();
        $total = 0;

        foreach($donations as $donation){
            $total = $total + $donation->amount;
        }
        return view('admin.donations.show-donation' , ['deceasedId' => $deceasedId , 'total' => $total]);

    }
}
