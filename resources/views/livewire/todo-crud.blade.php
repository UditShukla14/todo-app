<div class="container-fluid">
    {{-- Header  --}}
    <header class="bg-dark text-white p-3 mb-4">
        <h1 class="text-center">To-Do List CRUD Application</h1>
    </header>

    <div class="row">
        {{-- Sidebar --}}
        <aside class="col-md-3 col-lg-2 bg-light sidebar p-3">
            <h4>Navigation</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('todos.form') }}">Add To-Do</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('todos.table') }}">View To-Dos</a>
                </li>
            </ul>
        </aside>

        {{-- Main Content Area --}}
        <main class="col-md-9 col-lg-10 p-4">
            <h2> To-Do List CRUD </h2>

            {{-- Success Message --}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            {{-- Form  --}}

            <form wire:submit="{{ $isEdit ? 'update' : 'store' }}" class= "bg-light p-4 rounded shadow-sm mb-4">
                <h4>{{$isEdit ?"Update To-Do":"Add New To-Do"}}</h4>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" wire:model.live="title" class="form-control" id="title" placeholder="Enter title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea wire:model.live="description" class="form-control" id="description" placeholder="Enter description"></textarea>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" wire:model.live="completed" class="form-check-input" id="completed">
                    <label class="form-check-label" for="completed">Completed</label>
                </div>

                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select wire:model.live="priority" class="form-select" id="priority">
                        @foreach($priority_array as $priority)
                            <option value="{{ $priority }}">{{ $priority }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="estimated_end_date" class="form-label">Estimated End Date</label>
                    <input type="date" wire:model.live="estimated_end_date" class="form-control" id="estimated_end_date">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select wire:model.live="status" class="form-select" id="status">
                        @foreach($status_array as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update' : 'Add' }}</button>
            </form>

                  <!-- To-Do List Table -->
                  <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Estimated End Date</th>
                            <th>Completed</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $todo)
                            <tr>
                                <td>{{ $todo['title'] }}</td>
                                <td>{{ $todo['description'] }}</td>
                                <td>{{ $todo['priority'] }}</td>
                                <td>{{ $todo['status'] }}</td>
                                <td>{{ $todo['estimated_end_date'] }}</td>
                                <td>{{ $todo['completed'] ? 'Yes' : 'No' }}</td>
                                <td>{{ $todo['created_at'] }}</td>
                                <td>{{ $todo['updated_at'] }}</td>
                                <td>
                                    <button wire:click="edit('{{ $todo['id'] }}')" class="btn btn-sm btn-info">Edit</button>
                                    <button wire:click="delete('{{ $todo['id'] }}')" class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </main>
        </div>
    
        <!-- Footer -->
        <footer class="bg-dark text-white text-center p-3 mt-4">
            <p>&copy; {{ date('Y') }} To-Do List App. All rights reserved.</p>
        </footer>
    </div>
            
  
</div>
