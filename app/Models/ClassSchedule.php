<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;
    protected $fillable = ['trainer_id', 'class_type_id', 'day', 'start_time', 'end_time'];

    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
