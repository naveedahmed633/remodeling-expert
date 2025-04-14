<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    use HasFactory;
    protected $fillable = [
     'name',
     'description',
    ];
    public function classSchedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
