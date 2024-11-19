@extends('layouts.app')

@section('content')
<div class="container mt-5">
    
    @include('component.navigation-tabs', ['selectedTab' => $selectedTab])
    <!-- Tab Content -->
    <div class="tab-content mt-4">
        @if($selectedTab === 'edit')
            <div id="edit" class="tab-pane active">
                <!-- Edit tab content here -->
                @livewire('product-create', ['product_id' => $product_id])
            </div>
        @elseif($selectedTab === 'hvac')
            <div id="hvac" class="tab-pane active">
                <!-- HVAC tab content here -->
               @livewire('product-hvac', ['product_id' => $product_id])
            </div>
        @endif
    </div>
</div>
@endsection
