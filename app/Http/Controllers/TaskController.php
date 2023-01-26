<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index() {
        $tasks=Task::allowed()->get();
        return view('pages.tasks.index',compact('tasks'));
    }

    public function show(Task $task)
    {
        return view('pages.tasks.show',compact('task'));
    }

    public function create()
    {
        $users=User::all();
        $projects=Project::all();
        return view('pages.tasks.create',compact('users','projects'));
    }

    public function edit(Task $task)
    {   
        $this->authorize('update',$task);
        $users=User::all();
        $projects=Project::all();
        return view('pages.tasks.edit',compact('task','users','projects'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {    
        $this->authorize('update',$task);
        $task->update($request->all());
        return redirect()->route('tasks.show', $task)->with('flash','Your task has been updated');
    }
    
    public function store(CreateTaskRequest $request)
    {   
        $this->authorize('create',new Task());
        $task=Task::create($request->validated());
        return redirect()->route('tasks.show', compact('task'))->with('flash','Task Created');
    }

    function destroy(Task $task) 
    {
        $this->authorize('delete',$task);
        $task->delete();
        return redirect()->route('tasks.index')->with('flash','Your task has been Deleted');
    }
}
