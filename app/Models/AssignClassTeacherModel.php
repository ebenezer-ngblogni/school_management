<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClassTeacherModel extends Model
{
    use HasFactory;


    protected $table = 'assign_class_teacher';

    static public function getAlreadyFirst($filiere_id, $teacher_id)
    {
        return self::where('filiere_id', '=', $filiere_id)->where('teacher_id', '=', $teacher_id)->first();
    }

    static public function getRecord()
    {
        $return = self::select('assign_class_teacher.*', 'filiere.name as filiere_name', 'teacher.name as teacher_name')
                    ->join('users as teacher', 'teacher.id', '=', 'assign_class_teacher.teacher_id')
                    ->join('filiere', 'filiere.id', '=', 'assign_class_teacher.filiere_id');
        $return = $return->orderBy('assign_class_teacher.id', 'desc')
                    ->paginate(100);
        return $return;
    }

    static public function getSingle($id){
        return self::find($id);
   }

}
