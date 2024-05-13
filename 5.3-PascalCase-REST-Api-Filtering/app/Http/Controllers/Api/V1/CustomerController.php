<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  /**
   * Display a listing of customers
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // return Customer::all();

    // Use the CustomerCollection resource for transforming all customers `Customer::all()`
    ////return new CustomerCollection(Customer::all());

    // Return results paginated (15 at a time)
    // With links to which page
    return new CustomerCollection(Customer::paginate());
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
