<div>
  <p>
    Current epoch time is: {{ time() }}
    <button wire:click="$refresh">Live page refresh</button>
  </p>

  <p>
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
    <button wire:click="incrementBy(10)">+10</button>
    <button wire:click="decrement">-</button>
  </p>
  <p>
    <button wire:mouseenter="increment" wire:mouseleave="decrement">enter/leave</button>
    <button wire:click.throttle.1000ms="increment">Throttle (1s) increment</button>
  </p>
</div>
