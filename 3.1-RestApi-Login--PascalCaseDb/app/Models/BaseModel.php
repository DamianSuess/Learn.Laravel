<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

// ATTENTION:
//  1. You MUST set the table and primary key since our DB uses `Id` instead of `id`
//
class BaseModel extends Model
{
  /**
   * The name of the "created at" column.
   *
   * @var string|null
   */
  const CREATED_AT = "CreatedAt";

  /**
   * The name of the "updated at" column.
   *
   * @var string|null
   */
  const UPDATED_AT = "UpdatedAt";

  /**
   * The name of the "deleted at" column.
   *
   * @var string|null
   */
  const DELETED_AT = "DeletedAt";

  /**
   * The primary key for the model
   * @var string
   */
  protected $primaryKey = "Id";

  public function getTable()
  {
    return $this->table ?? Str::singular(class_basename($this));

    // Pluralize
    // return $this->table ?? Str::pluralStudly(class_basename($this));
    // Snake
    // return $this->table ?? Str::snake(Str::pluralStudly(class_basename($this)));
  }
}
