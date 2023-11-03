<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id',

    ];
    protected $table = 'menus';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'restaurant_id' => 'integer',

    ];

    public function menuCategories(): HasMany
    {
        return $this->hasMany(MenuCategory::class);
    }
    public function categories()
    {
        return $this->hasMany(MenuCategory::class, 'menu_id');
    }
    public function items()
    {
        return $this->hasManyThrough(
            MenuItem::class,
            MenuCategory::class,
            'menu_id',
            'menu_category_id',
            'id',
            'id'

        );
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
}
