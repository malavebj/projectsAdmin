@extends('layouts.nav')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Updating Task ID={{$task->id}}</h3></div>
            <div class="panel-body">
                @include('partials.err-message')
                <form method="POST" action="{{ route('tasks.update', $task) }}" class="form-horizontal" role="form">
                    @csrf{{ method_field('PUT') }}                                   
                    <div class="form-group">
                        <label class="col-md-2 control-label">Task Title</label>
                        <div class="col-md-10">
                            <input 
                                name="title"
                                type="text" 
                                class="form-control" 
                                placeholder="task Name"
                                value="{{old('title', $task->title)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Task Description</label>
                        <div class="col-md-10">
                            <textarea 
                                class="form-control" 
                                rows="5"
                                name="description"
                                placeholder="task Description">
                                {{old('description', $task->description)}}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Project</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="project_id" >
                                <option value="">Select an Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{$project->id}}" {{ old('project_id',$project->id) == $task->project_id ? 'selected' : ''}} >{{$project->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Assigned to</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="user_id" >
                                <option value="">Select an User</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}" {{ old('user_id',$user->id) == $task->user_id ? 'selected' : ''}} >{{$user->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Deadline</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="mm/dd/yyyy" 
                                    id="datepicker"
                                    name="deadline"
                                    value="{{old('deadline',$task->deadline->format('m/d/y'))}}">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div><!-- input-group -->        
                        </div>
                    </div>

                    <div class="form-group pull-right">
                          <button class="btn btn-lg  btn-info">Update Task</button>
                    </div>
                </form>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->
</div> <!-- End row -->

@endsection