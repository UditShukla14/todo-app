@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Success Message -->
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Render Livewire ProductCreate Component -->
   @if(isset($product_id))
    @include('component.navigation-tabs', ['selectedTab' => $selectedTab, 'product_id' => $product_id])
    @livewire('product-create',['product_id' => $product_id])
   @else
    @livewire('product-create')
   @endif

</div>
@endsection
