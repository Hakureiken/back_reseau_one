<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspoController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PropaleController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\OrganizationController;

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

// routes webhook
Route::get('/webhook-create-module',[ EspoController::class, "webhookCreateModule"])->name('webhook.module.create');
Route::get('/webhook-create-formation',[ EspoController::class, "webhookCreateFormation"])->name('webhook.formation.create');
Route::get('/webhook-create-user',[ EspoController::class, "webhookCreateUser"])->name('webhook.user.create');
Route::get('/webhook-create-organization',[ EspoController::class, "webhookCreateOrganization"])->name('webhook.organization.create');
Route::get('/webhook-create-document',[ EspoController::class, "webhookCreateDocument"])->name('webhook.document.create');
 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('formation',FormationController::class);
Route::resource('document',DocumentController::class);
Route::resource('propale',PropaleController::class);
Route::resource('organization',OrganizationController::class);
Route::resource('project',ProjectController::class);
Route::resource('contact_form',ContactFormController::class);
Route::resource('module',ModuleController::class);
