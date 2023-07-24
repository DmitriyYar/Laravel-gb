<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Contracts\Social;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

class SocialProviderController extends Controller
{
    public function redirect(string $driver): SymfonyRedirectResponse|RedirectResponse
    {
//        dd($driver); //vkontakte  / github
//        dd(Socialite::driver($driver));
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social): mixed
    {
        return redirect(
//            dd(Socialite::driver($driver)->user())
            $social->loginAndGetRedirectUrl(Socialite::driver($driver)->user())
        );
    }
}
