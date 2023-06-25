<?php

namespace App\Http\Controllers;

use App\Models\FiliereMatiereModel;
use App\Models\PDFModel;
use Illuminate\Http\Request;
use Auth;
use Str;


class PDFController extends Controller
{
    public function addFile(){

        $data['getRecord'] = FiliereMatiereModel::teacherAccury(Auth::user()->id);
        $data['getStart'] = PDFModel::getTeacherFile(Auth::user()->id);

        $data['header_title'] = "Add document";
        return view('teacher.addFile', $data);
    }

    public function readFile(){

        $dat = FiliereMatiereModel::mySubject(Auth::user()->filiere_id);

        $temp = array();

        foreach ($dat as $value) {
            $temp[] = PDFModel::getFromSubject($value->matiere_id);
        }

        $data['getStart'] = $temp;
        // dd($data['getStart']);


        $data['header_title'] = "Getdocument";
        return view('student.readFile', $data);
    }

    public function insert(Request $request){

        $save = new PDFModel;

        if(!empty($request->file('file'))){
            $ext = $request->file('file')->getClientOriginalExtension();
            $file = $request->file('file');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/', $filename);

            $save->teacher_id = Auth::user()->id;
            $save->matiere_id = $request->filiere_id;
            if(!empty($request->description)){

                $save->file_name = $request->description;
            }else{
                $save->file_name = $filename;
            }

            $save->file_path = 'upload/'.$filename;

            $save->save();

            return redirect('teacher/addFile')->with('success', "Document ajouté avec succès");
        }

    }

 /*    public function delete($id){

        $user = User::getSingle($id);
        // Check if the user exists
        if ($user) {
            // Delete the user
            $user->delete();

            // Optionally, you can redirect or return a response
            return redirect('admin/admin/list')->with('success', 'User deleted successfully.');
        }

        return redirect('admin/admin/list')->with('error', 'User not found.');
    }
 */
}
