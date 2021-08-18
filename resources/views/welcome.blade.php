<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body class="home"   >
        <div id="app">
            <div class="container">
                <div class="row padding-heading">
                    <div class="col-md-3 ">
                        <img src="/img/logo.svg" width="150" alt="" srcset="">
                    </div>
                    <div class="col-md-5">

                    </div>
                    <div class="col-md-3">

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
        </div>
    </body>
</html>
