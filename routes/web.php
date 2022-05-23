<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidate\ExperiencesController;
use App\Http\Controllers\Candidate\EducationsController;


//Routes Web
Route::get('/', function () {
    return view('web.index');
});

//Routes Candidade
Route::prefix('/app')->middleware(['auth', 'candidate'])->group(function(){
    Route::get('/', function(){
        return view('candidate.index');
    })->name('app.dash');

    Route::get('/vaga/id', function(){
        return view('candidate.job');
    })->name('app.jobitem');

    Route::get('/experiencias', [ExperiencesController::class, 'index'])->name('app.experiences');

    Route::get('/cursos', [EducationsController::class, 'index'])->name('app.educations');

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