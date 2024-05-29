<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

  /**
   * JSON element key to Model property name translator.
   * This is the reverse of \App\Http\Resources\V1\InvoiceResource
   * @var array<string,string>
   */
  public $keyTranslator  = [
    "customerId"    => "CustomerID",
    "amount"        => "Amount",
    "status"        => "PaidStatusId",
    "billedDate"    => "BilledDttm",
    "paidDate"      => "PaidDttm",
  ];

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
