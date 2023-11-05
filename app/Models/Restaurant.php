<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Translatable\HasTranslations;

class Restaurant extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasSlug;

    public $translatable = ['name', 'description', 'meta_title', 'meta_description', 'meta_keywords'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        // 'district_id',
        'address',
        'zip_code',
        'city',
        'country',
        'district',

        // 'approvedby_id',
        // 'approved_at',
        'createdby_id',
        'name',
        'slug',
        'description',
        'is_active',
        'longitude',
        'latitude',
        // 'currency_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'owner_id' => 'integer',
        'district_id' => 'integer',
        'approvedby_id' => 'integer',
        'name' => 'array',
        'description' => 'array',
        'is_active' => 'boolean',
        'longitude' => 'decimal',
        'latitude' => 'decimal',
        'currency_id' => 'integer',
        'meta_title' => 'array',
        'meta_description' => 'array',
        'meta_keywords' => 'array',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }

    public function menu(): HasOne
    {
        return $this->hasOne(Menu::class);
    }


    public function salles(): HasMany
    {
        return $this->hasMany(Salle::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function favorites(): MorphMany
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }

    public function reservations(): MorphMany
    {
        return $this->morphMany(Reservation::class, 'reservationable');
    }

    public function openingHours(): MorphMany
    {
        return $this->morphMany(OpeningHour::class, 'openinghourable');
    }

    public function phones(): MorphMany
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    public function links(): MorphMany
    {
        return $this->morphMany(Link::class, 'linkable');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function approvedby(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    //slug
    public function getSlugOptions(): \Spatie\Sluggable\SlugOptions
    {
        return \Spatie\Sluggable\SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    // after create restaurant create menu 
    // protected static function booted()
    // {
    //     static::created(function ($restaurant) {
    //         $restaurant->menu()->create([
    //             'restaurant_id' => $restaurant->id,
    //             'name' => 'Menu of ' . $restaurant->name,

    //         ]);
    //     });
    // }

    // createdBy
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'createdby_id');
    }
}
