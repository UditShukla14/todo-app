<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\HvacData;

class ProductHvac extends Component
{
    use WithFileUploads;

    public $product_id;
    public $system_type = '';
    public $heat_source = '';
    public $home_type = '';
    public $air_handler_furnace_location = '';
    public $condenser_type = '';
    public $zip_code = '';
    public $system_size = '';
    public $file; // Property for file upload

    // Define dropdown options as public properties
    public $system_type_options = [];
    public $heat_source_options = [];
    public $home_type_options = [];
    public $air_handler_furnace_location_options = [];
    public $system_size_options = [];
    public $condenser_type_options = [];

    public function mount($product_id = null, $selectedTab = 'hvac')
    {
        $this->product_id = $product_id;

        // Initialize dropdown options from model methods
        $this->system_type_options = HvacData::system_typeValues();
        $this->heat_source_options = HvacData::heat_sourceValues();
        $this->home_type_options = HvacData::home_typeValues();
        $this->air_handler_furnace_location_options = HvacData::air_handler_furnace_locationValues();
        $this->system_size_options = HvacData::system_sizeValues();
        $this->condenser_type_options = HvacData::condenser_typeValues();

        // Load existing product data if editing
        if ($this->product_id) {
            $hvacData = HvacData::where('product_id', $this->product_id)->first();
            if ($hvacData) {
                $this->system_type = $hvacData->system_type;
                $this->heat_source = $hvacData->heat_source;
                $this->home_type = $hvacData->home_type;
                $this->air_handler_furnace_location = $hvacData->air_handler_furnace_location;
                $this->condenser_type = $hvacData->condenser_type;
                $this->zip_code = $hvacData->zip_code;
                $this->system_size = $hvacData->system_size;
                $this->file = $hvacData->file_path;
            }
        }
    }

    public function store()
{
    $data = [
        'system_type' => $this->system_type,
        'heat_source' => $this->heat_source,
        'home_type' => $this->home_type,
        'air_handler_furnace_location' => $this->air_handler_furnace_location,
        'condenser_type' => $this->condenser_type,
        'zip_code' => $this->zip_code,
        'system_size' => $this->system_size,
    ];

    // Handle multiple file uploads if files are provided
    if ($this->file && is_array($this->file)) {
        $filePaths = [];
        foreach ($this->file as $file) {
            $filePaths[] = $file->store('hvac_files', 'public');
        }
        $data['file_path'] = json_encode($filePaths); // Save file paths as JSON
    } elseif ($this->file) {
        // Handle single file upload if only one file is provided
        $data['file_path'] = $this->file->store('hvac_files', 'public');
    }

    // Save or update the record
    HvacData::updateOrCreate(['product_id' => $this->product_id], $data);

    session()->flash('message', 'HVAC data saved successfully!');
    return redirect()->route('products.table');
}



    public function render()
    {
        return view('livewire.product-hvac');
    }
}
