@extends('layouts.app') {{-- Extends the layout file --}}

{{-- @section('title', $todo_id ? 'Edit To-Do' : 'Add New To-Do') Optional: sets a dynamic page title --}}

@section('content')
    @livewire('todo-table') {{-- Loads the Livewire component --}}
@endsection