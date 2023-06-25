<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FiliereModel;
use App\Models\FiliereMatiereModel;
use App\Models\WeekModel;
use App\Models\ClassSubjectTimetableModel;
use App\Models\MatiereModel;
use Auth;


class ClassTimetableController extends Controller
{
    public function list(Request $request)
    {
        $data['getClass'] = FiliereModel::getClass();
        // $data['getSubject'] = MatiereModel::getSubject();



        if(!empty($request->class_id)){

            $data['getSubject'] = FiliereMatiereModel::mySubject($request->class_id);
        }


        $getWeek = WeekModel::getRecord();
        $week = array();
        foreach($getWeek as $value){
            $dataW = array();
            $dataW['week_id'] = $value->id;
            $dataW['week_name'] = $value->name;
            if(!empty($request->class_id) && !empty($request->subject_id)){

                $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($request->class_id, $request->subject_id, $value->id);

                if(!empty($ClassSubject)){
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['room_number'] = $ClassSubject->room_number;
                }else{
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }
            }else{
                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['room_number'] = '';
            }


            $week[] = $dataW;

        }

        $data['week'] = $week;


        $data['header_title'] = "Class Timetable";
        return view('admin.class_timetable.list', $data);
    }

    //////////////////

    public function get_subject(Request $request)
    {
        $getSubject = FiliereMatiereModel::mySubject($request->class_id);
        $html = "<option value=''>Select</option>";

        foreach($getSubject as $value){
            $html .= "<option value='".$value->matiere_id."'>".$value->matiere_name."</option>";
        }
        $json['html'] = $html;
        echo json_encode($json);
    }

    public function insert_update(Request $request)
    {
        ClassSubjectTimetableModel::where('class_id', '=', $request->class_id)->where('subject_id', '=', $request->subject_id)->delete();

        foreach ($request->timetable as $timetable) {
            if(!empty($timetable['week_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time']) && !empty($timetable['room_number'])){
                $save = new ClassSubjectTimetableModel;
                $save->class_id = $request->class_id;
                $save->subject_id = $request->subject_id;
                $save->week_id = $timetable['week_id'];
                $save->start_time = $timetable['start_time'];
                $save->end_time = $timetable['end_time'];
                $save->room_number = $timetable['room_number'];
                $save->save();

            }
        }
        return redirect()->back()->with('success', "Programmation ajoutée");
    }

    ///student

    public function myTimetable()
    {
        $result = array();

        $getRecord = FiliereMatiereModel::mySubject(Auth::user()->filiere_id);

        foreach ($getRecord as $value) {
            $dataS['name'] = $value->matiere_name;

            $getWeek = WeekModel::getRecord();
            $week = array();
            foreach ($getWeek as $valueW) {
                $dataW = array();
                $dataW['week_name'] = $valueW->name;

                $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($value->filiere_id, $value->matiere_id, $valueW->id);

                if(!empty($ClassSubject)){
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['room_number'] = $ClassSubject->room_number;
                }else{
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }

                $week[] = $dataW;
            }

            $dataS['week'] = $week;
            $result[] = $dataS;
        }

        $data['getRecord'] = $result;

        $data['header_title'] = "My Timetable";
        return view('student.my_timetable', $data); //edited
    }

    //Teacher
    public function teacherTimetable()
    {

        $result = array();

        $getRecord = FiliereMatiereModel::teacherAccury(Auth::user()->id);
        $gh = array();

        foreach ($getRecord as $value) {
            $Record = ClassSubjectTimetableModel::getRecordAccury($value->filiere_id, $value->matiere_id);
            foreach ($Record as $current) {
                $dataC = array();

                $dataC['week_name'] = $current->week_name;
                $dataC['filiere_name'] =  $current->filiere_name;
                $dataC['matiere_name'] = $current->matiere_name;
                $dataC['start_time'] = $current->start_time;
                $dataC['end_time'] = $current->end_time;
                $dataC['room_number'] = $current->room_number;

                $gh[] = $dataC;
            }
        }
        $data['total'] = $gh;

        // dd($gh);

        $data['header_title'] = "My Timetable";
        return view('teacher.my_timetable', $data);
    }
}
