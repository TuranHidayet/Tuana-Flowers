<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(Request $request) {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function postRegister(RegisterRequest $request)
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));

        if ($request->hasfile('avatar')) {
            $user->avatar = Storage::putFile('public/uploads/users/avatars', $request->file('avatar'));
        }

        $user->save();

//        Mail::to('turanhidayatov@gmail.com')->send(new RegisterMail($request->name));

        return redirect()->route('app.login');
    }

    public function login() {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request) {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('app.profile');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('app.login');
    }

    public function profile()
    {
        $user = Auth::user();
        $userShops = $user->shops;
        $userShop = Shop::with('products')->where('user_id', auth()->id())->first();
        return view('front.profile', compact('user', 'userShop', 'userShops'));
    }
}
