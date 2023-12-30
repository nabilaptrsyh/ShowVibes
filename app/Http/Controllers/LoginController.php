<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function GoogleLogin ()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleHandle()
{
    try {
        $user = Socialite::driver('google')->user();
        $findUser = User::where('email', $user->email)->first();

        if (!$findUser) {
            $findUser = new User();
            $findUser->name = $user->name;
            $findUser->username = $user->name;
            $findUser->email = $user->email;
            $findUser->password = bcrypt('password');
            $findUser->remember_token(); //
            $findUser->save();
        }

        Auth::login($findUser);

        return redirect('/');

    } catch (Exception $e) {
    return back()->with('LoginError', 'Login Failed');
    }
}

    
    public function index()
    {
        return view('login.login', [
            'title' => 'login',
            'active'=> 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
       $credentials = $request->validate([
        'email' => 'required|email',
        'password'=> 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

    return back()->with('LoginError', 'Login Failed');
    }

    public function logout()
    {
        Auth::logout();
        
        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }

}