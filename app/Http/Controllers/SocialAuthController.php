<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
// Google Redirect
public function redirectToGoogle()
{
return Socialite::driver('google')->redirect();
}

// Google Callback
public function handleGoogleCallback()
{
try {
$googleUser = Socialite::driver('google')->user();

// पहले से मौजूद यूजर को चेक करें
$user = User::where('email', $googleUser->getEmail())->first();

if (!$user) {
// अगर यूजर नया है, तो एक नया अकाउंट बनाएं
$user = User::create([
'name' => $googleUser->getName(),
'email' => $googleUser->getEmail(),
'google_id' => $googleUser->getId(),
'password' => bcrypt(Str::random(16)), // Random password दें
]);
}

// अगर यूजर पहले से मौजूद है लेकिन google_id नहीं है, तो अपडेट करें
if (!$user->google_id) {
$user->update(['google_id' => $googleUser->getId()]);
}

// यूजर को लॉगिन कराएँ
Auth::login($user);

return redirect()->route('dashboard');

} catch (\Exception $e) {
return redirect()->route('login')->with('error', 'Google Login Failed');
}
}
}