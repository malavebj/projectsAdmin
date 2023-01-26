@extends('layouts.nav')

@section('content')

    @include('partials.err-message')
    <div class="wraper container-fluid">
        <div class="page-title row"> 
            <h3 class="title col-md-6">Your Projects</h3> 
            <button 
                class="btn btn-primary col-md-2 pull-right" 
                data-toggle="modal" 
                data-target="#createProjectModal"><strong>New Project</strong></button>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title push-righ">Projects</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Owner</th>
                                                <th>Start Date</th>
                                                <th>Tasks</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                                    
                                        <tbody>
                                            @forelse ($projects as $project)
                                                <tr>
                                                    <td>{{$project->id}}</td>
                                                    <td>{{$project->name}}</td>
                                                    <td>{{$project->owner->name}}</td>
                                                    <td>{{$project->created_at->format('m/d/Y')}}</td>
                                                    <td>{{count($project->tasks)}}</td>
                                                    <td>
                                                        <a  href="{{ route('projects.show',$project)}}" 
                                                            class="btn btn-xs btn-success">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a  href="{{ route('projects.edit',$project)}}" 
                                                            class="btn btn-xs btn-info">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form method="POST" action="{{ route('projects.destroy', $project) }}" style="display: inline;">
                                                        @csrf{{ method_field('DELETE') }}
                                                        <button 
                                                            class="btn btn-xs btn-danger" 
                                                            onclick="return confirm('Are you sure ??')">
                                                            <i class="fa fa-times"></i>       
                                                        </button>
                                                        </form>
                                                    </td>
                                                    
                                                </tr>
                                            @empty
                                                <li class="bg-danger text-white p-1"><h2><strong>No Projects</strong></h2></li>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Row -->
    </div>
    
@endsection
