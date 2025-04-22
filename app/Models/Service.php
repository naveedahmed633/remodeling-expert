<?php

// app/Models/Service.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image'];

    public function subCategory()
    {
        return $this->hasMany(ServiceCategory::class, 'services_id', 'id');
    }
}

