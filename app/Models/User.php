<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getSingle($id){
         return self::find($id);
    }

    static public function getAdmin(){
        $return = self::select('users.*')
                        ->where('user_type', '=', 1);
                        if(!empty(Request::get('name'))){
                            $return = $return->where('name','like', '%'.Request::get('name').'%');
                        }
                        if(!empty(Request::get('email'))){
                            $return = $return->where('email','like', '%'.Request::get('email').'%');
                        }
                        if(!empty(Request::get('date'))){
                            $return = $return->whereDate('created_at','=', Request::get('date'));
                        }
        $return = $return->orderBy('id', 'desc')
                         ->paginate(2);
        return $return;
    }

    static public function getStudent(){
        $return = self::select('users.*', 'filiere.name as filiere_name')
                    ->join('filiere', 'filiere.id', '=', 'users.filiere_id')
                    ->where('user_type', '=', 3);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name','like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email'))){
                        $return = $return->where('email','like', '%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('matricule'))){
                        $return = $return->where('matricule','like', '%'.Request::get('matricule').'%');
                    }
        $return = $return->orderBy('users.id', 'desc')
                         ->paginate(3);
        return $return;
    }

    static public function getTeacherStudent($teacher_id)
    {
        $return = self::select('users.*', 'filiere.name as filiere_name')
            ->join('filiere', 'filiere.id', '=', 'users.filiere_id')
            ->join('filiere_matiere', 'filiere_matiere.filiere_id', '=', 'filiere.id')
            ->where('filiere_matiere.teacher_id', '=', $teacher_id)
            ->where('users.user_type', '=', 3)
            ->distinct();
        $return = $return->orderBy('users.id', 'desc')
                        ->paginate(20);
            return $return;
    }

    static public function getTeacher(){
        $return = self::select('users.*')
                        ->where('user_type', '=', 2);
        $return = $return->orderBy('users.id', 'desc')
                         ->paginate(3);
        return $return;
    }

    static public function getTeacherClass(){
        $return = self::select('users.*')
                        ->where('user_type', '=', 2);
        $return = $return->orderBy('users.id', 'desc')
                         ->get();
        return $return;
    }

    static public function getEmailSingle($email){
        return User::where('email', '=', $email)->first();
    }

    static public function getTokenSingle($remember_token){
        return User::where('remember_token', '=', $remember_token)->first();
    }
}
