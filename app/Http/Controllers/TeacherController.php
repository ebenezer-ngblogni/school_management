<?php

namespace App\Http\Controllers;

use App\Models\FiliereModel;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class TeacherController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teachers List";
        return view('admin.teacher.list', $data);
    }
    public function add(){
        $data['header_title'] = "Add New Student";
        return view('admin.teacher.add', $data);
    }


   public function insert(Request $request){

       request()->validate([
           'email' => 'required|email|unique:users',

        ]);


        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->first_name = trim($request->first_name);
        $teacher->statut = trim($request->statut);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->user_type = 2;
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', 'teacher successfully created');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);

        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Teacher";
            return view('admin.teacher.edit', $data);
        }else{
            abort(404);
        }
    }

        public function update(Request $request, $id)
        {

            $teacher = User::getSingle($id);
            $teacher->name = trim($request->name);
            $teacher->first_name = trim($request->first_name);
            $teacher->statut = trim($request->statut);
             $teacher->email = trim($request->email);
             $teacher->password = Hash::make($request->password);
             $teacher->user_type = 3;
             $teacher->save();

             return redirect('admin/teacher/list')->with('success', 'teacher successfully created');
        }

        public function delete($id){

            $user = User::getSingle($id);
            // Check if the user exists
            if ($user) {
                // Delete the user
                $user->delete();

                // Optionally, you can redirect or return a response
                return redirect('admin/teacher/list')->with('success', 'User deleted successfully.');
            }

            return redirect('admin/teacher/list')->with('error', 'User not found.');
        }
}
