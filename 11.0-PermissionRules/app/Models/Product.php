<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
  use HasFactory;

  /**
   * Mass assignable attributes
   * @var array
   */
  protected $fillable =[ 'name', 'detail', ];
}
