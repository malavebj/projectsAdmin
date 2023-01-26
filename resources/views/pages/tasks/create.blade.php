@extends('layouts.nav')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Create New Task</h3></div>
            <div class="panel-body">
                @include('partials.err-message')
                <form method="POST" action="{{ route('tasks.store') }}" class="form-horizontal" role="form">
                    @csrf                                   
                    <div class="form-group">
                        <label class="col-md-2 control-label">Task Title</label>
                        <div class="col-md-10">
                            <input 
                                name="title"
                                type="text" 
                                class="form-control" 
                                placeholder="task Title"
                                value="{{old('title')}}">
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
                                {{old('description')}}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Project</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="project_id" >
                                <option value="">Select an Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}} </option>
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
                                    <option value="{{$user->id}}">{{$user->name}} </option>
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
                                    value="{{old('deadline')}}">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div><!-- input-group -->        
                        </div>
                    </div>

                    <div class="form-group pull-right">
                          <button class="btn btn-lg  btn-info">Create Task</button>
                    </div>
                </form>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->
</div> <!-- End row -->

@endsection