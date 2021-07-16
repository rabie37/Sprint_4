<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    
  public function showAllData(){
        return view('fetchedData')->with('TodoArr',todo::all());
    }


    public function delete($id){
        todo::destroy(array('id',$id));
        return redirect('/');
    }

    public function create(){
        return view('createView');
    }

    public function todo_submit(Request $req){
        

        $todo = new todo;
        $todo->name = $req->input('name');
        $todo->save();
        return redirect('/');
    }

    public function edit($id){
          
         return view('edit_todo')->with('TodoArr_name',todo::find($id));
    }

    public function edit_submit(Request $req, $id){

       
         $todo = todo::find($id);
         $todo->name = $req->input('name');
         $todo->save();
         return redirect('/');
    }

}
