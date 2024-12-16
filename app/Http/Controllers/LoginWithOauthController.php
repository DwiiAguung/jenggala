<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

use Exception;

class LoginWithOauthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('guest.main');
            } else {
                $newUser = User::create([
                    'nama' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'role' => 'Konsumen',
                    'password' => encrypt('_palingSusahDehpokoknyaMah369'),
                    'avatar' => $user->avatar,
                ]);

                Auth::login($newUser);

                return redirect()->route('guest.main');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
