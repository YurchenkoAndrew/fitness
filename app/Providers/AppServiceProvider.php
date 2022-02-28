<?php

namespace App\Providers;

use App\Contracts\Auth\IAuthUser;
use App\Contracts\Auth\INewPassword;
use App\Contracts\Auth\IPasswordResetLink;
use App\Contracts\RolesAndPermissions\Roles;
use App\Repositories\DAO\Auth\AuthRepository;
use App\Repositories\DAO\RolesAndPermissions\RolesRepository;
use App\Repositories\Interfaces\Auth\IAuthRepository;
use App\Repositories\Interfaces\RolesAndPermissions\IRolesRepository;
use App\Services\Auth\AuthUserService;
use App\Services\Auth\NewPasswordService;
use App\Services\Auth\PasswordResetLinkService;
use App\Services\RolesAndPermissions\RolesService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAuthRepository::class, AuthRepository::class);
        $this->app->bind(IAuthUser::class, AuthUserService::class);
        $this->app->bind(IPasswordResetLink::class, PasswordResetLinkService::class);
        $this->app->bind(INewPassword::class, NewPasswordService::class);
        $this->app->bind(IRolesRepository::class, RolesRepository::class);
        $this->app->bind(Roles::class, RolesService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
