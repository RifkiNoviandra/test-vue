<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_category extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    function category(){
        return $this->hasMany(category::class , 'category_id');
    }
}
