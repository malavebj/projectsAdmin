@extends('layouts.nav')

@section('content')

<div class="row">
    <div class="col">
		<div class="panel panel-color panel-primary">
            <div class="panel-heading"> 
                <h1 class="panel-title">{{$task->title}}</h1> 
            </div> 
            <div class="panel-body"> 
                <div class="list-group"> 
                    <h4 class="list-group-item-heading">Task Description</h4> 
                    <p class="list-group-item-text">{{$task->description}}</p><br>
                    <p class="text-muted">Created at:  {{$task->created_at->format('m/d/Y')}}</p>
                    <p class="text-muted">Last Update:  {{$task->updated_at->format('m/d/Y')}}</p>
                    <p class="text-muted">Deadline:  {{$task->deadline->format('m/d/Y')}}</p>
                    <p class="text-muted">Assigned to:  {{$task->assigned->name}}</p>
                </div> <!-- list-group -->
                <div class="panel-body">
                    <a href="{{route('tasks.edit',$task)}}" class="btn btn-primary btn-lg pull-right"><b>Edit Task</b></a>
                </div>
            </div> 
        </div>
	</div>
</div>

@endsection
