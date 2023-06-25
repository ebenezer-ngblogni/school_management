<?php

namespace App\Http\Controllers;

use App\Models\FiliereModel;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class StudentController extends Controller
{
    public function list(){

        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list', $data);
    }
    public function add(){
        $data['getClass'] = FiliereModel::getClass();
        $data['header_title'] = "Add New Student";
        return view('admin.student.add', $data);
    }


   public function insert(Request $request){

       request()->validate([
           'email' => 'required|email|unique:users',
           'matricule' => 'unique:users'

        ]);


        $student = new User;
        $student->name = trim($request->name);
        $student->first_name = trim($request->first_name);
        $student->gender = trim($request->gender);
        $student->filiere_id = trim($request->filiere_id);


        if(!empty($request->date_of_birth)){
            $student->date_of_birth = $request->date_of_birth;
        }

        $student->matricule = trim($request->matricule);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', 'Student successfully created');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);

        if(!empty($data['getRecord'])){
            $data['getClass'] = FiliereModel::getClass();
            $data['header_title'] = "Edit Student";
            return view('admin.student.edit', $data);
        }else{
            abort(404);
        }
    }

        public function update(Request $request, $id)
        {
            // request()->validate([
            //     'email' => 'required|email|unique:users,email'.$id
            //  ]);


             $student = User::getSingle($id);
             $student->name = trim($request->name);
             $student->first_name = trim($request->first_name);
             $student->gender = trim($request->gender);
             $student->filiere_id = trim($request->filiere_id);


             if(!empty($request->date_of_birth)){
                 $student->date_of_birth = $request->date_of_birth;
             }

             if(!empty($request->password)){
                $student->password = $request->password;
            }

             $student->matricule = trim($request->matricule);
             $student->email = trim($request->email);
             $student->password = Hash::make($request->password);
             $student->user_type = 3;
             $student->save();

             return redirect('admin/student/list')->with('success', 'Student successfully created');
        }

        public function delete($id){

            $user = User::getSingle($id);
            // Check if the user exists
            if ($user) {
                // Delete the user
                $user->delete();

                // Optionally, you can redirect or return a response
                return redirect('admin/student/list')->with('success', 'User deleted successfully.');
            }

            return redirect('admin/student/list')->with('error', 'User not found.');
        }

        public function my_student()
        {
            $data['getRecord'] = User::getTeacherStudent(Auth::user()->id);
            $data['header_title'] = "My Student List";
            return view('teacher.my_student', $data);
        }



}
