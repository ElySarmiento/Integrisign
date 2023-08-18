<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Signature;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        

        $user->update([
            'password' => Hash::make($request->password)
            ]);

        event(new Registered($user));

        Auth::login($user);

        $user_signature = [
            
            'signature_1' => null,
            'signature_2' => null,
            'signature_3' => null,
            'user_id'=>auth()->id()

        ];

        $signature_model = new Signature($user_signature);
        $signature_model->save();

        return redirect(RouteServiceProvider::HOME);
    }
}
