<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DispatchJob extends Model
{
    protected $fillable = ['dispatch_at', 'dispatched', 'title'];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
