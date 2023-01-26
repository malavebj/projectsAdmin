@extends('layouts.nav')

@section('content')
    <div class="wraper container-fluid">
        <div class="page-title"> 
            <h3 class="title">Your Projects</h3> 
        </div>

        @forelse ($projects as $project)
            <div class="row"> 
                <div class="col-lg-12"> 
                    <ul class="nav nav-tabs"> 
                        <li class="active"> 
                            <a href="#overview_{{$project->id}}" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                <span class="hidden-xs">Overview</span> 
                            </a> 
                        </li> 
                        <li class=""> 
                            <a href="#description_{{$project->id}}" data-toggle="tab" aria-expanded="true"> 
                                <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                <span class="hidden-xs">Description</span> 
                            </a> 
                        </li> 
                        <li class=""> 
                            <a href="#tasks_{{$project->id}}" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                <span class="hidden-xs">Tasks</span> 
                            </a> 
                        </li> 
                    </ul> 
                    <div class="tab-content"> 
                        <div class="tab-pane active" id="overview_{{$project->id}}"> 
                            <h4><strong>Title:</strong> {{$project->name}}</h4>
                            <div> 
                                <span>
                                    <strong> Main Objective:</strong> 
                                    {{$project->mainObjective}}
                                </span> 
                            </div> 
                            <div> 
                                <span>
                                    <strong> Created at:</strong> 
                                    {{$project->created_at->format('m/d/y')}}
                                </span> 
                            </div> 
                            <div> 
                                <span>
                                    <strong> Owner:</strong> 
                                    {{$project->owner->name}} ({{$project->owner->email}})
                                </span> 
                            </div> 
                            <div> 
                                <span>
                                    <strong> Last Update:</strong> 
                                    {{$project->updated_at->format('m/d/y')}}
                                </span> 
                            </div> 
                        </div> 
                        <div class="tab-pane" id="description_{{$project->id}}"> 
                            <h4><strong>{{$project->name}}</strong></h4>
                            <p>{{$project->description}}</p> 
                        </div> 
                        <div class="tab-pane" id="tasks_{{$project->id}}"> 
                            @forelse ($project->tasks as $task)
                                <li>{{$task->title}}</li>    
                            @empty
                                <li class="bg-danger text-white p-1">No Tasks defined for this project</li>
                            @endforelse
                        </div> 
                    </div> 
                </div> 
            </div> <!-- End row -->        
        @empty
            <div class="row"> 
                <div class="col-lg-12"> 
                    <li class="bg-danger text-white p-1">No Projects defined by you</li>
                </div> 
            </div> <!-- End row -->   
        @endforelse  
    </div> <!-- END Wraper -->
@endsection