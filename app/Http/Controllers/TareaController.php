<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller{

    public function index(){
        return Tarea::all();
    }

    public function show(Tarea $tarea){
        return $tarea;
    }

    public function store(Request $request){
        $tarea = Tarea::create($request->all());
        $path = $request->image->store('tareas');
        $tarea->image = $path;
        $tarea->save();
        return response()->json($tarea,201);
    }

    public function update(Request $request, Tarea $tarea){
        $tarea->update($request->all());
        return response()->json($tarea,200);
    }

    public function delete(Request $request, Tarea $tarea){
        $tarea->delete();
        return response()->json($tarea,204);
    }


}
