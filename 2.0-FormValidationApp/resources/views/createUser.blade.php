{{--
This View creates a simple form for inputting the User's Name, Password, and Email.

There are multiple ways it reports back form errors found via the FormController.php

1. Using `@if ($errors->any()) ... @endif` to display a `Div` block at the top
2. Using `@error('fieldName') ... @enderror` to display a `Span` under the input box.
3. Using `@if ($errors->has('fieldName')) ... @endif` to display a `Span` under the input box
  --}}

<!DOCTYPE html>
<html>

  <head>
    <title>Laravel 11 Form Validation Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  </head>

  <body>
    <div class="container">

      <div class="card mt-5">
        <h3 class="card-header p-3"><i class="fa fa-star"></i> Laravel 11 Form Validation Example</h3>
        <div class="card-body">

          {{-- Uncomment the line below to set a breakpoint in the View. Next, F10 to view the step-through the generated code. --}}
          {{-- {{ @xdebug_break() }} --}}

          @session('success')
            <div class="alert alert-success" role="alert">
              {{ $value }}
            </div>
          @endsession

          <!-- Way 1 - Display All Error Messages, if 'any()' -->
          @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('users.store') }}">

            {{ csrf_field() }}

            <div class="mb-3">
              <label class="form-label" for="inputName">Name:</label>
              <input type="text" name="name" id="inputName" class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                     value="{{ old('name') }}">

              <!-- Way 2: Display Error Message -->
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label" for="inputPassword">Password:</label>
              <input type="password" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Password">

              <!-- Way 3: Display Error Message -->
              @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label class="form-label" for="inputEmail">Email:</label>
              <input type="text" name="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                     value="{{ old('email') }}" />

              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <button class="btn btn-success btn-submit"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>

</html>
