<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::controller(DocumentController::class)
->prefix('document')
->group(function(){
    Route::get('/', 'index');
    Route::get('/create', 'create')->name('document.create');
});

// Route::get('/', [AboutController::class, 'sayHelloToGirls']);
Route::get('/myform', [AboutController::class, 'showForm'])->name('myform');
Route::post('/submit', [AboutController::class, 'getFormData'])->name('submit');

// Route::prefix('abcd')->group(function(){
//     Route::get('/myform', [AboutController::class, 'showForm']);
//     Route::post('/submit', [AboutController::class, 'getFormData']);
// });

// Route::prefix('abcd')->group(function(){
//     Route::get('/myform', [AboutController::class, 'showForm']);
//     Route::post('/submit', [AboutController::class, 'getFormData']);
// });

Route::get('about/{id}', [AboutController::class, 'showEditPage'])->name('edit.about');

Route::post('update/{id}', [AboutController::class, 'updateAboutData'])->name('update');

Route::get('users', [AboutController::class, 'getQueryParameters']);

//We are using "get" method because we are going to use the search/address bar in the browser
//Let's go to the browser and test our code
//We did not get anything after our dd(). Who can tell us the reason?
//Richard, are you talking about: 'users'?
//The most important thing is the main route. Query parameters are not part of the main route. Route parameters are the ones that are part of the main route.

//In essence,

Route::get('show-page-one', function(){
    return view('telecel_widget.page_one');
});

Route::get('redirect', function(){
    return view('telecel_widget.page_two');
});