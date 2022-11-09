<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\User;
use Illuminate\Http\Request;

class TareaController extends Controller{

    public function index(){
        //return Tarea::all();
       $tareas = Tarea::where('user_id', auth()->user()->id)->get();
        return $tareas;
    }

    public function show(Tarea $tarea){
        return $tareas;
    }

    public function store(Request $request){
        $tarea = Tarea::create($request->all());
        $path = $request->image->store('tareas');
        $tarea->image = $path;
        $tarea->save();
        return response()->json($tarea,201);
    }

    public function update(Request $request, Tarea $tarea){
        $this->authorize('update',$tarea);
        $tarea->update($request->all());
        return response()->json($tarea, 200);;
    }
    
    public function check(Request $request, Tarea $tarea){
        $this->authorize('check',$tarea);
        $tarea->estado_tarea = "Finalizado";
        return response()->json($tarea, 200);;
    }

    public function delete(Request $request, Tarea $tarea){
        $this->authorize('delete',$tarea);
        $tarea->delete();
        return response()->json($tarea,204);
    }
}
