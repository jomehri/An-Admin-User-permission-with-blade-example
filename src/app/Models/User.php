<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    /**
     * Columns
     */
    const COLUMN_NAME = 'name';
    const COLUMN_EMAIL = 'email';
    const COLUMN_BALANCE = 'password';
    const COLUMN_EMAIL_VERIFIED_AT = 'email_verified_at';
    const COLUMN_PASSWORD = 'password';
    const COLUMN_REMEMBER_TOKEN = 'remember_token';

    /**
     * @return string
     */
    public static function getDBTable(): string
    {
        return 'users';
    }

    /**
     * @return string
     */
    public static function getGroup(): string
    {
        return 'Basic';
    }
}
