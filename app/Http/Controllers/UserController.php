<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function getRegister()
    {
        return view('register.index');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'birth' => 'required|date',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('get_register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'birth' => $request->birth,
            'address' => $request->address,
            'role'=>$request->role,
        ]);

        // assign role
        // $user->assignRole('user');
        // $user->assignRole($request->role);

        if ($user) {
            return redirect()->route('get_register')
                ->with('success', 'User created successfully');
        } else {
            return redirect()->route('get_register')
                ->with('error', 'Failed to create user');
        }
    }

    public function getLogin()
    {
        return view('login.index');
    }

    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('get_login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard_user');
            // return redirect()->route('products.index');
            // return redirect()->route('login')->with('success', 'Login success');
        } else {
            return redirect()->route('get_login')
                ->with('error', 'Login failed email or password is incorrect');
        }
    }

    public function dashboardUser()
    {
        $user = Auth::user();

        // get user role
        // dd($user->roles[0]->name);
        
        // change role
        // $user->roles()->detach();
        // $user->assignRole('superadmin');

        // if (!$user) {
        //     return redirect()->route('login');
        // }

        return view('dashboard.index', compact('user'));
    }

    public function getProfile(){
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
    
    public function logout()
    {
        Auth::logout();

        return redirect()->route('get_login');
    }

    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = new User();
            $newUser->google_id = $user->id;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = Hash::make(Str::random(15));
            $newUser->gender = 'male';
            $newUser->age = 25;
            $newUser->birth = '1996-05-13';
            $newUser->address = 'Jakarta Selatan';
            $newUser->save();

            // assign role
            $newUser->assignRole('user');

            Auth::login($newUser);
        }

        return redirect()->route('dashboard_user');
    }
}
