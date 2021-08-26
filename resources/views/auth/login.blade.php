@extends('layouts.welcome')
@section('content')

@if (session('status'))
    <div>
        {{ $status }}
    </div>
@endif

@if ($errors->any())
<div>
    <div class="font-medium text-red-600">
        {{ __('Whoops! Something went wrong.') }}
    </div>

    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
    </ul>
</div>
@endif
<main class="form-signin">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <img src="/img/logo.svg" width="150" alt="" srcset="">
        <h1 class="h3 mb-3 fw-normal">Ingresa</h1>

      <div class="form-floating">
        <input type="email" class="form-control" name="email" value="{{ old('email')}} " required autofocus >
        <label for="floatingInput">Correo</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" type="password"
        name="password"
        required autocomplete="current-password">
        <label for="floatingPassword">Contraseña</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif


    </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>

    </form>
  </main>











        </form>



@endsection
