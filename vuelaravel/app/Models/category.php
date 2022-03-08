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
        return $this->hasMany(nft::class , 'id');
    }

    function list_category(){
        return $this->belongsTo(list_category::class , 'category_id');
    }
}
