<div>
  <h2>Button Click and Events</h2>
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
  <h2>List Sample</h2>
  <form wire:submit="addItem">
    <p>
      1-way binding input:
      <input type="text" wire:model="item" />
      <button type="submit">Add</button>
    </p>
    <p>
      {{-- Live update with default 256ms debounce after keystroke --}}
      2-way binding input:
      <input type="text" wire:model.live="item" />
      <span>{{ $item }}</span>
    </p>
    <p>
      {{-- Live update with custom debounce --}}
      2-way binding input (2ms):
      <input type="text" wire:model.live.debounce.2ms="item" />
      <span>{{ $item }}</span>
    </p>
    <ul>
      @foreach ($items as $item)
        <li>{{ $item }}</li>
      @endforeach
    </ul>
    </p>
</div>
