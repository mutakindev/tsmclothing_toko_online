<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TSM Clothing</title>
  <link rel="stylesheet" href="{{ asset('tailwindcss') }}/app.css" />
  <link rel="shortcut icon" href="{{ asset('adminassets') }}/assets/images/favicon.png" />
  <style>
    body {
      background-image: url('images/login-background.png') !important;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      width: 100%;
      height: 100vh;
    }
  </style>
</head>

<body>
  <div class="logo">
    <img src="{{ asset('images/logo.png') }}" alt="Logo TSM Clothing" class="w-1/2 md:w-1/5 mx-auto my-10">
  </div>
  <div class="bg-white shadow-md rounded-md mx-auto my-6 w-3/4 md:w-1/3 p-1">
    <div class="tab-header p-3 flex justify-around items-center border-b-2 border-gray-400">
      <div>
        <a href="/register" class="text-2xl text-gray-800 cursor-pointer">Daftar</a>
      </div>
      <div class="w-1 h-6 bg-gray-300 rounded-lg"></div>
      <div>
        <a href="/login" class="text-2xl text-gray-500 cursor-pointer">Login</a>
      </div>
    </div>
    <form class="pt-3" method="POST" action="{{ route('register') }}">
      @csrf
      <div class="w-full p-3">
        <div class="w-auto mb-2">
          <label class="block text-grey-darker text-sm font-bold mb-2" for="first_name">Nama Lengkap</label>
          <input id="name" type="text"
            class="appearance-none border-2 border-gray-800 focus:outline-none rounded-full w-full py-2 px-3 text-grey-darker @error('name') border-red-500 @enderror"
            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">

          @error('name')
          <span class="text-red-400 text-sm" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="w-auto mb-2">
          <label class="block text-grey-darker text-sm font-bold mb-2" for="email">Email</label>
          <input id="email" type="email"
            class="appearance-none border-2 border-gray-800 focus:outline-none rounded-full w-full py-2 px-3 text-grey-darker @error('email') border-red-500 @enderror"
            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

          @error('email')
          <span class="text-red-400 text-sm" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="w-auto mb-2">
          <label class="block text-grey-darker text-sm font-bold mb-2" for="password">Password</label>
          <input id="password" type="password"
            class="appearance-none border-2 border-gray-800 focus:outline-none rounded-full w-full py-2 px-3 text-grey-darker @error('password') border-red-500 @enderror"
            name="password" required autocomplete="new-password" placeholder="Password">

          @error('password')
          <span class="text-red-400 text-sm" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="w-auto mb-2">
          <label class="block text-grey-darker text-sm font-bold mb-2" for="confirm-password">Konfirmasi
            Password</label>
          <input id="password-confirm" type="password"
            class="appearance-none border-2 border-gray-800 focus:outline-none rounded-full w-full py-2 px-3 text-grey-darker"
            name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
        </div>
        <div class="mt-10 text-center">
          <button type="submit" class=" rounded-full bg-gray-900 text-white px-3 py-1 text-lg">REGISTRASI</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>