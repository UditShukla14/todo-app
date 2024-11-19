<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name', 'unit', 'sales_price', 'income_account', 'compare_at_price',
        'cost_per_item', 'expense_account', 'margin', 'markup', 'description',
        'status', 'obsolete', 'rm_image', 'draft', 'online_store', 'charge_tax'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($product) {
            HvacData::create([
                'product_id' => $product->id,
                'system_type' => 1,
                'heat_source' => 1,
                'home_type' => 1,
                'air_handler_furnace_location' => 1,
                'condenser_type' => 1,
                'zip_code' => '000000',
                'system_size' => 1,
            ]);
        });
    }
    public function hvacData()
    {
        return $this->hasOne(HvacData::class);
    }

    // Static methods for dropdown options
    public static function status_options() {
        return [1 => 'Active', 2 => 'Inactive'];
    }

    public static function obsoleted_options() {
        return [1 => 'Yes', 2 => 'No'];
    }

   
}
