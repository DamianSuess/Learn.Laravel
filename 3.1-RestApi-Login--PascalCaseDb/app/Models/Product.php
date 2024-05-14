<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends BaseModel
{
  use HasFactory;

  /**
   * The table associated with the model.
   * @var string
   */
  protected $table = 'Product';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    "Name",
    "Detail"
  ];
}
