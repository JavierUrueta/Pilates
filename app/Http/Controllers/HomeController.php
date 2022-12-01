<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home()
    {
        $d=Instructor::all();
        //dd($d);
        return view('home')->with('instructores',$d);
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

    public function agregarAlumno(Request $request){

        $d= new Alumno();

        $file = $request->file('foto');
        if ($request->hasFile('foto')) {
            $d->path=$request->file('foto')->storeAs('public',$file->getClientOriginalName());
            $d->name = $file->getClientOriginalName(); 
        }
        else{
            $d->name = NULL;
            $d->path = NULL;
        }

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

        $file = $request->file('foto');
        $d->nombre = $request->nombre;
        $d->cumpleaños = $request->cumpleaños;
        $d->telefono = $request->telefono;
        $d->padecimiento = $request->padecimiento;
        if(! $request->hasFile('foto')){

        }
        else{
            $d->path = $request->file('foto')->storeAs('public',$file->getClientOriginalName());
            $d->name = $file->getClientOriginalName();
        }
        $d->save();

        return redirect("/alumnos");
    }
}
