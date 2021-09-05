<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden =['updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // sentence-capitalise 
     public function getTitleAttribute($desc)
     {
         return ucwords($desc);
     }      
}
