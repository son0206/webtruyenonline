<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'chapter_id',
        'content',
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class,'user_id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}