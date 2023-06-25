<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class FiliereMatiereModel extends Model
{
    use HasFactory;

    protected $table = 'filiere_matiere';


    static public function getRecord()
    {
        return self::select('filiere_matiere.*', 'filiere.name as filiere_name', 'matiere.name as matiere_name', 'users.name as teacher_name')
                    ->join('matiere', 'matiere.id', '=', 'filiere_matiere.matiere_id')
                    ->join('filiere', 'filiere.id', '=', 'filiere_matiere.filiere_id')
                    ->join('users', 'users.id', '=', 'filiere_matiere.teacher_id')
                    ->orderBy('filiere_matiere.id', 'desc')
                    ->distinct()
                    ->paginate(100);
    }

    static public function getAlreadyFirst( $matiere_id)
    {
        return self::where('matiere_id', '=', $matiere_id)->first();
    }

    static public function  mySubject($class_id)
    {
        return self::select('filiere_matiere.*', 'matiere.name as matiere_name', 'matiere.credit as credit', 'matiere.id as matiere_id')
                    ->join('matiere', 'matiere.id', '=', 'filiere_matiere.matiere_id')
                    ->join('filiere', 'filiere.id', '=', 'filiere_matiere.filiere_id')
                    ->where('filiere_matiere.filiere_id', '=', $class_id)
                    ->orderBy('filiere_matiere.id', 'desc')
                    ->get();
    }
///////////////////////////////*/****** */
    static public function  teacherAccury($teacher_id)
    {
        return self::select('filiere_matiere.*', 'matiere.name as matiere_name', 'filiere.name as filiere_name')
                    ->join('matiere', 'matiere.id', '=', 'filiere_matiere.matiere_id')
                    ->join('filiere', 'filiere.id', '=', 'filiere_matiere.filiere_id')
                    ->where('filiere_matiere.teacher_id', '=', $teacher_id)
                    ->orderBy('filiere_matiere.id', 'desc')
                    ->get();
    }


////////////////////////*****////////// */



    static public function getSingle($id)
    {
        return self::find($id);
    }

}
