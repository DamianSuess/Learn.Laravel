<?php

namespace App\Services\V1;

use Illuminate\Http\Request;


class CustomerQuery
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

  /**
   * Transform the request into a database query.
   *
   * @param   Request  $request  HTTP Request
   *
   * @return  array
   */
  public function Transform(Request $request)
  {
    $eloQuery = [];

    foreach ($this->safeParams as $param => $operators) {
      $query = $request->query($param);

      if (!isset($query))
        continue;

      $column = $this->columnMap[$param] ?? $param;

      foreach ($operators as $operator) {
        if (isset($query[$operator])) {
          $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
        }
      }
    }

    return $eloQuery;
  }
}
