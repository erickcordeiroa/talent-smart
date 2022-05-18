<?php

use Illuminate\Support\Facades\Route;


//Routes Web
Route::get('/', function () {
    return view('welcome');
});

//Routes Candidade
Route::prefix('/app')->middleware(['auth', 'candidate'])->group(function(){
    Route::get('/', function(){
        return view('candidate.index');
    })->name('app.dash');
});


//Routes Company
Route::prefix('/company')->middleware(['auth', 'company'])->group(function(){
    Route::get('/', function(){
        return view('company.index');
    })->name('company.dash');
});