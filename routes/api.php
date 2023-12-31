<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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


Route::get('members', [MemberController::class, 'index']);
Route::post('members', [MemberController::class, 'store']);
Route::get('members/{id}', [MemberController::class, 'show']);
Route::patch('members/{id}', [MemberController::class, 'update']);
Route::delete('members/{id}', [MemberController::class, 'destroy']);
Route::post('members/tag/{id}', [MemberController::class, 'add']);
