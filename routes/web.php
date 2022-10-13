<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\TareasController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('login.login');
});


Route::resource("tareas",TareasController::class)->middleware("auth");
Route::resource("categorias",CategoriasController::class)->middleware("auth");

Route::view("login", "login.login")->name("login")->middleware("guest");
Route::post("login", function(){

    $datosLogin =  request()->only("email","password");

    if(Auth::attempt($datosLogin)){
        request()->session()->regenerate();
        return  redirect("tareas");
    }

    return redirect("login");

    
});

Route::post("logout", function(){

    Auth::logout();
    return redirect("login");;
});