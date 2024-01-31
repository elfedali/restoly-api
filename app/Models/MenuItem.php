<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;

class MenuItem extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'description'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_category_id',
        'name',
        'price',
        'description',
        'is_active',
        'is_veg',
        'is_popular',
        'position',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'menu_category_id' => 'integer',
        'name' => 'array',

        'description' => 'array',
        'is_active' => 'boolean',
        'is_veg' => 'boolean',
        'is_popular' => 'boolean',
        'position' => 'integer',

    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function menuCategory(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }
    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }
}
