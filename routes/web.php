<?php

use App\Http\Controllers\Company\BenefitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidate\ExperiencesController;
use App\Http\Controllers\Candidate\EducationsController;
use App\Http\Controllers\Candidate\HomeController;
use App\Http\Controllers\Candidate\UsersController;
use App\Http\Controllers\Candidate\VolunteerExperiencesController;
use App\Http\Controllers\Company\CategoriesController;
use App\Http\Controllers\Company\ClientsController;
use App\Http\Controllers\Company\HomeController as CompanyHomeController;
use App\Http\Controllers\Company\JobsController;
use App\Http\Controllers\Company\UserController as CompanyUserController;

//Routes Web
Route::get('/', function () {
    return view('web.index');
});

//Routes Candidade
Route::prefix('/app')->middleware(['auth', 'candidate'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('app.dash');

    Route::get('/notification', [HomeController::class, 'viewNotify'])->name('app.view.notification');

    //Test Disc
    Route::get('/disc', [HomeController::class, 'disc'])->name('app.disc');
    Route::post('/disc', [HomeController::class, 'define'])->name('app.define');
    Route::get('/vaga/{job:slug}', [HomeController::class, 'jobItem'])->name('app.jobitem');

    Route::get('/experiencias', [ExperiencesController::class, 'index'])->name('app.experiences');
    Route::get('/experiencias/nova', [ExperiencesController::class, 'create'])->name('app.create.experiences');
    Route::post('/experiencias/nova', [ExperiencesController::class, 'store'])->name('app.store.experiences');
    Route::get('/experiencias/editar/{id}', [ExperiencesController::class, 'edit'])->name('app.edit.experiences');
    Route::put('/experiencias/editar/{id}', [ExperiencesController::class, 'update'])->name('app.update.experiences');
    Route::delete('/experiencias/{id}', [ExperiencesController::class, 'destroy'])->name('app.destroy.experiences');

    Route::get('/voluntarios', [VolunteerExperiencesController::class, 'index'])->name('app.volunteers');
    Route::get('/voluntario/nova', [VolunteerExperiencesController::class, 'create'])->name('app.create.volunteers');
    Route::post('/voluntario/nova', [VolunteerExperiencesController::class, 'store'])->name('app.store.volunteers');
    Route::get('/voluntario/editar/{id}', [VolunteerExperiencesController::class, 'edit'])->name('app.edit.volunteers');
    Route::put('/voluntario/editar/{id}', [VolunteerExperiencesController::class, 'update'])->name('app.update.volunteers');
    Route::delete('/voluntario/{id}', [VolunteerExperiencesController::class, 'destroy'])->name('app.destroy.volunteers');

    Route::get('/cursos', [EducationsController::class, 'index'])->name('app.educations');
    Route::get('/cursos/novo', [EducationsController::class, 'create'])->name('app.create.educations');
    Route::post('/cursos/novo', [EducationsController::class, 'store'])->name('app.store.educations');
    Route::get('/cursos/editar/{id}', [EducationsController::class, 'edit'])->name('app.edit.educations');
    Route::put('/cursos/editar/{id}', [EducationsController::class, 'update'])->name('app.update.educations');
    Route::delete('/cursos/{id}', [EducationsController::class, 'destroy'])->name('app.destroy.educations');

    Route::get('/perfil', [UsersController::class, 'index'])->name('app.perfil');
    Route::post('/profile', [UsersController::class, 'update'])->name('app.update.perfil');

    Route::get('/minhas-vagas', [HomeController::class, 'myJobs'])->name('app.jobs');
    Route::post('/minhas-vagas/vincular', [HomeController::class, 'storeUserJob'])->name('app.link');
    Route::delete('/minhas-vagas/deletar/{id}', [HomeController::class, 'destroyUserJob'])->name('app.jobitem.destroy');
});


//Routes Company
Route::prefix('/company')->middleware(['auth', 'company'])->group(function () {
    Route::get('/', [CompanyHomeController::class, 'index'])->name('company.dash');

    //Infos Candidate
    Route::get('/candidato/{user:slug}', [CompanyHomeController::class, 'show'])->name('company.user');

    //Interested
    Route::get('/interessados', [CompanyHomeController::class, 'interested'])->name('company.interested');
    Route::delete('/interessados/{id}', [CompanyHomeController::class, 'interestedDestroy'])->name('company.interested.destroy');

    //Jobs
    Route::get('/jobs', [JobsController::class, 'index'])->name('company.jobs');
    Route::get('/jobs/novo', [JobsController::class, 'create'])->name('company.create.jobs');
    Route::post('/jobs/novo', [JobsController::class, 'store'])->name('company.store.jobs');
    Route::get('/jobs/editar/{job}', [JobsController::class, 'edit'])->name('company.edit.jobs');
    Route::put('/jobs/editar/{job}', [JobsController::class, 'update'])->name('company.update.jobs');
    Route::delete('/job/{id}', [JobsController::class, 'destroy'])->name('company.destroy.jobs');

    //Clients
    Route::get('/clientes', [ClientsController::class, 'index'])->name('company.clients');
    Route::get('/cliente/novo', [ClientsController::class, 'create'])->name('company.create.clients');
    Route::post('/cliente/novo', [ClientsController::class, 'store'])->name('company.store.clients');
    Route::get('/cliente/editar/{client}', [ClientsController::class, 'edit'])->name('company.edit.clients');
    Route::put('/cliente/editar/{client}', [ClientsController::class, 'update'])->name('company.update.clients');
    Route::delete('/cliente/{id}', [ClientsController::class, 'destroy'])->name('company.destroy.clients');

    //Categories
    Route::get('/categorias', [CategoriesController::class, 'index'])->name('company.categories');
    Route::get('/categoria/novo', [CategoriesController::class, 'create'])->name('company.create.categories');
    Route::post('/categoria/novo', [CategoriesController::class, 'store'])->name('company.store.categories');
    Route::get('/categoria/editar/{category}', [CategoriesController::class, 'edit'])->name('company.edit.categories');
    Route::put('/categoria/editar/{category}', [CategoriesController::class, 'update'])->name('company.update.categories');
    Route::delete('/categorias/{id}', [CategoriesController::class, 'destroy'])->name('company.destroy.categories');

    //Benefits
    Route::get('/beneficios', [BenefitController::class, 'index'])->name('company.benefits');
    Route::get('/beneficio/novo', [BenefitController::class, 'create'])->name('company.create.benefits');
    Route::post('/beneficio/novo', [BenefitController::class, 'store'])->name('company.store.benefits');
    Route::get('/beneficio/editar/{benefit}', [BenefitController::class, 'edit'])->name('company.edit.benefits');
    Route::put('/beneficio/editar/{benefit}', [BenefitController::class, 'update'])->name('company.update.benefits');
    Route::delete('/beneficio/{id}', [BenefitController::class, 'destroy'])->name('company.destroy.benefits');


    //Profile
    Route::get('/perfil', [CompanyUserController::class, 'index'])->name('company.profile');
    Route::post('/profile', [CompanyUserController::class, 'update'])->name('company.update.perfil');
});

require __DIR__ . '/auth.php';
