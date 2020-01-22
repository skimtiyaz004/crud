<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Todo;
use DB;
class pageController extends Controller
{
    public function index()
    {
    	// $todos=Todo::all();
    	$todos=Todo::paginate(2);
    	 
    	return view('Pages.index',compact('todos'));
    }

    public function get_createTodo()
    {
    	return view('Pages.todolist');
    }
    public function post_addTodo(Request $req)
    {
        // echo "<pre>";
        // print_r($req->all());

    	 $req->validate([
	        'todo' => 'required|unique:todos|max:255',
	        'date' => 'required',
            'image' => 'required'
	    ]);

    	 $data= new Todo;
    	 $data->todo=$req->todo;
    	 $data->date=$req->date;
         $file = $req->file('image');
          // $data->image =$file->getClientOriginalName();
         $upload_path = 'uploads';
         $file->move($upload_path,$file->getClientOriginalName());
         $data->image = $file->getClientOriginalName();
    	 $data->save();

    	  // return back()->with('success', 'Todo created successfully.');
        return redirect('/');
    	   
    	   
    }
    public function get_editTodo($id)
    {
    	 $data=Todo::where('id',$id)->first();
    	 return view('Pages.edit',compact('data'));
    	 

    }

    public function post_editTodo(Request $req,$id)
    {
	    	$req->validate([
		        'todo' => 'required|max:255',
		        'date' => 'required',
		    ]);
    		$data=Todo::find($id);
    	    $data->todo=$req->todo;
    	    $data->date=$req->date;
    	    $data->save();
    	    return back()->with('success', 'Todo updated successfully.');
    }

    public function get_deleteTodo($id)
    {
    	$data = Todo::find($id);

        unlink('uploads/'.$data->image);
		$data->delete();
		return back()->with('success', 'Todo deleted successfully.');
    }
}
