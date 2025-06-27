<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone'];

    function getNameAttribute($val){
        return ucfirst($val);
    }

    function getPhoneAttribute($val){
        return "+92".$val;
    }

    function setNameAttribute($val){
       $this->attributes['name'] = ucfirst($val);
    }
    
}