<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'client',
        'year',
        'author',
        'description',
        'description1',
        'image',
        'image1',
        'image2',
        'image3',
    ];
}
