<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'id_number',
        'status',
        'total_missed_donation'
    ];

    public function scopeSearch($query , $value){
        $query->where('first_name' , 'like' ,"%{$value}%")
                ->orWhere('id_number' , 'like' , "%{$value}%")
                ->orWhere('phone_number' , 'like' , "%{$value}%");
    }
}
