<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    function user(){
        return $this->belongsTo(User::class , 'user_id' );
    }

    function nft(){
        return $this->belongsTo(  nft::class , 'nft_id');
    }
}
