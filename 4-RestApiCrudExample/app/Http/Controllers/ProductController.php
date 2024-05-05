<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponse;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
  private ProductRepositoryInterface $_productRepository;

  public function __construct(ProductRepositoryInterface $productRepo)
  {
    $this->_productRepository = $productRepo;
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = $this->_productRepository->index();
    return ApiResponse::sendResponse(ProductResource::collection($data), "", 200);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    // Not used
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreProductRequest $request)
  {
    $details =
      [
        "name"  => $request->name,
        "details" => $request->details,
      ];

    DB::beginTransaction();

    try {php
      $product = $this->_productRepository->store($details);
      DB::commit();
      return ApiResponse::sendResponse(new ProductResource($product), "Product created successfully", 201);
    } catch (\Exception $ex) {
      return ApiResponse::rollback($ex);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    $product = $this->_productRepository->getById($id);
    return ApiResponse::sendResponse(new ProductResource($product), "", 200);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    // Not implemented
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProductRequest $request, $id)
  {
    $updateDetails =
      [
        "name"    => $request->name,
        "details" => $request->details,
      ];

    DB::beginTransaction();

    try {
      $product = $this->_productRepository->update($updateDetails, $id);

      DB::commit();
      return ApiResponse::sendResponse("Product updated successfully", "", 201);
    } catch (\Exception $ex) {
      return ApiResponse::rollback($ex);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    $this->_productRepository->delete($id);
    return ApiResponse::sendResponse("Product removed successfully", "", 204);
  }
}
