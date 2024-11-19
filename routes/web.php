<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Livewire\TodoCrud;
use App\Livewire\TodoForm;
use App\Livewire\TodoTable;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [TodoController::class, 'index'])->name('todos.index');

Route::get('/todos/form/{todo_id?}', [TodoController::class, 'form'])->name('todos.form');

Route::get('/todos/table', [TodoController::class, 'table'])->name('todos.table');

// Product Routes
Route::get("/products",[ProductController::class,'index'])->name('products.table');
Route::get("/products/add",[ProductController::class,'create'])->name('products.create');
Route::get('/products/{action}/{product_id}', [ProductController::class, 'handleAction'])->name('products.handleAction');

