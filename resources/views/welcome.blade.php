<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shorcut icon" href="img/favico.png">
        <title>iReady</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
       <link rel="stylesheet" href="css/layout.css">
    </head>
    <body>
        <main class="menu fondo_imagen">
            <div>
                <div class="itittle">iReady</div>
            </div>
            <hr>
                <div>
                    <img src="img/menu-funciones.png" alt="funciones">
                </div>
                <div>
                    <h1>Una mejor forma de gestionar las asistencias</h1>
                </div>
                <div>
                    <p>iReady te ayuda a gestionar el registro de asistencias de los alumnos del aula</p>
                </div>
                 <div></div>
                <hr>
                <div class="link-registration">
                    <p>
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="ibtn-navegacion">Iniciar Sesion</a>
                                    {{-- <a href="{{ route('register') }}">Register</a> --}}
                                @endauth
                            </div>
                        @endif
                    </p>
                </div>
               
        </main>
    </body>
</html>
