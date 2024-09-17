<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deceased extends Model
{
    use HasFactory;

    protected $table = 'deceased';

    protected $fillable = [
        'memberId',
        'death_date',
        'deadline_date'
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
}
