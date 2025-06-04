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
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

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
            'name' => 'required|string|max:255',
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

          if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'status' => 'pending'
      ]);




        $role = Role::where('name', 'alumni')->first();
        if ($role) {
            $user->roles()->attach($role->id);
        }
      return redirect('/login')->with('success', 'Akun berhasil dibuat, tunggu untuk di-approve.');
    }


  public function login(Request $request)
    {
        // Validasi input
        $this->validateLogin($request);

        // Implementasi rate limiting
        $maxAttempts = 5;
        $decayMinutes = 1;

        if (RateLimiter::tooManyAttempts($this->throttleKey($request), $maxAttempts)) {
            $seconds = RateLimiter::availableIn($this->throttleKey($request));
            
             return back()
        ->withInput()
        ->withErrors(['email' => "Terlalu banyak percobaan. Silakan coba lagi dalam {$seconds} detik."])
        ->with('rate_limit', $seconds);
        }

        // Coba melakukan autentikasi
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (!Auth::attempt($credentials, $remember)) {
            RateLimiter::hit($this->throttleKey($request), $decayMinutes * 60);
            
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        // Reset rate limiter setelah login berhasil
        RateLimiter::clear($this->throttleKey($request));

        $request->session()->regenerate();
        $user = Auth::user();

        // Redirect berdasarkan role
        return $this->authenticated($request, $user);
    }

    /**
     * Validasi request login
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    }

    /**
     * Handle redirect setelah autentikasi berhasil
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin') || $user->hasRole('guru')) {
            return redirect()->intended('dashboard');
        }

        if ($user->hasRole('siswa')) {
            if ($user->status === 'pending') {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Akun Anda belum di-approve oleh admin.');
            }

            $siswaData = siswa_profile::where('user_id', $user->id)->first();

            if (!$siswaData && !$request->is('siswa/profile')) {
                return redirect('/siswa/profile')->with('info', 'Silakan lengkapi profil Anda terlebih dahulu.');
            }

            return redirect()->intended('dashboard');
        }

        // Fallback untuk role tidak diketahui
        return redirect('/');
    }

    /**
     * Generate throttle key untuk rate limiting
     */
    protected function throttleKey(Request $request)
    {
        return Str::transliterate(Str::lower($request->input('email')).'|'.$request->ip());
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


