<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Clase;
use App\Models\Instructor;
use App\Models\Inscripcion;
use PDF;

class ClasesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function clases()
    {
        $d=Clase::all();
        $i=Instructor::all();
        //dd($d);
        return view('clases')->with('clases',$d)->with('instructores',$i);
    }

    public function alumnos()
    {
        $d=Alumno::all();
        //dd($d);
        return view('alumnos')->with('alumnos',$d);
    }

    public function agregarClase(Request $request){

        $d= new Clase();

        $d->h_inicial = $request->h_inicial;
        $d->h_final = $request->h_final;
        $d->instructor = $request->instructor;
        $d->save();

        return redirect("/clases");
    }

    public function eliminarClase(Request $request){
        //dd($request->clase);
        $i=Inscripcion::where('clase',$request->clase)->delete();
        $d = Clase::find($request->clase)->delete();
        return redirect("/clases");

    }

    public function inscribirAlumno(Request $request){

        $d= new Inscripcion();

        $d->clase = $request->horaClase;
        $d->alumno = $request->alumno;
        $d->save();

        return redirect("/clases");

    }

    public function eliminarAlumnoDeClase(Request $request){
        //dd($request->clase);
        $d = Inscripcion::find($request->inscripcion)->delete();
        return redirect("/clases");

    }

    public function creaPdf(Request $request){

        $d=Alumno::all();

        $pdf = PDF::loadView('pruebaparapdf', array('alumnos'=> $d));
        return $pdf->download('pruebapdf.pdf');
    }
}
