<div>
    @guest
      <div class="row text-center py-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Start listing your todos now...</h1>
            <a href="/login" class="btn btn-primary px-5 py-2 my-2">Login</a>
            <a href="/register" class="btn btn-secondary px-5 py-2 my-2">Register</a>
          </p>
        </div>
      </div>
    @endguest
    @auth
      @if (session()->has('add'))
        <div class="message-container alert alert-success alert-dismissible fade show" role="alert">
          {{ session('add') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (session()->has('delete'))
        <div class="message-container alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('delete') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="form-container bg-primary">
        <div class="wrapper">
          <input type="text" wire:model.lazy="item" class="form-input">
          <button type="button" wire:click="addItem" class="btn btn-outline-primary">Add Item</button>
        </div>
        @error('item') <span class="text-light">{{ $message }}</span> @enderror
      </div>
      <div class="list-container bg-primary">
        @if (count($IncompleteTasks)>0)
        <p class="status">Incomplete</p>
          @foreach ($IncompleteTasks as $task)
            <div class="list-item">
              <div class="check-list-item">
                <i class="fas {{$task->completed? 'fa-times' : 'fa-check' }}" wire:click="alter({{ $task->id }})"></i>  
                {{$task->name}}
              </div>
              <i class="fas fa-trash" wire:click="delete({{ $task->id }})"></i>
            </div>
          @endforeach
        @endif

        @if (count($CompleteTasks)>0)
        <p class="status">Complete</p>
          @foreach ($CompleteTasks as $task)
            <div class="list-item">
              <div class="check-list-item">
                <i class="fas {{$task->completed? 'fa-times' : 'fa-check' }}" wire:click="alter({{ $task->id }})"></i>  
                {{$task->name}}
              </div>
              <i class="fas fa-trash" wire:click="delete({{ $task->id }})"></i>
            </div>
          @endforeach
        @endif
      </div>
    @endauth
</div>
