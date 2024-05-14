<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Filters\V1\CustomerFilter;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  /**
   * Display a listing of customers
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    // Returns raw DB JSON output
    // return Customer::all();
    //
    // Use the CustomerCollection resource for transforming all customers `Customer::all()`
    ////return new CustomerCollection(Customer::all());
    //
    // Return results paginated (15 at a time)
    // With links to which page
    //return new CustomerCollection(Customer::paginate());

    // CustomerFilter could be a Facade so we don't have to use 'new' keyword
    $filter = new CustomerFilter();
    $queryItems = $filter->Transform($request);

    // Check for item result count to display properly
    // Customer::where($queryItems);

    if (count($queryItems) == 0)
      return new CustomerCollection(Customer::paginate());
    else {
      // Note: Results link doesn't retain filter when applied
      // "url": "http://localhost:8000/api/v1/customers?page=1",
      // return new CustomerCollection(Customer::where($queryItems)->paginate());

      // Make clickable link maintain filter
      // "url": "http://localhost:8000/api/v1/customers?postalCode%5Bgt%5D=30000&page=1",
      $customers = Customer::where($queryItems)->paginate();
      return new CustomerCollection($customers->appends($request->query()));
    }
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
