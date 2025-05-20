@extends('layouts.app')
@section('title','Login')
@section('content')


      @if (session('error'))
          <script>
              Swal.fire({
                  icon: 'error',
                  title: 'Gagal',
                  text: '{{ session('error') }}',
              });
          </script>
      @endif

      @if (session('success'))
          <script>
              Swal.fire({
                  icon: 'success',
                  title: 'Sukses',
                  text: '{{ session('success') }}',
              });
          </script>
      @endif

    <main class="bg-[#FAFAFA]  mx-auto min-h-screen flex flex-col justify-center items-center">
    <div class="flex flex-col items-center w-fit mx-auto">
      <h1 style="font-family: 'Poppins';" class="font-bold text-5xl text-[#5B0888]">Website Rpl</h1>
      <h1 style="font-family: 'Poppins';" class="font-medium text-4xl">Login</h1>
        <div class="mt-5">
            <form action="{{ route('login.post') }}" method="POST" class="flex flex-col gap-y-5">
            @csrf
            <input type="email" name="email" class="bg-[#E8E7E7] p-3 w-[250px] rounded-md focus:outline-none" placeholder="Email">
            @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <div class="relative w-[250px] mx-auto">
                <input 
                  type="password"
                  name="password" 
                  id="passwordInput" 
                  placeholder="Password"
                  class="bg-[#E8E7E7] p-3 pr-10 w-full rounded-md focus:outline-none"
                />
                
                <!-- Icon mata -->
                <button 
                  type="button" 
                  onclick="togglePassword()" 
                  class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 focus:outline-none"
                >
                <svg id="eyeOpen" class="size-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                  </svg>
                <svg id="eyeClosed" class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                  </svg>
                </button>
              </div>
               <button type="submit" class="bg-[#29066E] p-3 w-[250px] rounded-md text-center text-white font-medium text-xl mt-4" style="font-family: 'Poppins';">Login</button>
            </form>
            <a href="kirim_email.html" class="block text-right text-sm text-purple-500">Lupa Password?</a>
        </div>  
       
        <p class="text-xl mt-2 font-medium" style="font-family: 'Poppins';">Belum Punya Akun?</p>
        <a href="/registrasi" class="text-purple-500 mt-2 font-medium" style="font-family: 'Poppins';">Registrasi Sekarang!</a>
    </div>
  </main>



  <script>
  
  function togglePassword() {
    const input = document.getElementById('passwordInput');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');

    if (input.type === 'password') {
      input.type = 'text';
      eyeOpen.classList.remove('hidden');
      eyeClosed.classList.add('hidden');
    } else {
      input.type = 'password';
      eyeOpen.classList.add('hidden');
      eyeClosed.classList.remove('hidden');
    }
  }
</script>

@endsection