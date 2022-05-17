<?php

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

Route::middleware('localization')->group(function () {
    include('auth/auth-api-routes.php');
    include('auth/reset-password-api-routes.php');
    include('roles-and-permissions/roles.php');
    include('users/users.php');
});
