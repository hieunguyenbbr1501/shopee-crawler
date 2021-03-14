<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ["name"];

    public function keywords()
    {
        return $this->hasMany(Keyword::class, 'category_id');
    }
}
