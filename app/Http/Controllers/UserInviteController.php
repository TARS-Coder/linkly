<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserInviteController extends Controller
{
    public function showAcceptForm($token)
    {
        $user = User::where('invite_token', $token)->firstOrFail();

        return view('invite.auth-invite',['user' => $user]);
    }

    public function acceptInvite(Request $request, $token)
    {
        $user = User::where('invite_token', $token)->firstOrFail();

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->password = Hash::make($request->password);
        $user->invite_token = null;
        $user->email_verified_at = now(); // Optional
        $user->save();

        auth()->login($user);

        return redirect()->route('dashboard')->with('success', 'Welcome!');
    }
}
