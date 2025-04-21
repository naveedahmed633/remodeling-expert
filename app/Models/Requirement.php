<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $fillable = ['remodel_type_id', 'name'];

    // Inverse relationship to RemodelType
    public function remodelType()
    {
        return $this->belongsTo(RemodelType::class, 'remodel_type_id');
    }
}
