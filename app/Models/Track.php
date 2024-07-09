<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'title',
        'artist',
        'cover',
        'file',
        'display',
        'play_count',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
