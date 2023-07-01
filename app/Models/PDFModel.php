<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDFModel extends Model
{
    use HasFactory;

    protected $table = 'files';
    
    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getTeacherFile($teacher_id)
    {
        return self::select('files.*', 'matiere.name as matiere_name')
                    ->join('matiere', 'matiere.id', '=', 'files.matiere_id')
                    ->where('files.teacher_id', '=', $teacher_id)
                    ->orderBy('files.id', 'desc')
                    ->get();

    }

    static public function getFromSubject($matiere_id)
    {
        return self::select('files.*', 'matiere.name as matiere_name')
                    ->join('matiere', 'matiere.id', '=', 'files.matiere_id')
                    ->where('files.matiere_id', '=', $matiere_id)
                    ->orderBy('files.id', 'desc')
                    ->get();

    }

}
