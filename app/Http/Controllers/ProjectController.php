<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    function index() {
        $projects=Project::allowed()->get();
        return view('pages.projects.index',compact('projects'));
    }

    public function show(Project $project)
    {
        return view('pages.projects.show',compact('project'));
    }

    public function edit(Project $project)
    {   
        $this->authorize('update',$project);
        $users=User::all();
        return view('pages.projects.edit',compact('project',"users"));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {    
        $this->authorize('update',$project);
        $project->update($request->all());
        return redirect()->route('projects.show', $project)->with('flash','Your project has been updated');
    }

    public function store(CreateProjectRequest $request)
    {
        $this->authorize('create',new Project());
        $project=Project::create($request->validated());
        $users=User::all();
        return redirect()->route('projects.edit', compact('project',"users"))->with('flash','Project Created');
    }

    function destroy(Project $project) 
    {
        $this->authorize('delete',$project);
        $project->delete();
        return redirect()->route('projects.index')->with('flash','Your project has been Deleted');
    }
}
