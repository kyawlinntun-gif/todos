<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* ---------- Start of Todo Routes ---------- */
Route::get('/todos', [TodosController::class, 'index']);
Route::post('/todos/add', [TodosController::class, 'store']);
Route::get('/todos/{todo}', [TodosController::class, 'edit']);
Route::match(['put', 'patch'], '/todos/{todo}', [TodosController::class, 'update']);
Route::put('/todos/completed/{todo}', [TodosController::class, 'completed']);
Route::delete('/todos/{todo}', [TodosController::class, 'destroy']);
/* ---------- End of Todo Routes ---------- */
