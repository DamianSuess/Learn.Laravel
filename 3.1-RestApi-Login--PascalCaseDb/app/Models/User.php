<?php

namespace App\Models;

use App\Models\BaseModel;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//// BEFORE:
////  use Illuminate\Foundation\Auth\User as Authenticatable;
////  class User extends Authenticatable
class User extends BaseUser
{
  use HasFactory, Notifiable, HasApiTokens;

  /**
   * The table associated with the model.
   * @var string
   */
  protected $table = 'User';

  /**
   * The column name of the password field using during authentication. (See also, Illuminate\Auth\Authenticatable)
   *
   * @var string
   */
  protected $authPasswordName = 'Password';

  /**
   * The column name of the "remember me" token. (See also, Illuminate\Auth\Authenticatable)
   * @var string
   */
  protected $rememberTokenName = 'RememberToken';

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'Name',
    'Email',
    'Password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'Password',
    'RememberToken',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'EmailVerifiedAt' => 'datetime',
      'Password' => 'hashed',
    ];
  }

  // Alternate approach to overriding, `$authPasswordName`
  /////**
  //// * Get the password for the user (overriding laravel's naming conventions).
  //// * @return string
  //// */
  ////public function getAuthPassword()
  ////{
  ////  // overrides the default `password`
  ////  return $this->Password;
  ////}
}
