<div>
  <form wire:submit="addProduct">
    <input type="text" wire:model="product" />
    <button type="submit">Add</button>
  </form>
  <ul>
    @foreach ($products as $product)
      <li>{{ $product }}</li>
    @endforeach
  </ul>
</div>
