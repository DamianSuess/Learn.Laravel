<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Counter Sample")]
class SampleView extends Component
{
  public int $counter = 1;

  /**
   * Input item.
   * @var string
   */
  public string $item = "";

  /**
   * Collection of items.
   * @var array
   */
  public $items = [
    "Item 1",
    "Item 2",
  ];

  public function increment(): void
  {
    $this->counter++;
  }

  public function incrementBy($stepCount): void
  {
    $this->counter = $this->counter + $stepCount;
  }

  public function decrement(): void
  {
    $this->counter--;
  }

  public function addItem(): void
  {
    // Add "item" to "items" collection
    $this->items[] = $this->item;

    // Reset $item back to default text defined in this class (i.e. $item="initial-value";)
    $this->reset("item");
  }

  public function render()
  {
    return view('livewire.sample-view');
  }
}
