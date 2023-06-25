<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;


class MatiereModel extends Model
{
    use HasFactory;

    protected $table = 'matiere';


    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = self::select('matiere.*');
                    if(!empty(Request::get('name'))){
                        $return = $return->where('matiere.name', 'like', '%'. Request::get('name') . '%');
                    }

                    if(!empty(Request::get('credit'))){
                        $return = $return->where('matiere.credit', '=', Request::get('credit'));;
                    }


                    $return = $return->orderBy('matiere.id', 'desc')
                    ->paginate(4);
        return $return;
    }

    static public function getSubject()
    {
        $return = self::select('matiere.*')
                    ->orderBy('matiere.name', 'asc')
                    ->get();
        return $return;
    }

}
