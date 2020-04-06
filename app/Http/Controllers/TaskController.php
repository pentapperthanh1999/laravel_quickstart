<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Task;
class TaskController extends Controller
{
    public function store (Request $request)
    {
        /*Request Name*/
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        /*Add Task*/
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }
}
