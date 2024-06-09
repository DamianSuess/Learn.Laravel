@extends('products.layout')

@section('content')

  <div class="card mt-5">
    <h2 class="card-header">Laravel 11 CRUD Example from scratch</h2>
    <div class="card-body">

      @session('success')
        <div class="alert alert-success" role="alert"> {{ $value }} </div>
      @endsession

      <div class="d-grid d-md-flex justify-content-md-end gap-2">
        <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> Create New Product</a>
      </div>

      <table class="table-bordered table-striped mt-4 table">
        <thead>
          <tr>
            <th width="80px">No.</th>
            <th>Name</th>
            <th>Details</th>
            <th width="250px">Action</th>
          </tr>
        </thead>

        <tbody>
          @forelse ($products as $product)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->detail }}</td>
              <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                  <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}"><i class="fa-solid fa-list"></i> Show</a>

                  <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4">There are no data.</td>
            </tr>
          @endforelse
        </tbody>

      </table>

      LINKS:
      {{-- {{ $products->links() }} --}}
      {!! $products->links() !!}

    </div>
  </div>
@endsection
