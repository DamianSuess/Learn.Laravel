<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class SampleView extends Component
{
  public int $counter = 1;

  public function increment(): void
  {
    $this->counter++;
  }

  public function decrement(): void
  {
    $this->counter--;
  }

  public function render(): View
  {
    return view('livewire.sample-view');
  }
}
