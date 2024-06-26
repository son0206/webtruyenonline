<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Publisher extends Authenticatable
{
    use HasFactory;

    public $timestamps = false; //set time to false
    protected $fillable = [
    	'username','password', 'email','fullname' ,'sdt',
    ];
 
}
