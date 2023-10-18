<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'table_id',
        'user_id',
        'approvedby_id',
        'approved_at',
        'arrival_date',
        'departure_date',
        'status',
        'note',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'table_id' => 'integer',
        'user_id' => 'integer',
        'approvedby_id' => 'integer',
        'approved_at' => 'datetime',
        'arrival_date' => 'datetime',
        'departure_date' => 'datetime',
    ];

    public function reservationable(): MorphTo
    {
        return $this->morphTo();
    }

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function approvedby(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
