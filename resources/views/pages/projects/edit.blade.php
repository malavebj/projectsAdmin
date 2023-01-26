@extends('layouts.nav')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Updating Project ID={{$project->id}}</h3></div>
            <div class="panel-body">
                @include('partials.err-message')
                <form method="POST" action="{{ route('projects.update', $project) }}" class="form-horizontal" role="form">
                    @csrf{{ method_field('PUT') }}                                   
                    <div class="form-group">
                        <label class="col-md-2 control-label">Project Name</label>
                        <div class="col-md-10">
                            <input 
                                name="name"
                                type="text" 
                                class="form-control" 
                                placeholder="Project Name"
                                value="{{old('name', $project->name)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="objective">Project Main Objective</label>
                        <div class="col-md-10">
                            <input 
                                type="text" 
                                id="objective" 
                                name="mainObjective" 
                                class="form-control" 
                                placeholder="Main Objective"
                                value="{{old('mainObjective', $project->mainObjective)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Project Description</label>
                        <div class="col-md-10">
                            <textarea 
                                class="form-control" 
                                rows="5"
                                name="description"
                                placeholder="Project Description">
                                {{old('description', $project->description)}}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Project Owner</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="user_id" >
                                <option value="">Select an User</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}" {{ old('user_id',$user->id) == $project->owner->id ? 'selected' : ''}} >{{$user->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group pull-right">
                          <button class="btn btn-lg  btn-info">Update Project</button>
                    </div>
                </form>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->
</div> <!-- End row -->

@endsection
