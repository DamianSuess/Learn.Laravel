<div class="row justify-content-center mt-5">
  <div class="col-md-8">

    <div class="card">
      <div class="card-header">Register</div>
      <div class="card-body">
        <form wire:submit="register">
          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
            <div class="col-md-6">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name">
              {{-- Display any errors under text box --}}
              @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
            <div class="col-md-6">
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model="email">
              @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
            <div class="col-md-6">
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" wire:model="password">
              @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
            <div class="col-md-6">
              <input type="password" class="form-control" id="password_confirmation" wire:model="password_confirmation">
            </div>
          </div>
          <div class="row mb-3">
            <button type="submit" class="col-md-3 offset-md-5 btn btn-primary">
              Register
            </button>
          </div>
        </form>
        <div class="row mb-3">
          <span wire:loading class="col-md-3 offset-md-5 text-primary">Processing...</span>
        </div>
      </div>
    </div>
  </div>
</div>
