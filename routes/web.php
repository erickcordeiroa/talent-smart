<?php

use Illuminate\Support\Facades\Route;


//Routes Web
Route::get('/', function () {
    return view('web.index');
});

//Routes Candidade
Route::prefix('/app')->middleware(['auth', 'candidate'])->group(function(){
    Route::get('/', function(){
        return view('candidate.index');
    })->name('app.dash');

    Route::get('/experiencias', function(){
        return view('candidate.experiences.experiences');
    })->name('app.experiences');

    Route::get('/cursos', function(){
        return view('candidate.educations.educations');
    })->name('app.educations');

    Route::get('/perfil', function(){
        return view('candidate.profile.perfil');
    })->name('app.perfil');
    Route::get('/minhas-vagas', function(){
        return view('candidate.jobs.list');
    })->name('app.jobs');
});


//Routes Company
Route::prefix('/company')->middleware(['auth', 'company'])->group(function(){
    Route::get('/', function(){
        return view('company.index');
    })->name('company.dash');
});

require __DIR__.'/auth.php';