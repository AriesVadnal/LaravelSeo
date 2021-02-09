<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $guarded = [];

    public function posts() {
        return $this->belongsToMany(Posts::class);
    }
}
