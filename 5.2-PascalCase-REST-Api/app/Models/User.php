<?php

namespace App\Models;

use App\Models\BaseModel;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

//// BEFORE:
////  use Illuminate\Foundation\Auth\User as Authenticatable;
////  class User extends Authenticatable
class User extends BaseUser
{
  use HasFactory, Notifiable;

  /**
   * The table associated with the model.
   * @var string
   */
  protected $table = 'User';


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
}
