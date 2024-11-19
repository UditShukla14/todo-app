<div>

</div>
<div class="container">
    <h4 class="mb-4">Add New Product</h4>

    <div class="mt-4 d-flex gap-4">
        <div class="flex-fill">
            <label for="name">Product Name</label>
            <input type="text" name="name" wire:model="name" class="form-control" placeholder="Product Name">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="flex-fill">
            <label for="unit">Product Unit</label>
            <input type="text" name="unit" wire:model="unit" class="form-control" placeholder="Product Unit">
            @error('unit') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <h5 class="mt-4">Pricing</h5>
    <hr>

    <div class="mt-4 d-flex gap-4">
        <div class="flex-fill">
            <label for="sales_price">Sales Price</label>
            <input type="text" name="sales_price" wire:model.debounce.500ms="sales_price" class="form-control" placeholder="Sales Price" wire:change="calculateMargin">
            @error('sales_price') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="flex-fill">
            <label for="income_account">Income Account</label>
            <input type="text" name="income_account" wire:model="income_account" class="form-control" placeholder="Income Account">
            @error('income_account') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="flex-fill">
            <label for="expense_account">Expense Account</label>
            <input type="text" name="expense_account" wire:model="expense_account" class="form-control" placeholder="Expense Account">
            @error('expense_account') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="mt-4 d-flex gap-4">
        <div class="flex-fill">
            <label for="cost_per_item">Cost per Item</label>
            <input type="text" name="cost_per_item" wire:model.debounce.500ms="cost_per_item" class="form-control" placeholder="Cost per Item" wire:change="calculateMargin">
            @error('cost_per_item') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
       
        <div class="flex-fill">
            <label for="margin">Margin</label>
            <input type="text" name="margin" wire:model.debounce.500ms="margin" class="form-control" placeholder="Margin %" wire:change="calculateMargin">
            @error('margin') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="flex-fill">
            <label for="markup">Markup</label>
            <input type="text" name="markup" wire:model.debounce.500ms="markup" class="form-control" placeholder="Markup %" wire:change="calculateMargin">
            @error('markup') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="flex-fill">
            <label for="compare_at_price">Compare at Price</label>
            <input type="text" name="compare_at_price" wire:model="compare_at_price" class="form-control" placeholder="Compare at Price">
            @error('compare_at_price') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <h5 class="mt-4">Description</h5>
    <hr>

    <div class="mt-4">
        <label for="description">Description</label>
        <textarea name="description" wire:model="description" class="form-control" rows="3"></textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mt-4 d-flex gap-4">
        <div class="flex-col flex-fill">
            <label for="status">Product Status</label>
            <select name="status" wire:model="status" class="form-select">
                <option value="" disabled>Select Status</option>
                @foreach ($statuses as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="flex-col flex-fill">
            <label for="obsolete">Product Obsolete</label>
            <select name="obsolete" wire:model="obsolete" class="form-select">
                <option value="" disabled>Select Obsolete</option>
                @foreach ($obsoleted as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('obsolete') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="mt-4 d-flex gap-4">
        <div class="flex-col">
            <button type="button" wire:click="uploadImage" class="btn btn-primary">Upload new photo</button>
            <p class="mt-2 text-muted small">Allowed JPG, GIF or PNG. Max size of 800kB.</p>
        </div>
        <div>
            <input type="checkbox" wire:model="rm_image" name="rm_image" class="form-check-input">
            <label for="rm_image" class="form-check-label">Remove Image</label>
        </div>
        <div>
            <input type="checkbox" wire:model="draft" name="draft" class="form-check-input">
            <label for="draft" class="form-check-label">Product on Draft</label>
        </div>
        <div>
            <input type="checkbox" wire:model="online_store" name="online_store" class="form-check-input">
            <label for="online_store" class="form-check-label">Online Store</label>
        </div>
        <div>
            <input type="checkbox" wire:model="charge_tax" name="charge_tax" class="form-check-input">
            <label for="charge_tax" class="form-check-label">Charge Tax</label>
        </div>
    </div>
    <hr>
    <div class="text-end mt-4">
        <button type="button" wire:click="store" class="btn btn-primary">Add Product</button>
    </div>
</div>
