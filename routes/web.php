<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidate\ExperiencesController;
use App\Http\Controllers\Candidate\EducationsController;
use App\Http\Controllers\UsersController;

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
    Route::get('/experiencias/nova', [ExperiencesController::class, 'create'])->name('app.create.experiences');
    Route::post('/experiencias/nova', [ExperiencesController::class, 'store'])->name('app.store.experiences');

    Route::get('/cursos', [EducationsController::class, 'index'])->name('app.educations');
    Route::get('/cursos/novo', [EducationsController::class, 'create'])->name('app.create.educations');
    Route::post('/cursos/novo', [EducationsController::class, 'store'])->name('app.store.educations');

    Route::get('/perfil', [UsersController::class, 'index'])->name('app.perfil');
    Route::post('/profile', [UsersController::class, 'update'])->name('app.update.perfil');

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