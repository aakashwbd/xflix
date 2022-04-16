<?php

namespace App\Http\Controllers;

use App\Services\SocialTwitterAccountService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthTwitterController extends Controller
{
    /**
     * Create a redirect method to twitter api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Return a callback method from twitter api.
     *
     * @return \Illuminate\Http\RedirectResponse URL from twitter
     */
    public function callback(SocialTwitterAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('twitter')->user());
//        auth()->login($user);
        return redirect()->to('/');
    }
}
