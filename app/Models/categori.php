<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class categori extends Model
{
    use HasFactory,Sluggable;

    protected $guarded=['id'];

    public function wisata()
    {
        return $this->hasMany(wisata::class);
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