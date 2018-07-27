<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use Sluggable;
    public $timestamps = false;

    protected $fillable = ['order', 'group_name'];

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function dispatchJob()
    {
        return $this->belongsTo(DispatchJob::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'group_name',
            ],
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


}
