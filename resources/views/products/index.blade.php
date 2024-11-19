@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Success Message -->
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Render Livewire ProductList Component -->
    @livewire('product-list', ['products' => $products])

</div>
@endsection
