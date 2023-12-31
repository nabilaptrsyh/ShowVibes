<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
    
            // Cek apakah pengguna sudah terdaftar
            $findUser = User::where('google_id', $user->getId())->first();
            if ($findUser) {
                Auth::login($findUser);
            } else {
                // Jika belum terdaftar, buat pengguna baru
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => bcrypt('123456')
                    // tambahkan data lainnya sesuai kebutuhan
                ]);
    
                Auth::login($newUser);
            }
    
            return redirect()->intended('movies');
            // Periksa nilai is_admin
            // $isAdmin = Auth::user()->is_admin;
    
            // Debugging: Pemantauan nilai $isAdmin
    
            // Periksa apakah pengguna admin dan arahkan ke dashboard jika iya
            // if ($isAdmin == 1) {
            //     return redirect()->route('movies');
            // } else {
            //     return redirect()->intended('movies');
            // }
    
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Terjadi kesalahan saat menghandle callback: ' . $e->getMessage());
        }
    }

}