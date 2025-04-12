<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Trainer extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = [
      'name',
      'bio',
      'service_id',
    ];
    public function classSchedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
