<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable, HasFactory;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title',
        'slug',
        'body',
        'thumbnail',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => null
        ]);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoryable');
    }

    public function showCategories()
    {
        return $this->categories()->first() ? $this->categories()->first()->name : null;
    }

    public function showTags()
    {
        return $this->has('tags') ? $this->tags()->pluck('name') : null;
    }
}
