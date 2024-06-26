<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'title', 'image', 'status','publisher_id'
    ];
    //protected $primaryKey = 'favorites';
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id','id');
    }
 

}
