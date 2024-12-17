<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [AboutController::class, 'sayHelloToGirls']);
// Route::get('/myform', [AboutController::class, 'showForm']);
// Route::post('/submit', [AboutController::class, 'getFormData']);

// Route::prefix('abcd')->group(function(){
//     Route::get('/myform', [AboutController::class, 'showForm']);
//     Route::post('/submit', [AboutController::class, 'getFormData']);
// });

Route::prefix('abcd')->group(function(){
    Route::get('/myform', [AboutController::class, 'showForm']);
    Route::post('/submit', [AboutController::class, 'getFormData']);
});

// Route::controller(AboutController::class)
// ->prefix('')
