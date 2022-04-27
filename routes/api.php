<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


include('auth/auth-api-routes.php');
include('auth/reset-password-api-routes.php');
include('roles-and-permissions/roles.php');
include('roles-and-permissions/permissions.php');
Route::get('users/paginate', [UserController::class, 'paginateUser']);
Route::apiResource('users', UserController::class);
