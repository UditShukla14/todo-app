<div> <!-- Wrap in a single root div to avoid multiple root elements error -->

    <div class="text-end mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
    </div>

    <!-- Search bar -->
    <div class="mb-4 d-flex mt-4">
        <input type="text" wire:model.debounce.300ms="searchTerm" class="form-control me-2" placeholder="Search Products by name or description...">
    </div>

    <!-- Table to display products -->
    <div class="table-container">
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr class="text-center">
                    <th style="font-size: 1.1rem; font-weight: 400;">Updated At</th>
                    <th style="font-size: 1.1rem; font-weight: 400;">Name</th>
                    <th style="font-size: 1.1rem; font-weight: 400;">Image</th>
                    <th style="font-size: 1.1rem; font-weight: 400;">Description</th>
                    <th style="font-size: 1.1rem; font-weight: 400;">Sales Price</th>
                    <th style="font-size: 1.1rem; font-weight: 400;">Cost Price</th>
                    <th style="font-size: 1.1rem; font-weight: 400;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr class="text-center">
                        <td>{{ $product->updated_at }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{ $product->image }}" alt="Product Image" width="50" height="50" style="border-radius: 8px;"></td>
                        <td><textarea class="form-control" rows="1" readonly>{{ $product->description }}</textarea></td>
                        <td>$ {{ $product->sales_price }}</td>
                        <td>$ {{ $product->cost_per_item }}</td>
                        <td>
                            <a href="{{ route('products.handleAction',['action'=>'edit',$product->id]) }}" class="btn btn-sm btn-info">Edit</a>
                            <button wire:click="delete({{ $product->id }})" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No products found.</td> 
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div> <!-- End of single root div -->
