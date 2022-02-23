<?php

namespace App\Providers;

use App\Contracts\Auth\IAuthUser;
use App\Contracts\Auth\INewPassword;
use App\Contracts\Auth\IPasswordResetLink;
use App\Repositories\DAO\Auth\AuthRepository;
use App\Repositories\Interfaces\Auth\IAuthRepository;
use App\Services\Auth\AuthUserService;
use App\Services\Auth\NewPasswordService;
use App\Services\Auth\PasswordResetLinkService;
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
