<?php

namespace App\Livewire;

use Livewire\Component;

class SampleView extends Component
{
  public int $counter = 1;

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

  public function render()
  {
    return view('livewire.sample-view');
  }
}
