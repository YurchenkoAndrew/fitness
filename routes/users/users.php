<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('users/paginate', [UserController::class, 'paginateUser']);
Route::apiResource('users', UserController::class);
