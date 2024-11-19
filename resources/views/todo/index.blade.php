@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage To-Dos</h1>
    
    <div class="row mt-4">
        <!-- Form Column -->
        <div class="col-md-4">
            <div class="bg-light p-3 rounded shadow-sm">
                <h2 class="h5">Add/Edit To-Do</h2>
                @livewire('todo-form') <!-- Livewire component for the form -->
            </div>
        </div>

        <!-- Table Column -->
        <div class="col-md-8">
            <div class="bg-white p-3 rounded shadow-sm">
                <h2 class="h5">To-Do List</h2>
                @livewire('todo-table') <!-- Livewire component for the table -->
            </div>
        </div>
    </div>
</div>
@endsection
