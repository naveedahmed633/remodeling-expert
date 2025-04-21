<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemodelType extends Model
{
    use HasFactory;

    protected $fillable = ['subservice_id', 'name'];

    // Define the inverse relationship to SubserviceCategory
    public function subservice()
    {
        return $this->belongsTo(SubserviceCategory::class, 'subservice_id');
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class, 'remodel_type_id');
    }
}

