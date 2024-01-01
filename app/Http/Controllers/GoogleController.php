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

        $user = Socialite::driver('google')->user();
        
        $findUser = User::where('google_id', $user->getId())->first();

        

        if ($findUser) {
                    Auth::login($findUser);
                    dd($user);
                    return redirect()->intended('home');
                } else {
                    $newUser = User::create([
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'google_id' => $user->getid(),
                        'password' => bcrypt('123456')
                        // tambahkan data lainnya sesuai kebutuhan
                     ]);

                     Auth::login($newUser);
                     return redirect()->intended('home');
                }

        // try {
        //     $user = Socialite::driver('google')->user();
    
        //     // Cek apakah pengguna sudah terdaftar
        //     $findUser = User::where('google_id', $user->getId())->first();
        //     if ($findUser) {
        //         Auth::login($findUser);
        //     } else {
        //         // Jika belum terdaftar, buat pengguna baru
        //         $newUser = User::create([
        //             'name' => $user->name,
        //             'email' => $user->email,
        //             'google_id' => $user->id,
        //             'password' => bcrypt('123456')
        //             // tambahkan data lainnya sesuai kebutuhan
        //         ]);
    
        //         Auth::login($newUser);
        //     }
    
        //     // Periksa nilai is_admin
        //     $isAdmin = Auth::user()->is_admin;
    
        //     // Debugging: Pemantauan nilai $isAdmin
    
        //     // Periksa apakah pengguna admin dan arahkan ke dashboard jika iya
        //     if ($isAdmin == 1) {
        //         return redirect()->route('dashboard.content.index');
        //     } else {
        //         return redirect()->intended('/');
        //     }
    
        // } catch (\Exception $e) {
        //     return redirect()->route('login')->with('error', 'Terjadi kesalahan saat menghandle callback: ' . $e->getMessage());
        // }
    }

}