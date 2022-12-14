<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Clase;

class ClasesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function clases()
    {
        $d=Clase::all();
        //dd($d);
        return view('clases')->with('clases',$d);
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

    public function eliminar($id){
        $d = Clase::find($id);
        $d->delete();

        return redirect("/clases");
    }

    public function eliminar2(Request $request){

        $d = Clase::find($request->alumno)->delete();
        return redirect("/clases");

    }
}
