<?php 
namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;

class TodoForm extends Component
{
    public $title, $description, $completed = false, $priority = '2', $estimated_end_date, $status = '1';
    public $todo_id = null;
    public $priorities;
    public $statuses;

    protected $rules = [
        'title' => 'required',
        'priority' => 'required|in:1,2,3',
        'estimated_end_date' => 'nullable|date',
        'status' => 'required|in:1,2,3',
    ];
    // protected $listeners = ['editTodo' => 'loadTodoData'];
    public function mount($todo_id = null)
    {
        $this->priorities = Todo::Priorities();
        $this->statuses = Todo::Statuses();

        if ($todo_id) {
            // dd($this);
            $this->loadTodoData($todo_id);
            // dd($this);
        }
    }

    public function loadTodoData($id)
{
    $todo = Todo::findOrFail($id);
    $this->todo_id = $todo->id;
    $this->title = $todo->title;
    $this->description = $todo->description;
    $this->completed = $todo->completed;
    $this->priority =  $todo->priority;
    $this->estimated_end_date = $todo->estimated_end_date;
    $this->status =  $todo->status;
}

    public function save()
{   
   
    // $this->validate();
    // dd($this->todo_id);
    if ($this->todo_id) {
        // Update existing todo
        $storeData=[];
        $storeData['title'] = $this->title;
        $storeData['description'] = $this->description;
        $storeData['completed'] = $this->completed;
        $storeData['priority'] = $this->priority;
        $storeData['estimated_end_date'] = $this->estimated_end_date;
        $storeData['status'] = $this->status;

        // dd($storeData);
        
        Todo::where('id', $this->todo_id)->update($storeData);

        session()->flash('message', 'To-Do Updated Successfully.');
        $this->dispatch('todoUpdated'); // Notify TodoTable to refresh data if needed
        // Redirect to the todos table route, if needed
        return redirect()->route('todos.table');
    } else {
        // Create new todo
        Todo::create([
            'title' => $this->title,
            'description' => $this->description,
            'completed' => $this->completed,
            'priority' => $this->priority,
            'estimated_end_date' => $this->estimated_end_date,
            'status' => $this->status,
        ]);

        session()->flash('message', 'To-Do Created Successfully.');
        $this->dispatch('todoCreated'); // Notify TodoTable if needed
        // Redirect to the todos table route, if needed
     return redirect()->route('todos.table');
    }

     

    // Reset the form fields after save
    $this->resetInputFields();

   
}


    public function resetInputFields()
    {
        $this->todo_id = null;
        $this->title = '';
        $this->description = '';
        $this->completed = false;
        $this->priority = '2';
        $this->estimated_end_date = null;
        $this->status = '1';
    }

    public function render()
    {   
        // dd($this->priority, $this->completed, $this->status);
        return view('livewire.todo-form')->layout('layouts.app');
    }
}
