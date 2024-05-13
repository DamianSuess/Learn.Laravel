<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Invoice;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\InvoiceResource;
use App\Http\Resources\V1\InvoiceCollection;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
  /**
   * Display a listing of invoices
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // return Invoice::all();
    return new InvoiceCollection(Invoice::paginate());
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
