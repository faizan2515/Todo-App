<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $item;
    public $IncompleteTasks;
    public $CompleteTasks;

    public function addItem()
    {
        $this->validate([
            'item' => 'required'
        ]);
        $task = auth()->user()->tasks()->create([
            'name'=> $this->item
        ]);
        session()->flash('add', 'Task successfully created.');
        $this->item = '';
        $this->IncompleteTasks = User::find(auth()->user()->id)->tasks()->where('completed',0)->orderBy('created_at','desc')->get();
        $this->CompleteTasks = User::find(auth()->user()->id)->tasks()->where('completed',1)->orderBy('created_at','desc')->get();

    }

    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('delete', 'Task successfully deleted.');
        $this->IncompleteTasks = User::find(auth()->user()->id)->tasks()->where('completed',0)->orderBy('created_at','desc')->get();
        $this->CompleteTasks = User::find(auth()->user()->id)->tasks()->where('completed',1)->orderBy('created_at','desc')->get();
    }

    public function alter($id)
    {
        $task = Task::find($id);
        $task->completed = !$task->completed;
        $task->save();
        $this->IncompleteTasks = User::find(auth()->user()->id)->tasks()->where('completed',0)->orderBy('created_at','desc')->get();
        $this->CompleteTasks = User::find(auth()->user()->id)->tasks()->where('completed',1)->orderBy('created_at','desc')->get();
    }
    public function mount()
    {
        if(auth()->user())
        {
            $this->IncompleteTasks = User::find(auth()->user()->id)->tasks()->where('completed',0)->orderBy('created_at','desc')->get();
            $this->CompleteTasks = User::find(auth()->user()->id)->tasks()->where('completed',1)->orderBy('created_at','desc')->get();
            // dd(count($this->IncompleteTasks));
        }
    }

    public function render()
    {
        return view('livewire.home')
        ->extends('layouts.app')
        ->section('content');
    }
}
