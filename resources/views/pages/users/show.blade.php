@extends('layouts.nav')

@section('content')

<div class="row">
	<div class="col-md-4">
        <div class="panel panel-color panel-info">
            <div class="panel-heading"> 
                <h3 class="panel-title">General</h3> 
            </div> 
            <div class="panel-body"> 
                <div class="list-group">
                    <div class="profile-desk">
                        <h1>{{$user->name}}</h1>
                        <table class="table table-condensed m-t-20">
                            <thead>
                                <tr>
                                    <th colspan="2"><span class="h4">Information</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td><b>Projects</b></td>
                                    <td class="ng-binding">{{$user->projects->count()}}</td>
                                </tr>
                                <tr>
                                    <td><b>Tasks Assigned</b></td>
                                    <td>{{$user->tasks->count()}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end profile-desk -->
                </div> <!-- list-group -->
            </div> 
	        <a href="{{route('users.edit',$user)}}" class="btn btn-primary btn-block"><b>Edit User</b></a>
        </div>
	</div>
	
    <div class="col-md-4">
		<div class="panel panel-color panel-primary">
            <div class="panel-heading"> 
                <h3 class="panel-title">Own Projects</h3> 
            </div> 
            <div class="panel-body"> 
                <div class="list-group"> 
                    @forelse($user->projects as $project)
                        <a href="{{route('projects.show', $project)}}" class="list-group-item"> 
                            <h4 class="list-group-item-heading">{{$project->name}}</h4> 
                            <small class="text-muted">Created at:  {{$project->created_at->format('m/d/Y')}}</small>
                            <p class="list-group-item-text">{{$project->description}}</p> 
                        </a> 
                        @unless($loop->last)
                            <hr>
                        @endunless
                    @empty
                        <small class="text-muted">
                            Don't have created projects 
                        </small>
                    @endforelse
                </div> <!-- list-group -->
            </div> 
        </div>
	</div>

    <div class="col-lg-4">
        <div class="panel panel-color panel-success">
            <div class="panel-heading"> 
                <h3 class="panel-title">Tasks Assigned</h3> 
            </div> 
            <div class="panel-body"> 
                <div class="list-group"> 
                    @forelse($user->tasks as $task)
                        <a href="{{route('tasks.show', $task)}}" class="list-group-item"> 
                            <h4 class="list-group-item-heading">{{$task->title}}</h4> 
                            <small class="text-muted">Created at:  {{$task->created_at->format('m/d/Y')}}</small>
                            <p><small class="text-muted">Project ID:  {{$task->project->id}}</small></p>
                            <p class="list-group-item-text">{{$task->description}}</p> 
                        </a> 
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
