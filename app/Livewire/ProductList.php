<?php 
namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
class ProductList extends Component
{
    public $products;
    public $searchTerm='';

    public function mount($products)
    {   
        // dd($products);
        $this->products = $products;
    }

    public function edit($id){
        // dd($id);
        $this->product = Product::find($id);
        return redirect()->route('products.handleAction',['action'=>'edit',$id]);
    }

    public function delete($id){
        Product::find($id)->delete();
        session()->flash('success','Product deleted successfully');
        return redirect()->route('products.table');
    }
    public function render()
    {            
        return view('livewire.product-list')->layout('layouts.app');
    }

   
}