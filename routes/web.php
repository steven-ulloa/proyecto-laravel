<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\ProvinciasController;
use App\Http\Controllers\UsersController;




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




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//RUTAS PARA LOS USERS



// Route::middleware('auth')->group(function () {
//     //rutas para user
//     Route::resource('user', UsersController::class);

//     });

  Route::middleware('auth')->group(function () {
  //rutas para user
       Route::get('/user',[UsersController::class, 'index'])->name('user');
       Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
       Route::post('/user/store', [UsersController::class, 'store'])->name('user.store');
       //route::get('/user/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
       //Route::patch('/user/{user}', [UsersController::class, 'update'])->name('user.update');
       //este estoy usando para el edit modal
      route::get('/user/{id}', [UsersController::class, 'edit'])->name('user.edit');

       //este es para el update
      //*Route::put('user/{id}', [UsersController::class, 'update'])->name('user.update');
      Route::put('actualizar', [UsersController::class, 'update'])->name('user.update');



      //

     // aqui acaba
    //  Route::patch('/user/{user}', [UsersController::class, 'update'])->name('user.update');
     route::delete('/user/{user}', [UsersController::class, 'destroy'])->name('user.destroy');
      route::get('/user/{id}/show', [UsersController::class, 'show'])->name('user.show');



 });



//RUTAS PARA LAS CIUDADES
Route::get('ciudad/{id}', [CiudadesController::class, 'getCiudades'])->name('getCiudades');//ruta para el registro de las ciudades

Route::middleware('auth')->group(function () {
    Route::get('/ciudad',[CiudadesController::class, 'index'])->name('ciudad');
    Route::get('/ciudad/create', [CiudadesController::class, 'create'])->name('ciudad.create');
    Route::post('/ciudad/store', [CiudadesController::class, 'store'])->name('ciudad.store');
    route::get('/ciudad/{id}/edit', [CiudadesController::class, 'edit'])->name('ciudad.edit');
    Route::patch('/ciudad/{id}', [CiudadesController::class, 'update'])->name('ciudad.update');
    route::delete('/ciudad/{id}', [CiudadesController::class, 'destroy'])->name('ciudad.destroy');

});

//RUTAS PARA LAS PROVINCIAS

Route::middleware('auth')->group(function () {
    Route::get('/provincia',[ProvinciasController::class, 'index'])->name('provincia');
    Route::get('/provincia/create', [ProvinciasController::class, 'create'])->name('provincia.create');
    Route::post('/provincia/store', [ProvinciasController::class, 'store'])->name('provincia.store');
    route::get('/provincia/{id}/edit', [ProvinciasController::class, 'edit'])->name('provincia.edit');
    Route::patch('/provincia/{provincia}', [ProvinciasController::class, 'update'])->name('provincia.update');
    route::delete('/provincia/{provincia}', [ProvinciasController::class, 'destroy'])->name('provincia.destroy');
});


    //RUTAS CREADAS POR LARAVEL PARA EL PROFILE
    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
require __DIR__.'/auth.php';
