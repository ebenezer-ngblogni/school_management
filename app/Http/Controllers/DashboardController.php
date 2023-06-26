<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FiliereModel;
use App\Models\MatiereModel;

use App\Models\User;

use Auth;

class DashboardController extends Controller
{
    public function dashboard(){

        $data['header_title'] = 'Dashboard';

        $data['getStudent'] = User::getStudent();
        $data['getTeacher'] = User::getTeacher();
        $data['getCourse'] = MatiereModel::getRecord();
        $data['getFiliere'] = FiliereModel::getRecord();






        if(Auth::user()->user_type == 1){

            return view('admin.dashboard', $data);

        }else if(Auth::user()->user_type == 2){

            return view('teacher.dashboard', $data);

        }else if(Auth::user()->user_type == 3){

            return view('student.dashboard', $data);

        }else if(Auth::user()->user_type == 4){

            return view('directeur.dashboard', $data);
        }
    }

}
