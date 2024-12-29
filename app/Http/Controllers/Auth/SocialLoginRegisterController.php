<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\Auth\SocialLoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class SocialLoginRegisterController extends Controller
{
    /**
     * Handle an incoming authentication request by social platforms github.
     */
    public function githubcallback(Request $request): RedirectResponse
    {   
        $user = Socialite::driver('github')->user();
        //dd($user->id);
        Auth::guard('web')->logout();
        $user = User::firstOrCreate([
            'email' => $user->email
        ],[
            'name' => $user->name ? $user->name : $user->email,
            'github_id' => $user->id,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user,true);
        
    //     $request->session()->regenerateToken();

    //     $request->authenticate();
    //    // dd($request);
    //     $request->session()->regenerate();

    //     if($request->user()->status === 'inactive'){
    //         Auth::guard('web')->logout();
    //         $request->session()->regenerateToken();
    //         toastr('Your account has been suspended. Please contact support for assistance!', 'error', 'Account Banned!');
    //         return redirect('/');
    //     }
        //dd($user);
        if($user->role === 'admin'){
            return redirect()->intended('/admin/dashboard');
        }elseif($user->role === 'vendor'){
            return redirect()->intended('/vendor/dashboard');
        }
       
        return redirect()->intended(RouteServiceProvider::HOME);
    }

        /**
     * Handle an incoming authentication request by social platforms github.
     */
    public function googlecallback(Request $request): RedirectResponse
    {  
        $user = Socialite::driver('google')->user();

        Auth::guard('web')->logout();
        $user = User::firstOrCreate([
            'email' => $user->email
        ],[
            'name' => $user->name ? $user->name : $user->email,
            'google_id' => $user->id,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user,true);

        if($user->role === 'admin'){
            return redirect()->intended('/admin/dashboard');
        }elseif($user->role === 'vendor'){
            return redirect()->intended('/vendor/dashboard');
        }
       
        return redirect()->intended(RouteServiceProvider::HOME);

    }

        /**
     * Handle an incoming authentication request by social platforms github.
     */
    public function facebookcallback(Request $request): RedirectResponse
    {  
        $error = request('error');
         // Handle cancellation
        if ($error === 'access_denied') {
            return redirect('/');
            //return redirect()->intended(RouteServiceProvider::HOME);
        }
        try { 
                $user = Socialite::driver('facebook')->user();

                Auth::guard('web')->logout();
                $user = User::firstOrCreate([
                    'email' => $user->email
                ],[
                    'name' => $user->name ? $user->name : $user->email,
                    'facebook_id' => $user->id,
                    'password' => Hash::make(Str::random(24))
                ]);

                Auth::login($user,true);

                if($user->role === 'admin'){
                    return redirect()->intended('/admin/dashboard');
                }elseif($user->role === 'vendor'){
                    return redirect()->intended('/vendor/dashboard');
                }
        
                return redirect()->intended(RouteServiceProvider::HOME);
            } catch (Throwable $e) { 
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        
    }

        /**
     * Handle an incoming authentication request by social platforms github.
     */
    public function twittercallback(Request $request): RedirectResponse
    {   //dd($request);

        $error = request('error');
         // Handle cancellation
        if ($error === 'access_denied') {
            return redirect('/');
            //return redirect()->intended(RouteServiceProvider::HOME);
        }
        try { 
                $user = Socialite::driver('x')->user();
                //dd($user);

                Auth::guard('web')->logout();
                $user = User::firstOrCreate( 
                    [
                        'twitter_id' => $user->id
                    ],
                    [
                        'name' => $user->name,
                        'email' => $email ?? '',
                        'password' => Hash::make(Str::random(24))
                    ]);

                Auth::login($user);

                if($user->role === 'admin'){
                    return redirect()->intended('/admin/dashboard');
                }elseif($user->role === 'vendor'){
                    return redirect()->intended('/vendor/dashboard');
                }
        
                return redirect()->intended(RouteServiceProvider::HOME);
            } catch (Throwable $e) { 
                return redirect()->intended(RouteServiceProvider::HOME);
            }
    
    }

}
