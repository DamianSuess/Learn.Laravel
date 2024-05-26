<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
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
   *
   * @param   Customer  $customer  [$customer description]
   * @return  JsonResource         [return description]
   */
  public function show(Customer $customer)
  {
    $includeInvoices = request()->query("includeInvoices");

    // Must use the string "true" otherwise any value will evaluate as true
    if ($includeInvoices == "true")
      return new CustomerResource($customer->loadMissing("Invoice")); // Name of `Invoice` table

    return new CustomerResource($customer);
  }

  public function store(StoreCustomerRequest $request)
  {
    // Create a new customer using the inputs
    $newCustomer = Customer::create($request->all());

    // Return the transformed attributes into our custom JSON contract
    // i.e. "CustomerTypeId" --> "type"
    return new CustomerResource($newCustomer);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param   UpdateCustomerRequest  $request   Request to update customer properties
   * @param   Customer               $customer  Customer model
   */
  public function update(UpdateCustomerRequest $request, Customer $customer): void
  {
    // Attempt to translate/transform JSON element keys to Model's conventions.
    $transformed = $this->TransformKeys($request->all());
    $customer->update($transformed);

    // Update Customer DB table using the supplied column/values
    //$customer->update($request->all());
  }

  /**
   * Converts API JSON key names to model's name
   * @param array<string|mixed> $inputs Array using JSON API key names
   * @return array<string|mixed>
   */
  private function TransformKeys($input)
  {
    $translator  = [
      "name"       => "Name",
      "type"       => "CustomerTypeId",
      "email"      => "Email",
      "address"    => "Address",
      "city"       => "City",
      "state"      => "State",
      "country"    => "Country",
      "postalCode" => "PostalCode",
    ];

    // Create new array using Model's naming conventions
    // I.E. ["type" => "CustomerTypeId"]
    $transformed = array();
    foreach ($input as $iKey => $iValue) {
      foreach ($translator as $jsonKey => $modelKey) {
        if ($iKey == $jsonKey)
          $transformed[$modelKey] = $iValue;
      }
    }

    return $transformed;
  }
}
