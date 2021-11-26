<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteLoginController extends Controller
{
    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);

        return redirect('/home');
    }


    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', $data->email)->first();
        if (!$user) {
            $user = new User;
            $user->name = $data->name;
            $user->email = $data->email;
            $user->email_verified_at = $user->email_verified_at != null ? $user->email_verified_at : Carbon::now();
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar ? $data->avatar : 'https://ui-avatars.com/api/?name=' . $data->name;
            $user->save();

            $user->assignRole('User');
        }

        Auth::login($user);
    }
}
