<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-5">Register</h1>
            <form wire:submit.prevent="save">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" wire:model="name" class="form-control">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" wire:model="email" class="form-control" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" wire:model="password" class="form-control">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" wire:model="password_confirmation" class="form-control">
                </div>
                <div class="d-md-flex align-items-baseline">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <p class="mx-3">Already Have An Account? <a href="/login">Login</a></p>
                </div>
        </form>
        </div>
    </div>
</div>
