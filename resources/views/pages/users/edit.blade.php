@extends('layouts.nav')

@section('content')

<div class="row">
    <!-- Horizontal form -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Basic Information</h3></div>
            <div class="panel-body">
                @include('partials.err-message')
                <form method="POST" action="{{ route('users.update', $user) }}" class="form-horizontal" role="form">
                    @csrf{{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                          <input 
                            name="name"
                            type="text" 
                            class="form-control" 
                            id="inputName" 
                            value="{{old('name', $user->name)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                          <input 
                            type="email" 
                            name="email"
                            class="form-control" 
                            id="inputEmail" 
                            placeholder="Email"
                            value="{{old('email', $user->email)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-3 control-label">New Password</label>
                        <div class="col-sm-9">
                          <input 
                            type="password" 
                            class="form-control" 
                            id="inputPassword" 
                            name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Re Password</label>
                        <div class="col-sm-9">
                          <input 
                            type="password" 
                            class="form-control" 
                            id="inputPassword4" 
                            placeholder="Retype Password"
                            name="password_confirmation">
                        </div>
                    </div>
                    
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button class="btn btn-info">Update User</button>
                        </div>
                    </div>
                </form>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Roles</h3></div>
            <div class="panel-body">
                <form method="POST" action="{{route('users.roles.update',$user)}}">
                    @csrf{{ method_field('PUT') }}
                    @foreach($roles as $id => $name)
                        <div class="checkbox">
                            <label for="">
                                <input 
                                    type="checkbox" 
                                    value="{{$name}}" 
                                    name="roles[]"
                                    {{$user->roles->contains($id) ? 'checked' : ''}}>
                                {{$name}}
                            </label>
                        </div>
                    @endforeach  
                    <div class="form-group m-b-0">
                        <button class="btn btn-info btn-block">Update Roles</button>
                    </div>              
                </form>
            </div> <!-- panel-body -->
        </div> <!-- panel -->

        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Permissions</h3></div>
            <div class="panel-body">
                <form method="POST" action="{{route('users.permissions.update',$user)}}">
                    @csrf{{ method_field('PUT') }}
                    @foreach($permissions as $id => $name)
                        <div class="checkbox">
                            <label for="">
                                <input 
                                    type="checkbox" 
                                    value="{{$name}}" 
                                    name="permissions[]"
                                    {{$user->permissions->contains($id) ? 'checked' : ''}}>
                                {{$name}}
                            </label>
                        </div>
                    @endforeach  
                    <div class="form-group m-b-0">
                        <button class="btn btn-info btn-block">Update Permissions</button>
                    </div>              
                </form>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->
</div> <!-- End row -->

@endsection
