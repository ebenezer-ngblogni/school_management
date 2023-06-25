<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\FiliereMatiereModel;
use App\Models\FiliereModel;
use App\Models\MatiereModel;
use App\Models\User;



class FiliereMatiereController extends Controller
{
    public function list(){

        $data['getRecord'] = FiliereMatiereModel::getRecord();
        $data['header_title'] = "Subject Assign List";
        return view('admin.assign_subject.list', $data);
    }

    public function add(){
        $data['getClass'] = FiliereModel::getClass();
        $data['getSubject'] = MatiereModel::getSubject();
        /////////////////////////////////////////**************//////
        $data['getTeacher'] = User::getTeacherClass();
        ///////////////////////////////////////*****///////// */


        $data['header_title'] = "Assign Subject list";
        return view('admin.assign_subject.add', $data);
    }

    /* public function insert(Request $request){
        if(!empty($request->matiere_id)){
            foreach ($request->matiere_id as $matiere_id) {
                $getAlreadyFirst = FiliereMatiereModel::getAlreadyFirst($request->filiere_id, $matiere_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->save();
                }else{
                    $save = new FiliereMatiereModel;
                    $save->filiere_id = $request->filiere_id;
                    $save->matiere_id = $matiere_id;
                    $save->save();
                }
            }
            return redirect('admin/assign_subject/list')->with('success', "Association créée avec succès");

        }else{
            return redirect('admin/assign_subject/list')->with('error', "Please try again");


        }
    } old*/

    public function insert(Request $request){
        if(!empty($request->matiere_id)){
                $getAlreadyFirst = FiliereMatiereModel::getAlreadyFirst( $request->matiere_id );
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->save();
                    return redirect('admin/assign_subject/list')->with('error', "La matière est déjà assignée");
                }else{
                    $save = new FiliereMatiereModel;
                    $save->filiere_id = $request->filiere_id;
                    $save->matiere_id = $request->matiere_id ;
                    $save->teacher_id = $request->teacher_id ;

                    $save->save();
                }

            return redirect('admin/assign_subject/list')->with('success', "Association créée avec succès");

        }else{
            return redirect('admin/assign_subject/list')->with('error', "Veuillez réessayer");
        }
    }

    public function delete($id){

        $current = FiliereMatiereModel::getSingle($id);
        // Check if the user exists
        if ($current) {
            // Delete the current
            $current->delete();

            // Optionally, you can redirect or return a response
            return redirect('admin/assign_subject/list')->with('success', 'Association supprimée avec succès');
        }

        return redirect('admin/assign_subject/list')->with('error', 'Association non retrouvée');
    }
}
