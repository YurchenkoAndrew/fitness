<?php

use App\Http\Controllers\RolesAndPermissions\RoleController;
use Illuminate\Support\Facades\Route;

Route::apiResource('role', RoleController::class);
