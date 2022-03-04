<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    function nft(){
        return $this->hasMany('nft_id' , nft::class);
    }

    function list_category(){
        return $this->belongsTo('category_id' , list_category::class);
    }
}
