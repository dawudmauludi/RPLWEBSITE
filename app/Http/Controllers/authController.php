<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use App\Models\guru_profile;
use App\Models\Role;
use App\Models\siswa_profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    public function login_view(){
        return view('auth.login');
    }

    public function registrasi_view(){
        return view('auth.registrasi');
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




        $role = Role::where('name', 'siswa')->first();
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
            return redirect()->intended('dashboard');
        } elseif($user->hasRole('siswa')) {
            if ($user->status === 'pending') {
                Auth::logout();
                return redirect()->back()->with('error', 'Akun Anda belum di-approve oleh admin.');
            } else {
                $siswaData = siswa_profile::where('user_id', $user->id)->first();
                if($siswaData){
                    return redirect()->intended('dashboard');
                } else {
                    return redirect('/siswa/profile');
                }
            }
        }
        if ($user->hasRole('admin') || $user->hasRole('guru') || $user->hasRole('siswa')) {
            return redirect()->route('dashboard');
        }


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




    public function requestForm(){
        return view('auth.request-password');
    }


    public function sendCode(Request $request){
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = random_int(100000, 999999);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        Mail::to($request->email)->send(new VerificationCodeMail($token, $request->email));

    // Simpan email ke session agar bisa digunakan di halaman verifikasi
        session(['email' => $request->email]);


        return redirect()->route('verify.form')->with([
        'success' => 'Kode verifikasi telah dikirim ke email kamu.',
        'email' => $request->email
        ]);
    }


    public function verifyForm(){
      return view('auth.verify-code')->with('email', session('email'));
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|integer',
            'password' => 'required|confirmed|min:8'
        ]);

        $record = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->where('created_at', '>', now()->subMinutes(10))
        ->first();

        if(!$record){
            return redirect()->back()->with('error', 'Kode verifikasi tidak valid atau sudah kadaluarsa.');
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect('/login')->with('status', 'Password berhasil diubah.');
    }

}


