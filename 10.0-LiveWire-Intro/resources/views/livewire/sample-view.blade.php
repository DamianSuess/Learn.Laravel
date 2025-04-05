<div>
  <div>
    Current epoch time is: {{ time() }}
    <button wire:click="$refresh">Live page refresh</button>
  </div>

  <div>
    {{--
      Other events to action on:
      * wire:mouseenter   - Hover over button
      * wire:mouseleave   - Hover over button
      * wire:submit       - Form submit button
      * wire:click.window - Listen for window clicking event
      * wire:click.throttle.1000ms - Allow only one click per second
    --}}
    Count: {{ $counter }}
    <button wire:click="increment">+</button>
    <button wire:click="decrement">-</button>
  </div>
