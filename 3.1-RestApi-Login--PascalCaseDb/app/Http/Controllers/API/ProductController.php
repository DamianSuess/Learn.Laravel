<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(): JsonResponse
  {
    $products = Product::all();

    return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request): JsonResponse
  {
    $input = $request->all();

    $validator = Validator::make($input, [
      'name' => 'required',
      'detail' => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }

    $product = Product::create($input);

    return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id): JsonResponse
  {
    $product = Product::find($id);

    if (is_null($product)) {
      return $this->sendError("Product Id: '$id' not found.");
    }

    return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(Request $request, Product $product): JsonResponse
  {
    // $input is from the HTTP Form
    $input = $request->all();

    $validator = Validator::make($input, [
      'Name' => 'required',
      'Detail' => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }

    $product->name = $input['name'];
    $product->detail = $input['detail'];
    $product->save();

    return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy($id): JsonResponse
  {
    $product = Product::find($id);

    if (is_null($product)) {
      return $this->sendError("Product Id: '$id' not found.");
    }

    $product->delete();

    return $this->sendResponse([], 'Product deleted successfully.');
  }
}
