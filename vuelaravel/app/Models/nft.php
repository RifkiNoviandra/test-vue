<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nft extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false ;

    function category(){
        return $this->hasMany(category::class , 'nft_id');
    }

    function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}
