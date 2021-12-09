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
    // Socialite login
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Socialite callback
    public function handleCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $this->_registerOrLoginUser($user, $provider);

        return redirect('/home');
    }


    protected function _registerOrLoginUser($data, $provider)
    {
        $user = User::where('email', $data->email)->first();
        if (!$user) {
            $user = new User;
            $user->name = $data->name;
            $user->email = $data->email;
            $user->email_verified_at = $user->email_verified_at != null ? $user->email_verified_at : Carbon::now();
            $user->provider_id = $data->id;
            $user->oauth_type = $provider;
            $user->avatar = $data->avatar ? $data->avatar : 'https://ui-avatars.com/api/?name=' . $data->name;
            $user->save();

            $user->assignRole('User');
        }

        Auth::login($user);
    }
}
