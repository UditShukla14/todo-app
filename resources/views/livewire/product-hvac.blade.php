<div class="container mt-5">
    <h5 class="mt-4">HVAC Industry Additional Fields</h5>
    <hr>

    <div id="hvac-options" class="row gy-4">
        <!-- First Column -->
        <div  >
            <label for="system_type" class="form-label">Type of System</label>
            <select name="system_type" wire:model.live="system_type" id="system_type" class="form-select">
                <option value="">Select System Type</option>
                @foreach ($system_type_options as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('system_type')
                <small class="form-error text-danger">{{ $message }}</small>
            @enderror

            <label for="heat_source" class="form-label mt-3">Heat Source</label>
            <select name="heat_source" wire:model.live="heat_source" id="heat_source" class="form-select">
                <option value="">Select Heat Source</option>
                @foreach ($heat_source_options as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('heat_source')
                <small class="form-error text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Second Column -->
        <div  >
            <label for="home_type" class="form-label">Type of Home</label>
            <select name="home_type" wire:model.live="home_type" id="home_type" class="form-select">
                <option value="">Select Home Type</option>
                @foreach ($home_type_options as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('home_type')
                <small class="form-error text-danger">{{ $message }}</small>
            @enderror

            <label for="air_handler_furnace_location" class="form-label mt-3">Air Handler/Furnace Location</label>
            <select name="air_handler_furnace_location" wire:model.live="air_handler_furnace_location" id="air_handler_furnace_location" class="form-select">
                <option value="">Select Location</option>
                @foreach ($air_handler_furnace_location_options as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('air_handler_furnace_location')
                <small class="form-error text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Third Column -->
        <div  >
            <label for="system_size" class="form-label">System Size</label>
            <select name="system_size" wire:model.live="system_size" id="system_size" class="form-select">
                <option value="">Select System Size</option>
                @foreach ($system_size_options as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('system_size')
                <small class="form-error text-danger">{{ $message }}</small>
            @enderror

            <label for="condenser_type" class="form-label mt-3">Condenser Type</label>
            <select name="condenser_type" wire:model.live="condenser_type" id="condenser_type" class="form-select">
                <option value="">Select Condenser Type</option>
                @foreach ($condenser_type_options as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('condenser_type')
                <small class="form-error text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="mt-4">
        <label class="form-label">Product Available Zip Code</label>
        <input type="text" name="zip_code" wire:model.live="zip_code" id="zip_code" class="form-control" placeholder="Zip Code">
        @error('zip_code')
            <small class="form-error text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mt-4">
        <label class="form-label">Upload Files</label>

        <!-- Styled Dropzone -->
        <div id="dropzone" 
             class="dropzone p-3 border border-secondary rounded text-center"
             onclick="document.getElementById('fileInput').click()"
             style="position: relative; height: 200px; display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 10px;">
            <p class="w-100">Drop files here to upload or click to select files</p>
            <input type="file" id="fileInput" wire:model="file" multiple class="d-none">

            <!-- Preview the uploaded files -->
            @if ($file)
                @foreach ($file as $file)
                    <div style="width: 80px; height: 80px; position: relative; overflow: hidden; border: 1px solid #ddd; border-radius: 5px;">
                        <img src="{{ $file->temporaryUrl() }}" alt="Preview" 
                             class="img-fluid w-100 h-100" 
                             style="object-fit: cover;">
                    </div>
                @endforeach
            @endif
        </div>

        @error('files.*')
            <small class="form-error text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="text-end mt-4">
        <button wire:click="store" class="btn btn-primary">Add Details</button>
    </div>
</div>
