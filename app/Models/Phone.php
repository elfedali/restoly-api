<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Phone extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone',
        'is_active',
        'is_verified',
        'is_main',
        'weight',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
        'is_verified' => 'boolean',
        'is_main' => 'boolean',
        'weight' => 'integer',

    ];

    public function phoneable(): MorphTo
    {
        return $this->morphTo();
    }
}
