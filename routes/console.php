<?php

use App\Models\Deceased;
use App\Models\Donation;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('donations:complete' , function(){
    // Log::debug("Runned");
   $deceasedMembers = Deceased::where('drive_status', 'ongoing')
   ->whereDate('deadline_date', '<', Carbon::now())
   ->get();



   foreach ($deceasedMembers as $deceased) {

      $donatedMembers = Donation::where('deceasedId', $deceased->id)->pluck('memberId')->toArray();

      $missedMembers = Member::whereNotIn('id', $donatedMembers)
      ->whereNotIn('status' ,['dead' , 'penalized'])
      ->get();


      foreach ($missedMembers as $member) {
          $member->total_missed_donation += 1;

          if ($member->total_missed_donation > 3) {
            $member->status = 'penalized';
        }
          $member->save();
      }
    $deceased->drive_status = 'completed';
    $deceased->save();
}

    print_r($deceasedMembers . "\n");
});


Schedule::command('donation:complete' )->dailyAt('00:00');
