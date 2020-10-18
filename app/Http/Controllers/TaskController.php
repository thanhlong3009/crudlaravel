<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Task;
use http\Client\Curl\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;


// nen tao duong dan nao thi viet ham cua duong dan do luon
class TaskController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        $tasks = Auth::user()->tasks;//$tasks = $user->tasks;
        $tags = Tag::all();
        return view('crud.commondbody.index')->with(['tasks' => $tasks, 'tags' => $tags]);
    }



    public function create(Request $request) {
        // gui len la request tra ve la response
        // post da so se di vs form
        $task = new Task(); // tao ra mot instance cua Task ( mot mau cua Task )
        $task->name = $request->name; // lay du lieu name cua nguoi dung nhap len de chuan bi luu vao database
        // name dau la cua truong database name sau la cua nguoi dung nhap len dinh nghia trong form
        $task->description = $request->description;
        $task->user_id = Auth::user()->id;
        $request->validate([
            'description'=>'required|min:6',
            'name'=>'required|min:5',
            'tags'=>'required'

        ]);

        $task->save();

        $task->tags()->sync($request->get('tags'));
        return redirect('/task');
    }

    public function show($id)
    {

        $task=  Auth::user()->tasks->find($id);


        return view('crud.commondbody.show')->with('task', $task);
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();
    return redirect('/task');
    }

    public function viewUpdate(Task $task)
    {
        $task=Auth::user()->tasks->find($task->id);
        return view('crud.commondbody.update')->with('task', $task);
    }


    public function update(Task $task, Request $request)
    {
        $input = $request->all();
        $task->update($input);
        return redirect('/task');
    }
}
