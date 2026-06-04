<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benefeciary extends Model
{
    //

    protected $fillable = [
        'dob',
        'phone_number',
        'physical_address',
        'first_name',
        'middle_name',
        'last_name'
    ];

    public function member() {
        return $this->belongsTo(Member::class);
    }
}
