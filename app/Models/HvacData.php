<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HvacData extends Model
{
    // Define the table if it's not the plural of the class name
    protected $table = 'hvac_data';

    // Define fillable properties if needed
    protected $fillable = [
        'product_id',
        'system_type',
        'heat_source',
        'home_type',
        'air_handler_furnace_location',
        'condenser_type',
        'zip_code',
        'system_size',
    ];

    public static function system_type_options() {
        return [1 => "Split System", 2 => "Package Unit", 3 => "Furnace Only"];
    }

    public static function heat_source_options() {
        return [1 => "Electric Gas Handler", 2 => "Gas Furnace"];
    }

    public static function home_type_options() {
        return [1 => "Permanent - On Slab", 2 => "Manufactured"];
    }

    public static function air_handler_furnace_location_options() {
        return [1 => "Attic", 2 => "Garage", 3 => "Closet", 4 => "Crawl Space"];
    }

    public static function system_size_options() {
        return [1 => "1.5 Tons", 2 => "2 Tons", 3 => "2.5 Tons", 4 => "3 Tons"];
    }

    public static function condenser_type_options() {
        return [1 => "Heat Pump", 2 => "Air Conditioner"];
    }

    public static function system_typeValues($key = null)
    {
        $system_type_options = self::system_type_options();
        return $key === null ? $system_type_options : ($system_type_options[$key] ?? "");
    }

    public static function heat_sourceValues($key = null)
    {
        $heat_source_options = self::heat_source_options();
        return $key === null ? $heat_source_options : ($heat_source_options[$key] ?? "");
    }

    public static function home_typeValues($key = null)
    {
        $home_type_options = self::home_type_options();
        return $key === null ? $home_type_options : ($home_type_options[$key] ?? "");
    }

    public static function air_handler_furnace_locationValues($key = null)
    {
        $air_handler_furnace_location_options = self::air_handler_furnace_location_options();
        return $key === null ? $air_handler_furnace_location_options : ($air_handler_furnace_location_options[$key] ?? "");
    }

    public static function system_sizeValues($key = null)
    {
        $system_size_options = self::system_size_options();
        return $key === null ? $system_size_options : ($system_size_options[$key] ?? "");
    }

    public static function condenser_typeValues($key = null)
    {
        $condenser_type_options = self::condenser_type_options();
        return $key === null ? $condenser_type_options : ($condenser_type_options[$key] ?? "");
    }
}