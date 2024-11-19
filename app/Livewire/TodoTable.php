<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;
use Livewire\WithPagination;


class TodoTable extends Component
{
    use WithPagination;
    public $priorities;
    public $statuses;

    public $searchTerm = ''; // Property to hold input field value

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['todoUpdated' => 'refreshTodos'];

    public function mount()
    {
        $this->priorities = Todo::Priorities();
        $this->statuses = Todo::Statuses();
    }
    public function refreshTodos()
    {   
        $this->resetPage(); 
        // $this->todos = Todo::all(); // Reload todos
    }
    
    public function edit($id)
    {
        // $this->dispatch('editTodo', $id);
        return redirect()->route('todos.form', ['todo_id' => $id]);
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        session()->flash('message', 'To-Do Deleted Successfully.');
    }

    public function render()
    {
        // Use the stored search term for filtering
        $todos = Todo::where('title', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('description', 'like', '%' . $this->searchTerm . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('livewire.todo-table', ['todos' => $todos])->layout('layouts.app');
    }

    public function updating($name,$value){
        if($name == 'searchTerm'){
            $this->resetPage();
        }
    }
}

