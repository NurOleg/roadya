<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    public const TRAVELLER_TYPE = 'traveller';
    public const COMPANY_TYPE = 'company';
    public const IP_TYPE = 'individual';
    public const ADMIN_TYPE = 'individual';

    public const ADMINPANEL_USERS = [
        self::COMPANY_TYPE,
        self::IP_TYPE,
        self::ADMIN_TYPE
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function providers(): HasMany
    {
        return $this->hasMany(Provider::class);
    }

    /**
     * @return HasMany
     */
    public function placemarks(): HasMany
    {
        return $this->hasMany(Placemark::class);
    }
}
