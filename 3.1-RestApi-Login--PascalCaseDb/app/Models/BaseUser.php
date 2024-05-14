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
//use Illuminate\Foundation\Auth\User as UserAuthenticatable;

class BaseUser extends BaseModel implements
  AuthenticatableContract,
  AuthorizableContract,
  CanResetPasswordContract
//UserAuthenticatable
{
  use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
}
