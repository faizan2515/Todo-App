<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-5">Login</h1>
            @if (session()->has('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form wire:submit.prevent="save">
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" wire:model="form.email" class="form-control" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    @error('form.email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" wire:model="form.password" class="form-control">
                    @error('form.password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="d-md-flex align-items-baseline">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <p class="mx-3">Don't Have An Account? <a href="/register">Register</a></p>
                </div>
        </form>
        </div>
    </div>
</div>
