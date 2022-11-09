<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function wisata()
    {
        return $this->belongsTo(wisata::class);
    }
}