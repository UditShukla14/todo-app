<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function handleAction($action, $product_id)
    {
        $validActions = ['edit', 'hvac']; // Define valid actions
        if (!in_array($action, $validActions)) {
            abort(404, 'Invalid action'); // Handle invalid actions
        }

        // Return the appropriate view with dynamic parameters
        return view('products.edit', [
            'product_id' => $product_id,
            'selectedTab' => $action,
        ]);
    }
}
