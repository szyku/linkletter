<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class DispatchJob extends Model
{
    use Sluggable;
    protected $fillable = ['dispatch_at', 'dispatched', 'title'];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
