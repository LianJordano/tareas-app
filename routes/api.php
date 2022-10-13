<?php

use App\Http\Controllers\TareasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Tareas;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tareas/{nombre}', function (Request $request, $tarea) {

            $tareas = DB::table('tareas')
            ->where('nombre', 'like', "%$tarea%")
            ->get();
            return response()->json($tareas);
});
