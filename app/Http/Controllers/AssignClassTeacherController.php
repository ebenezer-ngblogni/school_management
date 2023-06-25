<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\AssignClassTeacherModel;
use App\Models\FiliereModel;
use App\Models\MatiereModel;
use App\Models\User;



use Illuminate\Http\Request;

class AssignClassTeacherController extends Controller
{
    public function list(){

        $data['getRecord'] = AssignClassTeacherModel::getRecord();


        $data['header_title'] = "Assign Class Teacher";
        return view('admin.class_teacher.list', $data);
    }

    public function add(){

        // $data['getSubject'] = MatiereModel::getSubject();
        $data['getClass'] = FiliereModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();

        $data['header_title'] = "Assign Class Teacher";
        return view('admin.class_teacher.add', $data);
    }

    public function insert(Request $request){
        if(!empty($request->teacher_id)){
            foreach ($request->teacher_id as $teacher_id) {
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->filiere_id, $teacher_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->save();
                }else{
                    $save = new AssignClassTeacherModel;
                    $save->filiere_id = $request->filiere_id;
                    $save->teacher_id = $teacher_id;
                    $save->save();
                }
            }
            return redirect('admin/class_teacher/list')->with('success', "Association créée avec succès");

        }else{
            return redirect('admin/class_teacher/list')->with('error', "Please try again");


        }
    }

    public function delete($id){

        $current = AssignClassTeacherModel::getSingle($id);
        // Check if the user exists
        if ($current) {
            // Delete the current
            $current->delete();

            // Optionally, you can redirect or return a response
            return redirect('admin/class_teacher/list')->with('success', 'courses deleted successfully.');
        }

        return redirect('admin/class_teacher/list')->with('error', 'courses not found.');
    }
}
