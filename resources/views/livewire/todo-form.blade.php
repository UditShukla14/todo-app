<div class="container mt-4"> <!-- Single root element for the component -->
    <h2>{{ $todo_id ? 'Edit To-Do' : 'Add New To-Do' }}</h2>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit="save" class="bg-light p-4 rounded shadow-sm mb-4">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" wire:model.live="title" class="form-control" id="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea wire:model.live="description" class="form-control" id="description" rows="3"></textarea>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" wire:model.live="completed" class="form-check-input" id="completed">
            <label class="form-check-label" for="completed">Completed</label>
        </div>

        <div class="mb-3">
           <label class="form-label">Priority:</label>
           <select wire:model.live="priority" class="form-select" id="priority">
                @foreach ($priorities as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach 
            </select>
        </div>

        <div class="mb-3">
            <label for="estimated_end_date" class="form-label">Estimated End Date</label>
            <input type="date" wire:model.live="estimated_end_date" class="form-control" id="estimated_end_date">
        </div>

        <div class="mb-3">
            <label class="form-label">Status:</label>
            <div>
                @foreach ($statuses as $key => $value)
                    <label class="form-check-label">
                        <input type="radio" wire:model.live="status" value="{{ $key }}" class="form-check-input">
                        {{ $value }}
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ $todo_id ? 'Update' : 'Add' }}</button>
    </form>
</div> <!-- End of the single root element -->
