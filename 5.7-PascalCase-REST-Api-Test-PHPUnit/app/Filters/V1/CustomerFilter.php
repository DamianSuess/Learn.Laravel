<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;


class CustomerFilter extends ApiFilter
{
  // Allowable rules from CustomerResource fields
  protected $safeParams =
  [
    "name"    => ["eq"],
    "type"    => ["eq"],
    "email"   => ["eq"],
    "address" => ["eq"],
    "city"    => ["eq"],
    "state"   => ["eq"],
    "postalCode" => ["eq", "gt", "lt"]
  ];

  // Transform our fields into DB Columns
  protected $columnMap = [
    "postalCode" => "PostalCode",
  ];

  // Transform our operators into DB operators
  protected $operatorMap = [
    "eq"  => "=",
    "lt"  => "<",
    "lte" => "<=",
    "gt"  => ">",
    "gte" => ">=",
  ];
}
