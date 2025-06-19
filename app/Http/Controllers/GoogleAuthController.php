<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback(){
        try{
            $google_user=Socialite::driver('google')->user();
            $user =User::where('google_id',$google_user->getId())->first();

            if(!$user){
                $new_user=User::updateOrCreate([
                    'name'=>$google_user->getName(),
                    'email'=>$google_user->getEmail(),
                    'google_id'=>$google_user->getId()
                ]);
                Auth::login($new_user);

                return redirect()->intended('Welcome');

            }
            else{
                Auth::login($user);
                return redirect()->intended('Signup'); 
            }
        }
        catch(\Throwable $th){
            dd('This email id alreay registered!');
        }
    }
} 
