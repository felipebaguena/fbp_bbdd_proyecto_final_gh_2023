<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// USERS

Route::group([
    'middleware' => ['auth:sanctum', 'isAdmin']
    ], function () {
    Route::get('/users', [UserController::class, 'getUsers']);
});

Route::put('/users/{id}', [UserController::class, 'updateUsers']);
Route::delete('/users/{id}', [UserController::class, 'deleteUsers']);

// AUTH
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group([
    'middleware' => ['auth:sanctum']
    ], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
});

// HEROES

Route::post('/heroes', [HeroController::class, 'createHero'])->middleware('auth:sanctum');

// MONSTERS

Route::get('/monsters', [MonsterController::class, 'getMonsters']);

Route::group([
    'middleware' => ['auth:sanctum', 'isAdmin']
], function () {
    Route::post('/monsters', [MonsterController::class, 'createMonster']);
    Route::put('/monsters/{id}', [MonsterController::class, 'updateMonster']);
    Route::delete('/monsters/{id}', [MonsterController::class, 'deleteMonster']);
});

// STAGES

Route::get('/stages', [StageController::class, 'getStages']);

Route::group([
    'middleware' => ['auth:sanctum', 'isAdmin']
], function () {
    Route::post('/stages', [StageController::class, 'createStage']);
    Route::put('/stages/{id}', [StageController::class, 'updateStage']);
    Route::delete('/stages/{id}', [StageController::class, 'deleteStage']);
});

// ITEMS

Route::get('/items', [ItemController::class, 'getItems']);

Route::group([
    'middleware' => ['auth:sanctum', 'isAdmin']
], function () {
    Route::post('/items', [ItemController::class, 'createItem']);
    Route::put('/items/{id}', [ItemController::class, 'updateItem']);
    Route::delete('/items/{id}', [ItemController::class, 'deleteItem']);
});