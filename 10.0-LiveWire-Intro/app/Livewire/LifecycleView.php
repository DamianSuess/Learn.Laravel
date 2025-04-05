<?php

namespace App\Livewire;

use Livewire\Component;

class LifecycleView extends Component
{
  /**
   * Product to display.
   * @var string
   */
  public string $product = "";

  /**
   * Collection of products.
   * @var array
   */
  public array $products = [];

  /**
   * Entrypoint.
   * @return void
   */
  public function mount(): void
  {
    $this->products = [
      "Apple",
      "Pear",
    ];
  }

  ////public function updating(): void
  ////{
  ////  // Something is actively being updated
  ////}

  /**
   * Called whenever the page is updated.
   * @param mixed $property
   * @param string $value
   * @return void
   */
  public function updated($property, string $value): void
  {
    // Applies to all field properties
    // Use, "updatedProperty" for targeting specific property/fields.
    $this->$property = strtoupper($value);
  }

  /**
   * Called when only field, 'product' is updated.
   * Apart of the Livewire "magic".
   * @param mixed $value Incoming new value for the field, $this->product.
   * @return void
   */
  //public function updatedProduct($value): void
  //{
  //  $this->product = strtoupper($value);
  //  // Perform validation on submitting
  //  //$this->validate();
  //}

  public function addProduct(): void
  {
    $this->products[] = $this->product;
    $this->reset("product");
  }

  public function render()
  {
    return view('livewire.lifecycle-view');
  }
}
