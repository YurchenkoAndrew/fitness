<?php

namespace App\Providers;

use App\Contracts\Auth\IAuthUser;
use App\Contracts\Auth\INewPassword;
use App\Contracts\Auth\IPasswordResetLink;
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
        $this->app->instance(IAuthUser::class, new AuthUserService());
        $this->app->instance(IPasswordResetLink::class, new PasswordResetLinkService());
        $this->app->instance(INewPassword::class, new NewPasswordService());
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
