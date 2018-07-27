<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $timestamps = false;

    protected $fillable = ['url', 'icon', 'description'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
