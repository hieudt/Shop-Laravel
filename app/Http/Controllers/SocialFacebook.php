<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Http\Requests;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Socialite;



class SocialFacebook extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
 
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect()->back();
    }
 
    private function findOrCreateUser($facebookUser){
        $authUser = User::where('provider_id', $facebookUser->id)->first();
 
        if($authUser){
            return $authUser;
        }
 
        return User::create([
            'name' => $facebookUser->name,
            'password' => $facebookUser->token,
            'email' => $facebookUser->email,
            'provider_id' => $facebookUser->id,
            'provider' => $facebookUser->id,
        ]);
    }
}
