<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidate\ExperiencesController;
use App\Http\Controllers\Candidate\EducationsController;
use App\Http\Controllers\Candidate\HomeController;
use App\Http\Controllers\Candidate\UsersController;
use App\Http\Controllers\Company\HomeController as CompanyHomeController;
use App\Http\Controllers\Company\JobsController;
use App\Http\Controllers\Company\UserController as CompanyUserController;

//Routes Web
Route::get('/', function () {
    return view('web.index');
});

//Routes Candidade
Route::prefix('/app')->middleware(['auth', 'candidate'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('app.dash');

    //Test Disc
    Route::get('/disc', [HomeController::class, 'disc'])->name('app.disc');

    Route::get('/vaga/{id}', function(){
        return view('candidate.jobs.jobitem');
    })->name('app.jobitem');

    Route::get('/experiencias', [ExperiencesController::class, 'index'])->name('app.experiences');
    Route::get('/experiencias/nova', [ExperiencesController::class, 'create'])->name('app.create.experiences');
    Route::post('/experiencias/nova', [ExperiencesController::class, 'store'])->name('app.store.experiences');
    Route::get('/experiencias/editar/{id}', [ExperiencesController::class, 'edit'])->name('app.edit.experiences');
    Route::put('/experiencias/editar/{id}', [ExperiencesController::class, 'update'])->name('app.update.experiences');
    Route::delete('/experiencias/{id}', [ExperiencesController::class, 'destroy'])->name('app.destroy.experiences');

    //Finalizar Crud Amanha Cedo
    Route::get('/cursos', [EducationsController::class, 'index'])->name('app.educations');
    Route::get('/cursos/novo', [EducationsController::class, 'create'])->name('app.create.educations');
    Route::post('/cursos/novo', [EducationsController::class, 'store'])->name('app.store.educations');
    Route::get('/cursos/editar/{id}', [EducationsController::class, 'edit'])->name('app.edit.educations');
    Route::put('/cursos/editar/{id}', [EducationsController::class, 'update'])->name('app.update.educations');
    Route::delete('/cursos/{id}', [EducationsController::class, 'destroy'])->name('app.destroy.educations');

    Route::get('/perfil', [UsersController::class, 'index'])->name('app.perfil');
    Route::post('/profile', [UsersController::class, 'update'])->name('app.update.perfil');

    Route::get('/minhas-vagas', function(){
        return view('candidate.jobs.list');
    })->name('app.jobs');
});


//Routes Company
Route::prefix('/company')->middleware(['auth', 'company'])->group(function(){
    Route::get('/', [CompanyHomeController::class, 'index'])->name('company.dash');

    //Jobs
    Route::get('/jobs', [JobsController::class, 'index'])->name('company.jobs');
    Route::get('/jobs/novo', [JobsController::class, 'create'])->name('company.create.jobs');

    //Profile
    Route::get('/perfil', [CompanyUserController::class, 'index'])->name('company.profile');
    Route::post('/profile', [CompanyUserController::class, 'update'])->name('company.update.perfil');
});

require __DIR__.'/auth.php';