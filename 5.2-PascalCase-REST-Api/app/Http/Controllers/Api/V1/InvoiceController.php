<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
  /**
   * Display a listing of customers
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Invoice::all();
  }

  /**
   * Show the form for creating a new customer
   *
   * @return  \Illuminate\Http\Response
   */
  public function create()
  {
  }
}
