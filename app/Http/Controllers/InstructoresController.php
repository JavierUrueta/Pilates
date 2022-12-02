<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\Alumno;
use App\Models\Clase;
use App\Models\Inscripcion;

class InstructoresController extends Controller
{
    public function home()
    {
        $d=Instructor::all();
        //dd($d);
        return view('home')->with('instructores',$d);
    }

    public function clases()
    {
        $d=Clase::join('instructores','instructores.id', '=', 'clases.instructor')->get(['instructores.nombre', 'clases.id','clases.h_inicial','clases.h_final']);

        //dd($d);
        $i=Instructor::all();
        $a=Alumno::all();
        $ins=Inscripcion::join('alumnos','alumnos.id', '=', 'clasesxalumno.alumno')->get(['alumnos.nombre', 'alumnos.id','clasesxalumno.id','clasesxalumno.clase']);

        //dd($d);
        return view('clases')->with('clases',$d)->with('instructores',$i)->with('alumnos',$a)->with('inscripciones',$ins);
    }

    public function alumnos()
    {
        $d=Alumno::all();
        //dd($d);
        return view('alumnos')->with('alumnos',$d);
    }

    public function agregarInstructor(Request $request){

        $d= new Instructor();

        $d->nombre = $request->nombre;
        $d->turno = $request->turno;
        $d->save();

        return redirect("/home");
    }

    public function eliminarInstructor(Request $request){

        $d = Instructor::find($request->instructor)->delete();
        return redirect("/home");

    }
    
    public function muestraedicion($id){

        $d = Instructor::find($id);
        //return view('edicion')->with('producto', $d);


    }

    public function update(Request $request){

        $d= Instructor::find($request->id);

        $d->nombre = $request->nombre;
        $d->turno = $request->turno;
        $d->save();

        return redirect("/home");
    }
}
