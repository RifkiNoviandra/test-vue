<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user(){
        return $this->belongsTo('user_id' , User::class);
    }

    function nft(){
        return $this->belongsTo('nft_id' , nft::class);
    }
}
