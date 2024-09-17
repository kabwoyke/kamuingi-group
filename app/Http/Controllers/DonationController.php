<?php

namespace App\Http\Controllers;

use App\Models\Deceased;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    //

    public function render_donation_form(){
        return view('admin.donations.new');
    }

    public function render_donations_page(){

        return view('admin.donations.index');
    }
}
