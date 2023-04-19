<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BattleController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HeroImageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\RoleController;
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
    Route::get('/users/{id}', [UserController::class, 'getUser']);
    Route::put('/user/{id}/change-role/{roleId}', [UserController::class, 'changeRole']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/heroes/{heroId}/select', [UserController::class, 'selectHero']);
    Route::get('/profile/heroes', [UserController::class, 'getHeroesAndItems']);
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
    Route::put('/profile', [AuthController::class, 'updateProfile']);
});

// ROLES

Route::group([
    'middleware' => ['auth:sanctum', 'isAdmin']
], function () {
    Route::get('/roles', [RoleController::class, 'getAllRoles']);
});

// HEROES

Route::post('/heroes', [HeroController::class, 'createHero'])->middleware('auth:sanctum');
Route::delete('/heroes/{heroId}', [HeroController::class, 'deleteHero']);

Route::put('/heroes/{heroId}/level-up', [HeroController::class, 'levelUpHero']);

Route::get('/hero/{hero_id}/items', [HeroController::class, 'getHeroItems']);
Route::post('/heroes/{heroId}/items/{itemId}', [HeroController::class, 'addItemToHero']);
Route::delete('/heroes/{heroId}/items/{itemId}', [HeroController::class, 'removeItemFromHero']);

Route::get('/hero/image/{imageId}', [HeroController::class, 'getImageById'])->name('hero.image');

// HERO IMAGES

Route::get('/hero-images', [HeroImageController::class, 'getAllHeroImages'])->middleware('auth:sanctum');

// MONSTERS

Route::get('/monsters', [MonsterController::class, 'getMonsters']);
Route::get('/monster/image/{imageId}', [MonsterController::class, 'getMonsterImageById'])->name('monster.image');

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
Route::get('/items/{id}', [ItemController::class, 'getItemById']);

Route::group([
    'middleware' => ['auth:sanctum', 'isAdmin']
], function () {
    Route::post('/items', [ItemController::class, 'createItem']);
    Route::put('/items/{id}', [ItemController::class, 'updateItem']);
    Route::delete('/items/{id}', [ItemController::class, 'deleteItem']);
});

Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    Route::post('/add-item-to-hero', [ItemController::class, 'assignRandomItemToSelectedHero']);
    Route::post('/add-item-to-hero/{id}', [ItemController::class, 'addRandomItemToHero']);
});

// BATTLES

Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    Route::post('/battles', [BattleController::class, 'createBattle']);
});
