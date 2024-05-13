<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  /**
   * Display a listing of customers
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Customer::all();
  }

  /**
   * Show the form for creating a new customer
   *
   * @return  \Illuminate\Http\Response
   */
  public function create()
  {
  }

  /**
   *
   * @param   Customer  $customer  [$customer description]
   * @return  [type]               [return description]
   */
  public function show(Customer $customer)
  {
    return new CustomerResource($customer);
  }
}
