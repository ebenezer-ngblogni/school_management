<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectTimetableModel extends Model
{
    use HasFactory;

    protected $table = 'class_subject_timetable';

    static public function  getRecordClassSubject($class_id, $subject_id,$week_id)
    {
        return self::where('class_id', '=', $class_id)
                    ->where('subject_id', '=', $subject_id)
                    ->where('week_id', '=', $week_id)
                    ->first();
    }

    ///////////////////////////********* */
    static public function  getRecordAccury($class_id, $subject_id)
    {
        return self::select('class_subject_timetable.*', 'matiere.name as matiere_name', 'filiere.name as filiere_name','week.name as week_name')
                    ->join('matiere', 'matiere.id', '=', 'class_subject_timetable.subject_id')
                    ->join('filiere', 'filiere.id', '=', 'class_subject_timetable.class_id')
                    ->join('week', 'week.id', '=', 'class_subject_timetable.week_id')
                    ->where('subject_id', '=', $subject_id)
                    ->where('class_id', '=', $class_id)
                    ->get();
    }
    //////////////////////////********* */

}
