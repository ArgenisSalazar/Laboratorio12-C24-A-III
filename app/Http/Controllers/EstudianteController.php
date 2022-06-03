<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EstudianteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //Lista de estudiantes
    public function list(){
        $data['ests'] = Estudiante::paginate();

        return view('estudiantes.listar', $data);
    }

    //Formulario de estudiantes
    public function estform(){
        return view('estudiantes.estform');
    }

    //Guardar estudiantes
    public function save(Request $request){
        $validator = $this->validate($request, [
            'nombres'=>'required|string|max:200',
            'apellidos'=>'required|string|max:200',
            'email'=>'required|string|max:200|email|unique:estudiantes'
        ]);
        $estdata = request()->except('_token');
        Estudiante::insert($estdata);

        return back()->with('estudianteGuardado','Estudiante guardado');
    }

    //Eliminar estudiantes
    public function delete($id) {
        Estudiante::destroy($id);

        return back()->with('estudianteEliminado','Estudiante eliminado');
    }

    //Formulario para editar estudiantes
    public function editform($id) {
        $estudiante = Estudiante::findOrFail($id);

        return view('estudiantes.editform', compact('estudiante'));
    }

    //Edicion de estudiantes
    public function edit(Request $request, $id) {
        $datosEstudiante = request()->except((['_token', '_method']));
        Estudiante::where('id', '=', $id)->update($datosEstudiante);

        return back()->with('estudianteModificado','Estudiante modificado');
    }
}
