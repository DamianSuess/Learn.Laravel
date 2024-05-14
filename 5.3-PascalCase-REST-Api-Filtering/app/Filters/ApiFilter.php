<?php

namespace App\Filters;

use Illuminate\Http\Request;


class ApiFilter
{
  /**
   * Allowable rules from from Resource fields
   * Sample: ["name" => ["eq", "gt", ]]
   * @var array<string,array<string>>
   */
  protected $safeParams =  [];

  /**
   * Transform our fields into DB Columns
   * @var array<string>
   */
  protected $columnMap = [];

  /**
   * Transform our operators into DB operators
   *
   * @var array<string>
   */
  protected $operatorMap =
  [
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
