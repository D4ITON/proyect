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
<div class="container">
    <div class="isection">
        <div class="icol-md-8">
            <div class="icard">
                <div class="icard-header">

                    <div class="description-login">
                        <h1 class="titulo-login"><span class="titulo-i">i</span>Ready</h1>
                        <br>
                        <hr>
                        <br>
                        <p class="description-login-text">Llegar a tiempo es la voz</p>
                    </div>

                </div>

                <div class="icard-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="text-input-login-data">{{ __('Email') }}</label>

                            <div class="input-dato input label" >
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="input-dato input label">
                            <label for="password" class="text-input-login-data">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="input-dato input ckecbox-input">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox text-input-login-data">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-dato input boton-login-container">
                            <div class="container-boton-login">
                                <button type="submit" class="btn ibtn-primary">
                                    {{ __('Login') }}
                                </button>

                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
</html>

