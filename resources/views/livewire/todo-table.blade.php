<div class="container mt-4">
    <h2>To-Do List</h2>

    <!-- Success Message -->
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Search Input -->
    <div class="mb-4 d-flex">
        <input type="text" wire:model.live="searchTerm" class="form-control me-2" placeholder="Search To-Dos by title or description...">
    </div>
    
    <!-- To-Do Table -->
    <table class="table table-bordered table-striped table-hover mt-3">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Estimated End Date</th>
                <th>Completed</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <td>{{ $todo->title }}</td>
                    <td>{{ $todo->description }}</td>
                    <td>{{ \App\Models\Todo::priorityValues($todo->priority) }}</td>
                    <td>{{ \App\Models\Todo::statusValues($todo->status) }}</td>
                    <td>{{ $todo->estimated_end_date }}</td>
                    <td>{{ $todo->completed ? 'Yes' : 'No' }}</td>
                    <td>
                        <button wire:click="edit('{{ $todo->id }}')" class="btn btn-sm btn-info">Edit</button>
                        <button wire:click="delete('{{ $todo->id }}')" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach

            @if ($todos->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">No To-Do items found.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-3">
        {{ $todos->links() }}
    </div>
</div>  
