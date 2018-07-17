<?php

namespace App\Http\Controllers;
use App\Asistencia;
use App\Curso;
use App\Clase;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AsistenciasController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        
    }


    public function index()
    {
        $cursos = Curso::all();
        return view('asistencias.index',compact('users','cursos'));
    }

    public function create($clase_id,$curso_id)
    {


        $users = User::all();
        $clasestodo = Clase::all()->where('id', $curso_id);
        // return $clasestodo;
        // foreach ($clasestodo as $clase) {
        //     echo $clase->tomo_asistencia;
        // }




        $nombre_curso = Curso::all()->where('id', $clase_id)->pluck('nombre')->implode(' ');
        $nombre_clase = Clase::all()->where('id', $curso_id)->pluck('tema')->implode(' ');
        return view('asistencias.create',compact('users','clase_id','nombre_clase','nombre_curso','curso_id','clasestodo'));

    }

    public function store(Request $request, $clase_id, $curso_id)
    {
         

        DB::table('clases')
        ->where('id', '=', $clase_id)
        ->update(
            ['tomo_asistencia' => $request->get('guardar')]
        );

      foreach ($request->select as $key => $v) {
        $data = array(
                    'user_id'=>$key,
                    'clase_id' => $clase_id,
                    'asistio'=>$request->select [$key],
                  );
        Asistencia::insert($data);
      }
        
      return back()->with('info','Registro exitoso')->with('regresar','Regresar')->with('registrado','Registrado');
      //   $num_asistencias = Asistencia::where('clase_id', $curso_id)->get();
      //   $num_asistencias->pluck('asistio');

      //   $asistentes = 0;

      //   foreach ($num_asistencias as $asistencia) 
      //   {
      //       ($asistencia->asistio == '1') ? $asistentes++ : false ;
      //   }



      // $asistencias = DB::table('users')
      //               ->join('asistencias', 'users.id', '=', 'asistencias.user_id')
      //               ->select('users.id', 'users.name', 'asistencias.asistio')
      //               ->where('asistencias.clase_id', '=', $curso_id)
      //               ->get();



      //   $nombre_curso = Curso::all()->where('id', $curso_id)->pluck('nombre')->implode(' ');
      //   $nombre_clase = Clase::all()->where('id', $clase_id)->pluck('tema')->implode(' ');
      //   $fecha_clase = Clase::all()->where('id', $curso_id)->pluck('created_at')->first();
      // return view('asistencias.show',compact('clase_id','nombre_clase','nombre_curso','fecha_clase', 'asistencias','asistentes'));

    }

    public function show($clase_id, $curso_id)
    {

        $num_asistencias = Asistencia::where('clase_id', $curso_id)->get();
        $num_asistencias->pluck('asistio');

        $asistentes = 0;

        foreach ($num_asistencias as $asistencia) 
        {
            ($asistencia->asistio == '1') ? $asistentes++ : false ;
        }

         $asistencias = DB::table('users')
                    ->join('asistencias', 'users.id', '=', 'asistencias.user_id')
                    ->select('users.id', 'users.name', 'asistencias.asistio')
                    ->where('asistencias.clase_id', '=', $curso_id)
                    ->get();

        // return $asistencias->where('clase_id', $curso_id);


        $nombre_curso = Curso::all()->where('id', $clase_id)->pluck('nombre')->implode(' ');
        $nombre_clase = Clase::all()->where('id', $curso_id)->pluck('tema')->implode(' ');
        $fecha_clase = Clase::all()->where('id', $curso_id)->pluck('created_at')->first();
        // dd($fecha_clase);
        return view('asistencias.show',compact('nombre_curso','nombre_clase','asistencias','fecha_clase','user_nombres','asistentes'));
        // return "asistencias";
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        

        Clase::findOrFail($id)->delete();
        return redirect()->route('asistencias.index');



    }

     /* ----------FUNCION VER CLASES---------- */

     public function verclases($curso_id)
    {

        // dd($nombre = Curso::all()->where('id', $id)->first()->nombre);
        $nombre = Curso::all()->where('id', $curso_id)->pluck('nombre')->implode(' ');
        $clases = Clase::all()->where('curso_id',$curso_id);

        
        



        return view('clases.index',compact('clases','nombre','curso_id'));

    }

    /* -------------CLASES CREATE------------- */


    public function createclases($id)
    {
       
        $nombre = Curso::all()->where('id', $id)->pluck('nombre')->implode(' ');
        return view('clases.create',compact('id','nombre','curso_id'));
    }

    /* --------------CLASES STORE-------------- */
    public function storeclases(Request $request, $id)
    {
        //Campos:
        // id, curso_id, tema, timestamps
        $curso_id = (int) $id;
        $clase = new Clase(array(
            'curso_id' => $curso_id,
            'tema' => $request->get('tema'),
        ));
        $clase->save();
        return redirect()->route('asistencias.clases',$id);
    }
   


    // RUTA PARA VER TODAS LAS ASISTENCIAS EN GENERAL

    public function vergeneral($curso_id)
    {



        $nombre_curso = Curso::all()->where('id', $curso_id)->pluck('nombre')->implode(' ');
        $nombre_docente = Curso::all()->where('id', $curso_id)->pluck('docente')->implode(' ');

        $numero_clases = Clase::all()->where('curso_id',$curso_id)->count();


        $num_asistencias = Asistencia::where('clase_id', $curso_id)->get();


        $num_asistencias->pluck('asistio');



        $asistencias = DB::table('users')
                    ->join('asistencias', 'users.id', '=', 'asistencias.user_id')
                    ->select('users.id', 'users.name', 'asistencias.asistio')
                    ->where('asistencias.clase_id', '=', $curso_id)
                    ->get();


        // return $asistencias;
        

        // return $numero_clases_user = DB::table('asistencias')
        //             ->join('clases', 'asistencias.clase_id', '=', 'clases.id')

        //             ->get();
        // $asistencia_por_usuario = Asistencia::where('user_id', $curso_id)->get();
        // return $asistencia_por_usuario;
                $asistentes = Asistencia::where('clase_id', $curso_id)->count();
                // return $asistentes;


                for ($i=1; $i < $asistentes+1; $i++) { 
                   
                    $consulta = DB::table('cursos')
                                ->join('clases', 'cursos.id', '=', 'clases.curso_id')
                                ->join('asistencias', 'clases.id', '=', 'asistencias.clase_id')
                                ->groupBy('user_id', 'cursos.id', 'cursos.nombre', 'clases.id', 'tema', 'asistio')
                                // ->having('user_id', '=', $i)
                                ->having('cursos.id', '=', $curso_id)
                    ->get();
                    // echo $user;
                    // echo $consulta;
                        $datos[$i] = $consulta;
                }

        // foreach ($asistentes as $user) {
        //     echo $user."<br>";
  
        // }

        // return $datos_coleccion = collect ($datos);
        // return $datos_coleccion->pluck('user_id');
// 
        // $si_asistio = 0;
        // // $no_asistio = 0;
        // foreach ($datos as $asistencia) 
        // {
        //     // return $asistencia;
        //     foreach ($asistencia as $key) {
        //         // return $key->asistio;
        //         ($key->asistio == '1') ? $si_asistio++ : false ;
        //     }
        // }

        // return $si_asistio;
        // return $no_asistio;

        
            // foreach ($asistencia as $key => $value) {
            //     ($value->asistio == '1') ? $no_asistio++ : false ;
            // }




        // $datos[]=array(

        //     "nombre"=>"".$_POST["nom"]."",
        //     "apellido"=>"".$_POST["ap"].""
        // );

        // foreach($activities as $k => $v) {
        //     $a[] = $v['name'];
        // }

        // return $numero_clases_user;

        $numero_clases_user = Clase::all()->where('curso_id',$curso_id);
       
       









        return view('asistencias.showgeneral',compact('clases','nombre_curso','curso_id','nombre_docente','numero_clases'));

    }


}







    // dd($nombre = Curso::all()->where('id', $id)->first()->nombre);
    // $nombre = Curso::all()->where('id', $id)->pluck('nombre')->implode(' ');


// FUNCION DE REGISTRO DE ALUMNOS
    // function registrar(Request $request){
      // dd($request->select ['3']);
      //   dd($request->all());
      // foreach ($request->select as $key => $v) {
      //   $data = array('id'=>$key,
      //                 'asistio'=>$request->select [$key]);
      //   Asistencia::insert($data);
      // }
      
        // return "Guardado";
    // }






// CREACION DE VISTA PARA MOSTRAR A LOS ASISTENTES DE UNA CLASE