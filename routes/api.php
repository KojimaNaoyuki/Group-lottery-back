<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\RoomCustomController;
use App\Http\Controllers\RoomsMemberController;
use App\Http\Controllers\RoomsMemberCustomController;
use App\Http\Controllers\LotteryResultController;

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

Route::apiResource('/room', RoomController::class);
Route::apiResource('/group', GroupController::class);
Route::apiResource('/roomMember', RoomsMemberController::class);
Route::apiResource('/lotteryResult', LotteryResultController::class);

Route::get('/roomCustom', [RoomCustomController::class, 'WhereGroup_id']);
Route::get('/roomMemberGetMaxId', [RoomsMemberCustomController::class, 'getMaxId']);
Route::get('/roomMemberWhereRoomId', [RoomsMemberCustomController::class, 'whereRoom_id']);
