@extends('layouts.welcome')
@section('content')
<div class="container">
    <div class="row padding-heading">
        <div class="col-md-3 ">
            <img src="/img/logo.svg" width="150" alt="" srcset="">
        </div>
        <div class="col-md-5">

        </div>
        <div class="col-md-3">
            <a href="/login" class="btn btn-primary">Acceder</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 pt-5">
            <h3 class="text-white">
                El mejor sitio de citas online
            </h3>
            <h1 class="heading text-menta">
                <strong>
                    para encontrar pareja
                </strong>

            </h1>
            <a href="{{ url('auth/facebook') }}" class="facebook-button">continuar con Facebook</a>
        </div>
        <div class="col-md-6">
            <img src="/img/chat.png" alt="">
        </div>
    </div>

</div>
@endsection
