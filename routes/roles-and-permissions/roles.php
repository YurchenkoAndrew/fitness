<?php

use App\Http\Controllers\RolesAndPermissions\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('roles/edit/{id}', [RoleController::class, 'edit']);
Route::post('roles/set/permission', [RoleController::class, 'setPermission']);
Route::post('roles/delete/permission', [RoleController::class, 'deletePermission']);
Route::apiResource('roles', RoleController::class);
