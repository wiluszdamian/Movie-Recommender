<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ChangePasswordController extends Controller
{
    /**
     * Show the form for changing the user's password.
     */
    public function index(Request $request, string $token): View
    {
        $email = $request->get('email');

        return view('auth.reset-password', compact('token', 'email'));
    }

    /**
     * Handle an incoming password change request.
     */
    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            toastr()->success('Your password has been reset.');

            return redirect()->route('login');
        }

        toastr()->error(__($status));

        return redirect()->back();
    }
}
