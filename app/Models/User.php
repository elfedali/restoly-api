<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin'; // admin is a user with all privileges
    const ROLE_USER = 'user'; // user is a user with restricted privileges
    const ROLE_SUBSCRIBER = 'subscriber'; // subscriber is a user with plan
    const ROLE_MODERATOR = 'moderator';
    const ROLE_COMMERCIAL = 'commercial';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'role',
        'is_active',
        'bio',
        'telephone',
        'address',
        'city',
        'country',
        'postal_code',
        'avatar',
        'email_notification',
        'sms_notification',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function fullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isUser(): bool
    {
        return $this->role === self::ROLE_USER;
    }

    public function isSubscriber(): bool
    {
        return $this->role === self::ROLE_SUBSCRIBER;
    }

    public function isModerator(): bool
    {
        return $this->role === self::ROLE_MODERATOR;
    }

    // restaurants
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'owner_id');
    }

    // has many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // restaurant count
    public function hasRestaurant()
    {
        return $this->restaurants()->count();
    }
    // before save email lower case
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
    // before save username lower case
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }

    // before save first name capitalize
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }
    // before save last name upper case
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = strtoupper($value);
    }

    // scopeIsActive
    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }
}
