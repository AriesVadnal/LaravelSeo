<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{

    use SoftDeletes;
    
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tags::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
