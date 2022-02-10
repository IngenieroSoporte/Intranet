<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Exception;
use Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
       

    public function googleCallback()
    {
        try {
     
            $user = Socialite::driver('google')->user();
      
            $searchUser = User::where('google_id', $user->id)->first();
      
            if($searchUser){
      
                Auth::login($searchUser);
     
                return redirect('/');
      
            }else{
                $gitUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'auth_type'=> 'google',
                    'password' => encrypt('gitpwd059')
                ]);
     
                Auth::login($gitUser);
      
                return redirect('/');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
