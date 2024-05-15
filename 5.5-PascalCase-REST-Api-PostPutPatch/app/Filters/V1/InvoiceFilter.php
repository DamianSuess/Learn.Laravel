<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;


class InvoiceFilter extends ApiFilter
{
  // Allowable rules from CustomerResource fields
  protected $safeParams =
  [
    "customerId"    => ["eq"],
    "amount"        => ["eq", "lt", "gt", "lte", "gte"],
    "paidStatusId"  => ["eq", "ne"], // 'ne' for not paid
    "billedDttm"    => ["eq", "lt", "gt", "lte", "gte"],
    "paidDttm"      => ["eq", "lt", "gt", "lte", "gte"],
  ];

  // Transform our fields into DB Columns
  protected $columnMap = [
    "customerId" => "CustomerId",
    "billedDttm" => "BilledDttm",
    "paidDttm"   => "PaidDttm",
  ];

  // Transform our operators into DB operators
  protected $operatorMap = [
    "eq"  => "=",
    "lt"  => "<",
    "lte" => "<=",
    "gt"  => ">",
    "gte" => ">=",
    "ne"  => "!=",
  ];
}
