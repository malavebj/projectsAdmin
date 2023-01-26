@extends('layouts.nav')

@section('content')

<div class="wraper container-fluid">
    <div class="page-title row"> 
        <h3 class="title col-md-6">All Tasks</h3> 
        <a href="{{route('tasks.create')}}" type="button" class="btn btn-primary col-md-2 pull-right"><strong>New Task</strong></a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title push-righ">Tasks for Projects</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Project</th>
                                            <th>Assigned at</th>
                                            <th>Deadline</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                                
                                    <tbody>
                                        @forelse ($tasks as $task)
                                            <tr>
                                                <td>{{$task->id}}</td>
                                                <td>{{$task->title}}</td>
                                                <td>{{$task->project->name}}</td>
                                                <td>{{$task->assigned->name}}</td>
                                                <td>{{$task->deadline->format('m/d/y')}}</td>
                                                <td>
                                                    <a  href="{{route('tasks.show',$task)}}" 
                                                        class="btn btn-xs btn-success">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a  href="{{route('tasks.edit',$task)}}" 
                                                        class="btn btn-xs btn-info">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display: inline;">
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
                                            <li class="bg-danger text-white p-1"><h2><strong>No Tasks registered yet</strong></h2></li>
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

    
@endsection
