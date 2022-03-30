<?php

use App\Http\Controllers\RolesAndPermissions\PermissionsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('permissions', PermissionsController::class);
