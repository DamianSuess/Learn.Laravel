<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Invoice;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\InvoiceResource;
use App\Http\Resources\V1\InvoiceCollection;
use App\Http\Requests\V1\BulkStoreInvoiceRequest;
use App\Filters\V1\InvoiceFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class InvoiceController extends Controller
{
  /**
   * Display a listing of invoices
   * @return \Illuminate\Http\Response
   */
  // public function index()
  public function index(Request $request)
  {
    // return Invoice::all();
    // return new InvoiceCollection(Invoice::paginate());

    $filter = new InvoiceFilter();
    $queryItems = $filter->Transform($request);

    if (count($queryItems) == 0)
      return new InvoiceCollection(Invoice::paginate());
    else {
      // Make clickable link maintain filter
      $invoices = Invoice::where($queryItems)->paginate();
      return new InvoiceCollection($invoices->appends($request->query()));

      //// return new InvoiceCollection(Invoice::where($queryItems)->paginate());
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
   * Store a newly created invoice resource into storage
   * @param \Illuminate\Http\Request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
  }

  /**
   * Bulk store many newly created invoices resource into storage
   * @param BulkStoreInvoiceRequest
   * @return \Illuminate\Http\Response
   */
  public function bulkStore(BulkStoreInvoiceRequest $request)
  {
    $items = $request->all();

    // Returns only 'Amount' and 'Status'
    $bulk = collect($items)->map(function ($arr, $key) {
      // Array except helper, get all columns except for the following
      // Inserting: Amount, Status columns

      // Convert API contract's JSON key naming to match our model/DB
      $inv = new Invoice();
      $arrTransformed = $inv->transformKeys($arr);

      return Arr::except($arrTransformed, ["customerId", "paidDate", "CustomerId", "PaidDttm"]);
    });

    // TODO: Fix the insert
    // NOTE: This implementation bypasses, CreatedAt and UpdatedAt columns.
    Invoice::insert($bulk->toArray());
  }

  /**
   * Display a single invoice based on the Invoice's Id number.
   *
   * @param   Invoice  $invoice  InvoiceId
   *
   * @return  \Illuminate\Http\Response
   */
  public function show(Invoice $invoice)
  {
    return new InvoiceResource($invoice);
  }
}
