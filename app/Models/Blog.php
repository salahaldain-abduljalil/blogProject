<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['name','description','image','category_id','user_id'];
    use HasFactory;

    public function category(){
        return $this->belongsTO(category::class);
    }
    public function user(){
        return $this->belongsTO(User::class);
    }
}
