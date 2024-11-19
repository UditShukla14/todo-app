@extends('layouts.app') {{-- Extends the layout file --}}

{{-- @section('title', $todo_id ? 'Edit To-Do' : 'Add New To-Do') Optional: sets a dynamic page title --}}

@section('content')
@livewire('todo-form', ['todo_id' => $todo_id ?? null]) {{-- Loads the Livewire component --}}
@endsection