<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function clases()
    {
        return view('clases');
    }

    public function alumnos()
    {
        $d=Alumno::all();
        //dd($d);
        return view('alumnos')
                ->with('alumnos',$d);
    }

    public function agregarAlumno(Request $request){

        $d= new Alumno();

        $file = $request->file('foto');
        $d->path=$request->file('foto')->storeAs('public',$file->getClientOriginalName());
        $d->name = $file->getClientOriginalName();

        $d->nombre = $request->nombre;
        $d->cumpleaños = $request->cumpleaños;
        $d->telefono = $request->telefono;
        $d->padecimiento = $request->padecimiento;
        $d->save();

        return redirect("/alumnos");
    }

    public function eliminar($id){
        $d = Alumno::find($id);
        $d->delete();

        return redirect("/alumnos");
    }

    public function eliminar2(Request $request){

        $d = Alumno::find($request->alumno)->delete();
        return redirect("/alumnos");

    }
    
    public function muestraedicion($id){

        $d = Alumno::find($id);
        //return view('edicion')->with('producto', $d);


    }

    public function update(Request $request){

        $d= Alumno::find($request->id);
        $d->nombre = $request->nombre;
        $d->cumpleaños = $request->cumpleaños;
        $d->telefono = $request->telefono;
        $d->padecimiento = $request->padecimiento;
        $d->save();

        //return redirect("/pagina");


    }
}
