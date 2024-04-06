<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','subject','blog_id','created_at','updated_at'];

    public function blogs(){
        return $this->belongsTo(Blog::class);
    }
}
