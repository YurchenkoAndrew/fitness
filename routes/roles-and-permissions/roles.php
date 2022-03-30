<?php

use App\Http\Controllers\RolesAndPermissions\RoleController;
use Illuminate\Support\Facades\Route;

Route::apiResource('roles', RoleController::class);
Route::post('role-set-permission', [RoleController::class, 'setPermission']);
Route::post('role-delete-permission', [RoleController::class, 'deletePermission']);
