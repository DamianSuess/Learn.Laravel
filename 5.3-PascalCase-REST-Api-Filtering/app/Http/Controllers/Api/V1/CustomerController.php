<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Services\V1\CustomerQuery;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  /**
   * Display a listing of customers
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    // Don't filter the data, provides a raw DB JSON output
    // return Customer::all();

    $filter = new CustomerQuery();
    $queryItems = $filter->Transform($request);

    // Check for item result count to display properly
    // Customer::where($queryItems);

    ////if ($queryItems == null)
    ////  return "";
    if (count($queryItems) == 0)
      return new CustomerCollection(Customer::paginate());
    else
      return new CustomerCollection(Customer::where($queryItems)->paginate());

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
