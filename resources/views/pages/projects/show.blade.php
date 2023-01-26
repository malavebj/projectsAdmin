@extends('layouts.nav')

@section('content')

<div class="row">
    <div class="col-md-6">
		<div class="panel panel-color panel-primary">
            <div class="panel-heading"> 
                <h1 class="panel-title">{{$project->name}}</h1> 
            </div> 
            <div class="panel-body"> 
                <div class="list-group"> 
                    <h4 class="list-group-item-heading">Main Objetive</h4> 
                    <p class="list-group-item-text">{{$project->mainObjective}}</p><hr> 
                    <h4 class="list-group-item-heading">Project Description</h4> 
                    <p class="list-group-item-text">{{$project->description}}</p><br>
                    <small class="text-muted">Created at:  {{$project->created_at->format('m/d/Y')}}</small>
                    <p><small class="text-muted">Owner:  {{$project->owner->name}}</small></p>
                    <small class="text-muted">Number of Tasks:  {{$project->tasks->count()}}</small>
                </div> <!-- list-group -->
                <div class="panel-body">
                    <a href="{{route('projects.edit',$project)}}" class="btn btn-primary btn-block"><b>Edit Project</b></a>
                </div>
            </div> 
        </div>
	</div>

    <div class="col-lg-6">
        <div class="panel panel-color panel-success">
            <div class="panel-heading"> 
                <h1 class="panel-title">Project's Tasks</h1> 
            </div> 
            <div class="panel-body"> 
                <div class="list-group"> 
                    @forelse($project->tasks as $task)
                        <h4 class="list-group-item-heading">{{$task->title}}</h4> 
                        <p class="list-group-item-text">{{$task->description}}</p><br>
                        <small class="text-muted">Created at:  {{$task->created_at->format('m/d/Y')}}</small>
                        <p><small class="text-muted">Deadline:  {{$task->deadline->format('m/d/Y')}}</small></p>
                        <small class="text-muted">Assigned to:  {{$task->assigned->name}}</small>
                        <div class="panel-body">
                            <a href="{{route('tasks.edit',$task)}}" class="btn btn-success btn-lg pull-right"><b>Edit Task</b></a>
                        </div>
                        @unless($loop->last)
                            <hr>
                        @endunless
                    @empty
                        <small class="text-muted">
                            Don't have Tasks assigned
                        </small>
                    @endforelse
                </div> <!-- list-group -->
            </div> 
        </div>
    </div>
</div>

@endsection
