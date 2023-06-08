<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

class GithubController extends Controller
{
    public function __construct()
    {
        Config::set('services.github.redirect', route('github.callback'));
    }

    public function redirect(): SymfonyRedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback(): RedirectResponse
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::updateOrCreate([
            'oauth_id' => $githubUser->id, // @phpstan-ignore-line
        ], [
            'oauth_id' => $githubUser->getId(),
            'name' => $githubUser->getName(),
            'email' => $githubUser->getEmail(),
            'avatar' => $githubUser->getAvatar(),
            'email_verified_at' => now(),
            'password' => Str::random(12),
            'oauth_token' => $githubUser->token, // @phpstan-ignore-line
            'oauth_refresh_token' => $githubUser->refreshToken, // @phpstan-ignore-line
            'oauth_token_expired_at' => $githubUser->expiredIn, // @phpstan-ignore-line
        ]);

        auth()->login($user);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
