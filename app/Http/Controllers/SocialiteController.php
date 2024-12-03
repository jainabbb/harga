<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProvideCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $e) {
            return redirect()->back();
        }
        // find or create user and send params user get from socialite and provider
        $authUser = $this->findOrCreateUser($user, $provider);

        // login user
        if($authUser !== NULL){
            Auth()->login($authUser, true);
        }else{
            return redirect()->route('harga.index')
                    ->with('status', 'Akun belum terdaftar, silahkan hubungi admin')
                    ->with('alert-type', 'danger');
        }

        // setelah login redirect ke dashboard
        return redirect()->route('dashboard-analytics');
    }
    // get avatar from socialite


    public function findOrCreateUser($socialUser, $provider)
    {
        $user = User::where('email', $socialUser->getEmail())->first();

        return $user;
        // Get Social Account
        // $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())
        //     ->where('provider_name', $provider)
        //     ->first();
        // // return $socialAccount->user;


        // // Jika sudah ada
        // if ($socialAccount) {
        //     // return user
        //     return $socialAccount->user;

        //     // Jika belum ada
        // } else {

        //     // User berdasarkan email
        //     $user = User::where('email', $socialUser->getEmail())->first();

        //     // Jika Tidak ada user
        //     if (!$user) {
        //         // Create user baru
        //         $user = User::create([
        //             'name'  => $socialUser->getName(),
        //             'email' => $socialUser->getEmail()
        //         ]);
        //     }

        //     // Buat Social Account baru
        //     $user->socialAccounts()->create([
        //         'provider_id'   => $socialUser->getId(),
        //         'provider_name' => $provider
        //     ]);

        //     // return user
        //     return $user;
        // }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // remove cache so that the user cannot go back to the previous page
        // and logout again
        $request->session()->flush();


        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('dashboard-analytics'))->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
