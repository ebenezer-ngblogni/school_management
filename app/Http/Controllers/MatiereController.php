<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatiereModel;
use App\Models\FiliereMatiereModel;

use Auth;

class MatiereController extends Controller
{
    public function list(){
        $data['getRecord'] = MatiereModel::getRecord();

        $data['header_title'] = "Listes des Matières";
        return view('admin.matiere.list', $data);
    }

    public function add(){
        $data['header_title'] = "Add Subject";
        return view('admin.matiere.add', $data);
    }

    public function insert(Request $request){
        $save = new MatiereModel;
        $save->name = $request->name;
        $save->semestre = $request->semestre;
        $save->masse_horaire = $request->duree;
        $save->credit = $request->credit;
        $save->save();

        return redirect('admin/matiere/list')->with('success', "matiere créée avec succès");
    }

    public function edit($id){
        $data['getRecord'] = MatiereModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Editing subject";
            return view('admin.matiere.edit', $data);
        }else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        $save = MatiereModel::getSingle($id);
        $save->name = trim($request->name);
        $save->semestre = $request->semestre;
        $save->masse_horaire = $request->duree;
        $save->credit = $request->credit;
        $save->save();

        return redirect('admin/matiere/list')->with('success', "matiere modifiée avec succès");
    }

    public function delete($id){

        $current = MatiereModel::getSingle($id);
        // Check if the user exists
        if ($current) {
            // Delete the current
            $current->delete();

            return redirect('admin/matiere/list')->with('success', 'courses deleted successfully.');
        }

        // current not found, handle the error
        return redirect('admin/matiere/list')->with('error', 'courses not found.');
    }

    public function mysubject()
    {

        $data['getRecord'] = FiliereMatiereModel::mySubject(Auth::user()->filiere_id);

        $data['header_title'] = "Mes Matières";
        return view('student.mysubject', $data);
    }
}
