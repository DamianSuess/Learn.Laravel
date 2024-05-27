<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model
{

  /**
   * The name of the "created at" column.
   * @var string|null
   */
  const CREATED_AT = "CreatedAt";

  /**
   * The name of the "updated at" column.
   * @var string|null
   */
  const UPDATED_AT = "UpdatedAt";

  /**
   * The name of the "deleted at" column.
   * @var string|null
   */
  const DELETED_AT = "DeletedAt";

  /**
   * The primary key for the model
   * @var string
   */
  protected $primaryKey = "Id";

  /**
   * JSON element key to Model property name translator.
   * @var array<string,string>
   */
  protected $keyTranslator = array();

  public function getTable()
  {
    return $this->table ?? Str::singular(class_basename($this));

    // Pluralize
    // return $this->table ?? Str::pluralStudly(class_basename($this));
    // Snake
    // return $this->table ?? Str::snake(Str::pluralStudly(class_basename($this)));
  }

  /**
   * Transform input key(s) from JSON/FORM input to our model's property name(s)
   * based on our model's $keyTranslator to maintain API contracts.
   *
   * i.e. Input JSON element key is `type` and database column is `CustomerTypeId`.
   *
   * @param  array<string,string|mixed> $input  Input array
   * @return array<string,string|mixed> Input array using our desired key names.
   */
  public function transformKeys($input): array
  {
    $transformed = array();
    foreach ($input as $iKey => $iValue) {
      foreach ($this->keyTranslator as $jsonKey => $modelKey) {
        if ($iKey == $jsonKey)
          $transformed[$modelKey] = $iValue;
      }
    }

    return $transformed;
  }
}
