<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;




class AuthController extends Controller
{
    public function getLoginPage()
        {
            return view ('auth.login');
        }


    public function getCourtPage()
        {
            return view ('courts.login');
        }

     public function authenticate(Request $request) {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
     
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('lawsuits');
            }
     
       
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }


      public function getRegisterPage()
    {
        return view('auth.register');
    }

 
    public function register(Request $request)
    {
     
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

     
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Hash the password
        ]);

        
        Auth::login($user);

  
        return redirect()->route('lawsuits.index')->with('success');
    }
    



        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        
            return redirect('/');
        }
        



        public function getToken(Request $request){
             $request->validate([
                 'email' => ['required', 'email', 'max:150'],
            'password' => 'required|min:8'
            ]);

            $user = User::where('email', $request->email)->first();

           if (! $user || ! Hash::check( $request->password, $user->password))
            {
                throw ValidationException::withMessages([
                    'email'=>['The provided credentials are incorrect.'],
                ]);
            }

            $user->tokens()->delete(); 
            $token = $user->createToken($request->ip())->plainTextToken;

            return [
            'message'=>'Login successful',
            'token' => $token,
            'user'=> $user
            ];

        }

        public function revokeToken(Request $request) {
            $request->user()->tokens()->delete(); 
    
            return [
                'message' => 'Logout successful',
            ];
        }
}
