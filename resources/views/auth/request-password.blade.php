@extends('layouts.app')
@section('title','Reset Password')
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
      <h1 style="font-family: 'Poppins';" class="font-medium text-4xl">Lupa Password</h1>
        <div class="mt-5">
            <form action="/password/send-code" method="POST" class="flex flex-col gap-y-5">
            @csrf
            <input type="email" name="email" class="bg-[#E8E7E7] p-3 w-[250px] rounded-md focus:outline-none" placeholder="Email">
            @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
               <button type="submit" class="bg-[#29066E] p-3 w-[250px] rounded-md text-center text-white font-medium text-xl mt-4" style="font-family: 'Poppins';">Kirim</button>
            </form>
        </div>  
    </div>
  </main>

@endsection