<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryAnalytic extends Model
{
    //
    protected $fillable = ["name", "total_volume", "total_price", "total_keywords"];
}
