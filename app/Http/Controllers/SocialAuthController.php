<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    // 🚀 Google की तरफ Redirect करें
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // 🚀 Google से Callback हैंडल करें
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
    
            // 🔹 Laravel के डेटाबेस में ईमेल से यूज़र को खोजें
            $user = User::where('email', $googleUser->getEmail())->first();
    
            if (!$user) {
                // 🔹 अगर यूज़र नहीं है, तो नया यूज़र बनाएँ
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(Str::random(16)), 
                ]);
            }
    
            // 🔹 यूज़र को लॉगिन करें
            Auth::login($user, true);
    
            // 🔹 डैशबोर्ड पर भेजें
            return redirect()->route('dashboard');
    
        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'Google login failed! Please try again.');
        }
    }
}