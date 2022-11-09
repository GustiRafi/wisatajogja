<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class wisata extends Model
{
    use HasFactory,Sluggable;

    protected $guarded = ['id'];
    protected $with = ['categori'];

    public function categori()
    {
        return $this->belongsTo(categori::class);
    }

    public function comment()
    {
        return $this->hasMany(comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}