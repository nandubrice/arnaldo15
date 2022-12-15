<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Curso;

class PagesController extends Controller
{
    //PORTADA - BIENVENIDA - PARA EL PUBLICO GENERAL
    public function  fnIndex () {
        return view('welcome');
    }

    public function  fnEstDetalle($id) {
        $xDetAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagDetalle',compact('xDetAlumnos'));
    }

    //READ
    public function  fnLista() {
        $xAlumnos = Estudiante::all();
        return view('pagLista',compact('xAlumnos'));
    }

    //////////////////// CREATE ///////////////////////////////////
    public function fnRegistrar(Request $request){

        //return $request->all();         //Prueba de "token" y datos recibidos
    
        $request ->validate([
            'codEst' => 'required',
            'nomEst' => 'required',
            'apeEst' => 'required',
            'fnaEst' => 'required',
            'turMat' => 'required',
            'semMat' => 'required',
            'estMat' => 'required'
        ]);
    
        $nuevoEstudiante = new Estudiante;
        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;
            
        $nuevoEstudiante->save();
            
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

    //////////////////// UPDATE ///////////////////////////////////
    public function fnEstActualizar($id){                   //Paso 1

        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    //////////////////// DELETE /////////////////////////////////// 
    public function fnEliminar($id){
        $deleteAlumno = Estudiante::findOrFail($id);
        $deleteAlumno->delete();

        return back()->with('msj','Se elimino con éxito...');  //Regresar con msj
    
    }

    public function fnUpdate(Request $request, $id){        //Paso 2

        //return $request->all();         //Prueba de "token" y datos recibidos

        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos->codEst = $request->codEst;
        $xUpdateAlumnos->nomEst = $request->nomEst;
        $xUpdateAlumnos->apeEst = $request->apeEst;
        $xUpdateAlumnos->fnaEst = $request->fnaEst;
        $xUpdateAlumnos->turMat = $request->turMat;
        $xUpdateAlumnos->semMat = $request->semMat;
        $xUpdateAlumnos->estMat = $request->estMat;
        
        $xUpdateAlumnos->save();
        
        //$xAlumnos = Estudiante1::all();                        //Datos de BD
        //return view('pagLista', compact('xAlumnos'));          //Pasar a pagLista
        return back()->with('msj','Se actualizó con éxito...');  //Regresar con msj
    } 
  



    /////////////////examen/////////////////////
    public function  fnDetalleCurso($id) {
        $xDetMateria = Curso::findOrFail($id);
        return view('Curso.pagDetalleCurso',compact('xDetMateria'));
    }


    public function  fnListaCurso() {
        $xListaCurso = Curso::all();
        return view('pagListaCurso',compact('xListaCurso'));
    }
   //////////////////// CREATE ///////////////////////////////////
   public function fnRegistrarCurso(Request $request){

    //return $request->all();         //Prueba de "token" y datos recibidos

    $request ->validate([
        'denCur' => 'required',
        'hrsCur' => 'required',
        'creCur' => 'required',
        'plaCur' => 'required',
        'tipCur' => 'required',
        'estCur' => 'required'
    ]);

    $nuevoCurso = new Curso;
    $nuevoCurso->denCur = $request->denCur;
    $nuevoCurso->hrsCur = $request->hrsCur;
    $nuevoCurso->creCur = $request->creCur;
    $nuevoCurso->plaCur = $request->plaCur;
    $nuevoCurso->tipCur = $request->tipCur;
    $nuevoCurso->estCur = $request->estCur;
        
    $nuevoCurso->save();
        
    //$xListaCurso = Curso::all();                      //Datos de BD
    //return view('pagLista', compact('xListaCurso'));        //Pasar a pagLista
    return back()->with('msj','Se registro con éxito...'); //Regresar con msj
}

    public function fnEstActualizarCurso($id){                   //Paso 1

        $xActCurso = Curso::findOrFail($id);
        return view('Curso.pagActualizarCurso', compact('xActCurso'));
    }


    public function fnEliminarCurso($id){
        $deleteCurso = Curso::findOrFail($id);
        $deleteCurso->delete();

        return back()->with('msj','Se elimino con éxito...');  //Regresar con msj
    
    }
    public function fnUpdateCurso(Request $request, $id){        //Paso 2

        //return $request->all();         //Prueba de "token" y datos recibidos

        $xUpdateCurso = Curso::findOrFail($id);

        $xUpdateCurso->denCur = $request->denCur;
        $xUpdateCurso->hrsCur = $request->hrsCur;
        $xUpdateCurso->creCur = $request->creCur;
        $xUpdateCurso->plaCur = $request->plaCur;
        $xUpdateCurso->tipCur = $request->tipCur;
        $xUpdateCurso->estCur = $request->estCur;
        
        $xUpdateCurso->save();
        
        //$xAlumnos = Estudiante1::all();                        //Datos de BD
        //return view('pagLista', compact('xAlumnos'));          //Pasar a pagLista
        return back()->with('msj','Se actualizó con éxito...');  //Regresar con msj
    } 
   public function  fnGaleria($numero=0) {
        //return view('Foto de codigo;' .$numero);
       return view('pagGaleria',['valor' => $numero, 'otro'=>25]);
    }
}
