<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class LeaveType extends Model
{
    public $fillable = ['name', 'slug', 'days'];
    use HasFactory, HasSlug;
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%');
    }
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
