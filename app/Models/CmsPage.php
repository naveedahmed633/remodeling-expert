<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CmsPage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'content',
        'meta_title',
        'meta_description',
    ];

    /**
     * Get the first image URL from the given media collection.
     */
    public function cmsImages(string $collection_name): string
    {
        return optional($this->getFirstMedia($collection_name))->getUrl() 
               ?? asset('images/No-Image.png');
    }

    /**
     * Scope to retrieve CMS page by slug.
     */
    public function scopePageBySlug($query, string $slug)
    {
        return $query->where('slug', $slug);
    }
}
