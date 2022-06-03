<?php

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

use App\Http\Controllers\EstudianteController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Listado de estudiantes
Route::get('/lista', [App\Http\Controllers\EstudianteController::class, 'list']);
//Formulario de estudiantes
Route::get('/form', [App\Http\Controllers\EstudianteController::class, 'estform']);
//Guardar estudiantes
Route::post('/save', [App\Http\Controllers\EstudianteController::class, 'save'])->name('save');
//Eliminar estudiantes
Route::delete('/delete/{id}', [App\Http\Controllers\EstudianteController::class, 'delete'])->name('delete');
//Formulario para editar estudiantes
Route::get('/editform/{id}', [App\Http\Controllers\EstudianteController::class, 'editform'])->name('editform');
//Edicion de estudiante
Route::patch('/edit/{id}', [App\Http\Controllers\EstudianteController::class, 'edit'])->name('edit');