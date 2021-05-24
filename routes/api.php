<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('funcionarios', FuncionarioController::class, ["except" => "show"]);
Route::get('total-funcionarios/{sexo?}', [FuncionarioController::class, "totalFuncionarios"]);
Route::get('setores-funcionario', [FuncionarioController::class, "setoresFuncionarios"]);