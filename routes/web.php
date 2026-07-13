<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;



//metodo get para mostrar la vista para el registro de los usuarios
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');

//Metodo post para la creacion de un nuevo usuario en la base de datos
Route::post('/register', [RegisterController::class, 'register'])->name('register.create');

//manejo de rutas para el login de usuarios 

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.create');


//Tener una ruta general para que algunas rutas solamente puedan ser accedidas por usuarios autenticados, y otras por usuarios no autenticados.
Route::middleware('auth')->group(function () {
    //Ruta para el logout de un usuario 
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout.perform');
    //ruta para el home 
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});
