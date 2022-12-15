<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante1;

class PagesController extends Controller
{
    public function fnIndex(){
        return view('welcome');
    }
    public function fnLista(){
        $xAlumnos = Estudiante1::all();
        return view ('dashboard', compact('xAlumnos'));
    }

    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante1::findOrFail($id);
        return view ('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnGaleria($numero=0){
        $valor=$numero;
        $otro=25;
        return view ('pagGaleria' ,compact('valor', 'otro'));
    }
    public function fnRegistrar(Request $request){

        //return $request->all();         //Prueba de "token" y datos recibidos

        $request ->validate([
            'codEst' => 'required',
            'nomEst' => 'required',
            'apeEst' => 'required',
            'fnaEst' => 'required',
            'turnMat' => 'required',
            'semMat' => 'required',
            'estMat' => 'required'
        ]);

        $nuevoEstudiante = new Estudiante1;
        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turnMat = $request->turnMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;
        
        $nuevoEstudiante->save();
        
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }
    public function fnEstActualizar($id){                   //Paso 1

        $xActAlumnos = Estudiante1::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id){        //Paso 2

        //return $request->all();         //Prueba de "token" y datos recibidos

        $xUpdateAlumnos = Estudiante1::findOrFail($id);

        $xUpdateAlumnos->codEst = $request->codEst;
        $xUpdateAlumnos->nomEst = $request->nomEst;
        $xUpdateAlumnos->apeEst = $request->apeEst;
        $xUpdateAlumnos->fnaEst = $request->fnaEst;
        $xUpdateAlumnos->turnMat = $request->turnMat;
        $xUpdateAlumnos->semMat = $request->semMat;
        $xUpdateAlumnos->estMat = $request->estMat;
        
        $xUpdateAlumnos->save();
        
        //$xAlumnos = Estudiante1::all();                        //Datos de BD
        //return view('pagLista', compact('xAlumnos'));          //Pasar a pagLista
        return back()->with('msj','Se actualizó con éxito...');  //Regresar con msj
    }

    //////////////////// DELETE /////////////////////////////////// 
    public function fnEliminar(Request $request, $id){
        $deleteAlumno = Estudiante1::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj','Se elimino con éxito');
    
    }

    //CURSOS ______________________________________________________________________________
    public function fnListaCurso(){
        $xCursos = Curso::all();
        return view ('pagListaCurso', compact('xCursos'));
    }
    
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
        
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro el curso con éxito...'); //Regresar con msj
    }
    
    public function fnEstActualizarCurso($id){                   //Paso 1

        $xActCurso = Curso::findOrFail($id);
        return view('Curso.pagActualizarCurso', compact('xActCurso'));
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
    
    //////////////////// DELETE /////////////////////////////////// 
    public function fnEliminarCurso(Request $request, $id){
        $deleteCurso = Curso::findOrFail($id);
        $deleteCurso->delete();
        return back()->with('msj','Se elimino el curso con éxito');
    
    }
    
    public function fnDetalleCurso($id){
        $xDetCurso = Curso::findOrFail($id);
        return view ('Curso.pagDetalleCurso', compact('xDetCurso'));
    }
    
}
