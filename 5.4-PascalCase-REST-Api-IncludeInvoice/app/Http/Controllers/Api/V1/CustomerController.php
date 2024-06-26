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
    $filterItems = $filter->Transform($request);
    $includeInvoices = $request->query("includeInvoices");

    $customers = Customer::where($filterItems);

    // Must use the string "true" otherwise any value will evaluate as true
    if ($includeInvoices == "true")
      $customers = $customers->with("Invoice"); // Name of `Invoice` table

    return new CustomerCollection($customers->paginate()->appends($request->query()));
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
    $includeInvoices = request()->query("includeInvoices");

    // Must use the string "true" otherwise any value will evaluate as true
    if ($includeInvoices == "true")
      return new CustomerResource(($customer->loadMissing("Invoice"))); // Name of `Invoice` table

    return new CustomerResource($customer);
  }
}
