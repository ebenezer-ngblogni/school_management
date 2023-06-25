<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\FiliereModel;

class FiliereController extends Controller
{
    public function list(){
        $data['getRecord'] = FiliereModel::getRecord();

        $data['header_title'] = "Listes des Filières";
        return view('admin.filiere.list', $data);
    }

    public function add(){
        $data['header_title'] = "Adding";
        return view('admin.filiere.add', $data);
    }

    public function insert(Request $request){
       $save = new FiliereModel;
       $save->name = $request->name;
       $save->created_by = Auth::user()->id;
       $save->save();

       return redirect('admin/filiere/list')->with('success', "Filiere créée avec succès");
    }

    public function edit($id){
        $data['getRecord'] = FiliereModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Editing class";
            return view('admin.filiere.edit', $data);
        }else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        $save = FiliereModel::getSingle($id);
        $save->name = $request->name;
        $save->save();

        return redirect('admin/filiere/list')->with('success', "Filiere modifiée avec succès");
    }

    public function delete($id){

        $current = FiliereModel::getSingle($id);
        // Check if the user exists
        if ($current) {
            // Delete the current
            $current->delete();

            // Optionally, you can redirect or return a response
            return redirect('admin/filiere/list')->with('success', 'courses deleted successfully.');
        }

        return redirect('admin/filiere/list')->with('error', 'courses not found.');
    }
}
