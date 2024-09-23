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
        'total_missed_donation',
        'gender',
        'member_number'
    ];

    public function deceased(){

        return $this->hasMany(Deceased::class);
    }

    public function scopeSearch($query , $value){
        $query->where('first_name' , 'like' ,"%{$value}%")
                ->orWhere('id_number' , 'like' , "%{$value}%")
                ->orWhere('phone_number' , 'like' , "%{$value}%");
    }

    public function scopeActive($query){
        $query->where('status' , '=' ,"active")
              ->orwhere('status' , '=' , "penalized");
    }

    public function scopeFilter($query , $filterBy){
        if($filterBy == 'all'){
            $query->get();
        }else if($filterBy == 'dead'){
            $query->where('status' , '=' ,"dead");
        }else if($filterBy == 'active'){
            $query->where('status' , '=' ,"active");
        }else if($filterBy == 'penalized'){
            $query->where('status' , '=' ,"penalized");
        }else{
            $query->get();
        }
    }
}
