<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use Sluggable;
    protected $fillable = ['video_title', 'video_url', 'description'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'video_title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFindBySlug($query, $slug)
    {
        $query->where('slug', '=', $slug);
    }

}
