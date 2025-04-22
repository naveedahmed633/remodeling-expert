<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = ['services_id', 'name'];

    public function subChildCategory()
    {
        return $this->hasMany(SubserviceCategory::class, 'service_category_id');
    }
}
