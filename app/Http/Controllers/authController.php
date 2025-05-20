<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\siswa_profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    public function login_view(){
        return view('Auth.login');
    }

    public function registrasi_view(){
        return view('Auth.registrasi');
    }

    public function registrasi(Request $request){
         $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed', // validasi password_confirmation
                'min:8',
                'regex:/[A-Z]/',       // Huruf besar
                'regex:/[0-9]/',       // Angka
                'regex:/[@$!%*#?&]/'   // Karakter khusus
            ],
        ], [
            'password.regex' => 'Password harus mengandung huruf besar, angka, dan karakter khusus.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.'
        ]);

      $user = User::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'status' => 'pending'
      ]);
      
      

  
        $role = Role::where('name', 'guru')->first();
        if ($role) {
            $user->roles()->attach($role->id);
        }
      return redirect('/login')->with('success', 'Akun berhasil dibuat, tunggu untuk di-approve.');
    }

   
   public function login(Request $request){
    $credentials = $request->only('email', 'password');

    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        $user = Auth::user();

        if ($user->hasRole('admin') || $user->hasRole('guru')) {
            return redirect()->intended('home');
        } elseif($user->hasRole('siswa')) {
            if ($user->status === 'pending') {
                Auth::logout();
                return redirect()->back()->with('error', 'Akun Anda belum di-approve oleh admin.');
            } else {
                $siswaData = siswa_profile::where('id_user', $user->id)->first();
                if($siswaData){
                    return redirect()->intended('/');
                } else {
                    return redirect()->intended('siswa');
                }
            }
        }
        return view('home');
    }

    // Jika gagal login
    return redirect()->back()->with('error', 'Email atau password salah.');
}

    public function logout(Request $request){
          Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }



    }


