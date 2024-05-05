<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
  public function index()
  {
    return Product::all();
  }

  public function getById($id)
  {
    return Product::findOrFail($id);
  }

  public function store(array $data)
  {
    return Product::create($data);
  }

  public function update(array $data, $id)
  {
    // Safely handle invalid $id
    return Product::whereId($id)?->update($data);

    // return Product::whereId($id)->update($data);
  }

  public function delete($id)
  {
    Product::destroy($id);
  }
}
