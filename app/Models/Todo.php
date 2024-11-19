<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{

    use SoftDeletes;
    use HasFactory;
    protected $table='todos';
    protected $collection = 'todos';
    protected $fillable = ['title', 'description', 'completed', 'priority', 'estimated_end_date','status'];

    public static function Priorities(){
        return [1=>'Low',2=>'Medium',3=>'High'];
    }

    public static function Statuses(){
        return [1=>'Not Started',2=>'In Progress',3=>'Completed'];
    }

    public static function statusValues($key = null)
    {
        $statuses = self::Statuses();
    
        // If no key is provided
        if ($key === null) {
            return "";
        }
    
        // Return the value for the given key, or an empty string if the key is not found
        return $statuses[$key] ?? "";
    }
    
    public static function priorityValues($key = null)
    {
        $priorities = self::Priorities();
    
        // If no key is provided, return an empty string
        if ($key === null) {
            return "";
        }
    
        // Return the value for the given key, or an empty string if the key is not found
        return $priorities[$key] ?? "";
    }
    

    // other arrays or constants
    // always add default parameter value for all functions  to avoid errors
    // avoid function nesting 
}


