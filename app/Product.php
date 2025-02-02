<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $primaryKey = "id";
    protected $fillable = ['name','sold','history_sold','price_min','price_max','rating','liked','view','thumbnail','slug','crawl_url'];

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

}
