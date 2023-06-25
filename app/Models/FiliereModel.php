<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class FiliereModel extends Model
{
    use HasFactory;

    protected $table = 'filiere';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = self::select('filiere.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'filiere.created_by');
                    if(!empty(Request::get('name'))){
                        $return = $return->where('filiere.name', 'like', '%'. Request::get('name') . '%');
                    }

                    if(!empty(Request::get('date'))){
                        $return = $return->whereDate('filiere.created_at', '=', Request::get('date'));;
                    }


                    $return = $return->orderBy('filiere.id', 'desc')
                    ->paginate(2);
        return $return;
    }

    static public function getClass(){
        $return = self::select('filiere.*')
                    ->join('users', 'users.id', 'filiere.created_by')
                    ->orderBy('filiere.name', 'asc')
                    ->get();
        return $return;
    }
}
