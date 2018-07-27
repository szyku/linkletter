<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;

    protected $fillable = ['order', 'group_name'];

    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
