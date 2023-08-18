<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Signature;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;





class ProviderController extends Controller
{
    //
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){

        try{
            $SocialUser = Socialite::driver($provider)->user();
               
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $SocialUser->id
                
            ])->first();

            if(User::where('email',$SocialUser->getEmail())->exists()){

                if(User::where('provider_id',$SocialUser->getId())->exists()){
                    
                    Auth::login($user);
                    return redirect('/dashboard'); 
                }
                else{
                    return redirect('/login')->withErrors(['email'=>'This email uses different method to login.']);              

                }

            }

            

            $generated_password = Str::random(length:12);
            if(!$user){
                
                $user = User::create([
                    'name' => $SocialUser->getName(),
                    'email' => $SocialUser->getEmail(),
                    'username' => User::generateUserName($SocialUser->nickname),
                    'provider' => $provider,
                    'provider_id' => $SocialUser->getId(),
                    'provider_token' => $SocialUser->token,
                    'email_verified_at' => now(),
                    'password' => $generated_password
                    
                ]);

                

                $user->sendEmailVerificationNotification();
              

                $user->update([
                'password' => Hash::make($generated_password)
                ]);
            }
            Auth::login($user);
            $user_signature = [
                    
                'signature_1' => null,
                'signature_2' => null,
                'signature_3' => null,
                'user_id'=>auth()->id()
    
            ];
    
            $signature_model = new Signature($user_signature);
            $signature_model->save();
            return redirect('/dashboard');    

        }catch(Exeption $e){
            return redirect('/login');
        }

    }
}
