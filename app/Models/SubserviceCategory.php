<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubserviceCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'service_category_id'];

    // Define the inverse relationship to ServiceCategory
    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function remodelTypes()
    {
        return $this->hasMany(RemodelType::class, 'subservice_id');
    }
}
