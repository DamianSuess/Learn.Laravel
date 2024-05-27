<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Customer extends BaseModel
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
  protected $table = 'Customer';

  /**
   * Table columns
   * @var array<string>
   */
  protected $fillable = [
    "Name",
    "CustomerTypeId",
    "Email",
    "Address",
    "City",
    "State",
    "Country",
    "PostalCode",
  ];

  /**
   * JSON element key to Model property name translator.
   * @var array<string,string>
   */
  protected $keyTranslator  = [
    "name"       => "Name",
    "type"       => "CustomerTypeId",
    "email"      => "Email",
    "address"    => "Address",
    "city"       => "City",
    "state"      => "State",
    "country"    => "Country",
    "postalCode" => "PostalCode",
  ];

  public function Invoice()
  {
    return $this->hasMany(Invoice::class, "CustomerId", $this->primaryKey);
  }

  public function getTable()
  {
    return $this->table ?? Str::singular(class_basename($this));
  }

  public function getAttribute($key)
  {
    return parent::getAttribute($key);

    ////if (array_key_exists($key, $this->relations)) {
    ////  return parent::getAttribute($key);
    ////} else {
    ////  return parent::getAttribute(Str::snake($key));
    ////}
  }

  public function setAttribute($key, $value)
  {
    return parent::setAttribute($key, $value);
    ////return parent::setAttribute(Str::snake($key), $value);
  }
}
