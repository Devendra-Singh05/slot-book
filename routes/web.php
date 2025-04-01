<?php

// use App\Http\Controllers\Auth\SocialAuthController as AuthSocialAuthController;

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\FirmsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserInterfaceController;
use App\Http\Livewire\TestLivewire;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\SP;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([

    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   
    Route::get('/test',function(){
return view('test');
});
Route::resource('/schedule',ScheduleController::class)->middleware(SP::class);
Route::resource('/firm',FirmsController::class)->middleware(SP::class);
Route::post('/firm/updateprofilepic',[FirmsController::class,'updateprofilepic'])->middleware(SP::class);

Route::get('/dashboard', function () {
        $user=Auth::user();
        
    if($user->hasRole('user'))
     return app(UserInterfaceController::class)->show();

        elseif($user->hasRole('service_provider')){
        // return redirect()->route('firm.create');
        // return view('firm.create');
        if((count($user->firm))>0){
    return app(FirmsController::class)->index();
        }
        return app(FirmsController::class)->create();

        } 
   
    elseif($user->hasRole('admin'))
    return view('admin.index');
else
return abort(403, 'Unauthorized Access');
    

    })->name('dashboard');
                                                                                                                  
});
// Route::get('/firm/create',[FirmsController::class,'create'])->name('firm.create');





// login google api
// Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);


    
    // Route::get('/test-livewire',PageTestLivewire::class)
    // Route::get('/test-livewire', TestLivewire::class)->name('test-livewire');
// Route::get('/firm/create',[FirmsController::class,'create'])->name('firm.create');