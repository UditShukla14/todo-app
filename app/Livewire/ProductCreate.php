<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
class ProductCreate extends Component
{
    public $product_id;
    public $name;
    public $unit;
    public $sales_price;
    public $income_account;
    public $compare_at_price;
    public $cost_per_item;
    public $expense_account;
    public $margin;
    public $markup;
    public $description;
    public $status = null;
    public $obsolete = null;
    public $rm_image;
    public $draft;
    public $online_store;
    public $charge_tax;
    public $statuses=[];
    public $obsoleted=[];

    public function mount($product_id = null){
        $this->statuses = Product::status_options();
        $this->obsoleted = Product::obsoleted_options();
        $this->margin = 0;
        $this->markup = 0;
        
        if($product_id){
            $this->loadProductData($product_id);
            // dd($this);
        }
    }

        public function loadProductData($product_id)
{
    $product = Product::findOrFail($product_id);

    // Populate properties from the product data
    $this->product_id = $product->id;
    $this->name = $product->name;
    $this->unit = $product->unit;
    $this->sales_price = $product->sales_price;
    $this->income_account = $product->income_account;
    $this->compare_at_price = $product->compare_at_price;
    $this->cost_per_item = $product->cost_per_item;
    $this->expense_account = $product->expense_account;
    $this->margin = $product->margin;
    $this->markup = $product->markup;
    $this->description = $product->description;
    $this->status = $product->status;
    $this->obsolete = $product->obsolete;
        $this->online_store = $product->online_store;
        $this->charge_tax = $product->charge_tax;
        // Convert specific attributes to boolean for checkbox compatibility
        $this->rm_image = boolval($product->rm_image);
        $this->draft = boolval($product->draft);
        $this->online_store = boolval($product->online_store);
        $this->charge_tax = boolval($product->charge_tax);
    }

    public function updated($field){
        if (in_array($field, ['cost_per_item', 'margin', 'sales_price', 'markup'])) {
            $this->calculateMargin();
            // dd($this);
        }
    }
    public function calculateMargin()
    {
        if ($this->cost_per_item && $this->margin) {
            // Calculate sales price based on margin percentage
            $this->sales_price = $this->cost_per_item / (1 - ($this->margin / 100));
        } elseif ($this->cost_per_item && $this->sales_price) {
            // Calculate margin based on cost per item and sales price
            $this->margin = (($this->sales_price - $this->cost_per_item) / $this->sales_price) * 100;
        }
    
        if ($this->sales_price && $this->cost_per_item) {
            // Calculate markup based on cost per item and sales price
            $this->markup = (($this->sales_price - $this->cost_per_item) / $this->cost_per_item) * 100;
        } elseif ($this->cost_per_item && $this->markup) {
            // Calculate sales price based on markup percentage
            $this->sales_price = $this->cost_per_item * (1 + ($this->markup / 100));
        }
    }
    

    public function store(){

        $this->calculateMargin();
        // dd($this);
       
        Product::updateOrCreate(['id' => $this->product_id], $this->all());

        session()->flash('success','Product created successfully');
        return redirect()->route('products.table');
    }
    
 

   
    public function render()
    {
        return view('livewire.product-create');
    }
}
