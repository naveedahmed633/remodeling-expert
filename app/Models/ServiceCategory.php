<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = ['services_id', 'name'];

    // Define a one-to-many relationship with SubserviceCategory
    public function subServices()
    {
        return $this->hasMany(SubserviceCategory::class, 'service_category_id');
    }
}
