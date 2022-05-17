<?php

namespace App\Providers;

use App\Helpers\Implementations\CheckingPermissionsForRole;
use App\Helpers\Interfaces\ICheckingPermissionsForRole;
use App\Repositories\DAO\Auth\AuthRepository;
use App\Repositories\DAO\RolesAndPermissions\PermissionsRepository;
use App\Repositories\DAO\RolesAndPermissions\RolesRepository;
use App\Repositories\DAO\UserRepository;
use App\Repositories\Interfaces\Auth\IAuthRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\Interfaces\RolesAndPermissions\IPermissionsRepository;
use App\Repositories\Interfaces\RolesAndPermissions\IRolesRepository;
use App\Services\Implementation\Auth\AuthUserService;
use App\Services\Implementation\Auth\NewPasswordService;
use App\Services\Implementation\Auth\PasswordResetLinkService;
use App\Services\Implementation\RolesAndPermissions\PermissionsService;
use App\Services\Implementation\RolesAndPermissions\RolesService;
use App\Services\Implementation\UserService;
use App\Services\Interfaces\Auth\IAuthUser;
use App\Services\Interfaces\Auth\INewPassword;
use App\Services\Interfaces\Auth\IPasswordResetLink;
use App\Services\Interfaces\IUserService;
use App\Services\Interfaces\RolesAndPermissions\IPermissions;
use App\Services\Interfaces\RolesAndPermissions\IRoles;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(IAuthRepository::class, AuthRepository::class);
        $this->app->bind(IAuthUser::class, AuthUserService::class);
        $this->app->bind(IPasswordResetLink::class, PasswordResetLinkService::class);
        $this->app->bind(INewPassword::class, NewPasswordService::class);
        $this->app->bind(IRolesRepository::class, RolesRepository::class);
        $this->app->bind(IRoles::class, RolesService::class);
        $this->app->bind(IPermissions::class, PermissionsService::class);
        $this->app->bind(IPermissionsRepository::class, PermissionsRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(ICheckingPermissionsForRole::class, CheckingPermissionsForRole::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
