@extends('layouts.nav')

@section('content')

    @include('partials.err-message')
    <div class="wraper container-fluid">
        <div class="page-title row"> 
            <h1 class="title col-md-6">Users</h1> 
            <button 
                data-target="#createUserModal" 
                data-toggle="modal" 
                class="btn btn-primary col-md-2 pull-right">
                <strong>New User</strong>
            </button>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Own Projects</th>
                                                <th>Assigned Tasks</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                                    
                                        <tbody>
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{count($user->projects)}}</td>
                                                    <td>{{count($user->tasks)}}</td>
                                                    <td>
                                                        @can('view',$user)
                                                            <a  href="{{ route('users.show', $user) }}" 
                                                                class="btn btn-xs btn-success">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        @endcan
                                                        @can('update', $user)                                                            
                                                            <a  href="{{ route('users.edit', $user) }}" 
                                                                class="btn btn-xs btn-info">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                        @endcan
                                                        @can('delete', $user)
                                                            <form method="POST" action="{{ route('users.destroy', $user) }}" style="display: inline;">
                                                            @csrf{{ method_field('DELETE') }}
                                                                <button 
                                                                    class="btn btn-xs btn-danger" 
                                                                    onclick="return confirm('Are you sure ??')">
                                                                    <i class="fa fa-times"></i>       
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                    
                                                </tr>
                                            @empty
                                                <li class="bg-danger text-white p-1"><h2><strong>No Users in Database</strong></h2></li>
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
