@extends('layouts.app')

@section('content')

</style>

<div class="container">

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    <main class="main-home fondo_img">
        <div class="itittle">Te damos la bienvenida a iReady</div>
        <hr>
        <div>iReady es una aplicacion web que ayuda a gestionar el registro de asistencias de los alumnos en el aula</div>
        <br><br>
        <section class="container-beneficio">
            <div class="titulo_section_beneficio">
                ASISTENCIAS EN LA NUBE
            </div>
        <br>
            <div class="beneficio-container">
                <div class="fdv_main">
                    <div class="fdv_img"><img src="img/liveStream.png" alt="Live Stream"></div>
                    <br>
                    <p class="description">
                        Consulta cuando y donde quieras
                    </p>
                </div>

            </div>

            


        </section>


    </main>
</div>
@endsection
