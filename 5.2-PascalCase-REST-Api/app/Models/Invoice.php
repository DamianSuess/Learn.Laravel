<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invoice extends BaseModel
{
  use HasFactory;

  /**
   * Indicates whether attributes are snake cased on arrays.
   * @var bool
   */
  public static $snakeAttributes = false;

  /**
   * The table associated with the model.
   * @var string
   */
  protected $table = 'Invoice';

  /**
   * The primary key associated with the table.
   * @var string
   */
  protected $primaryKey = 'Id';

  public function Customer()
  {
    // Works only if column is named, `customer_id`
    // return $this->belongsTo(Customer::class);

    // Set the Foreign Key column name. Otherwise, seeder will fail
    return $this->belongsTo(
      Customer::class,
      "CustomerId"
    );
  }

  public function getTable()
  {
    return $this->table ?? Str::singular(class_basename($this));
  }

  public function getAttribute($key)
  {
    return parent::getAttribute($key);
  }

  public function setAttribute($key, $value)
  {
    return parent::setAttribute($key, $value);
  }
}
