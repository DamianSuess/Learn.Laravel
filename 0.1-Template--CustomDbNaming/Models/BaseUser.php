<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;

// NOTE:
//  This is a copy/past of `Illuminate\Foundation\Auth\User.php` which extends `Model`.
//  However, we need to extend BaseModel for column overrides.
class BaseUser extends BaseModel implements
  AuthenticatableContract,
  AuthorizableContract,
  CanResetPasswordContract
{
  use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
}
