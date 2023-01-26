 <!-- Modal -->
 <div id="createUserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Create New User</h4> 
            </div> 
			<form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="modal-body"> 
                    <div class="row"> 
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input 
                                name="name" 
                                value="{{old('name')}}" 
                                class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="form-group"> 
                            <label for="email" class="control-label">Email</label> 
                            <input 
                                name="email"
                                type="email" 
                                class="form-control" 
                                id="field-2" 
                                placeholder="example@email.com"
                                required> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input 
                                name="password" 
                                type="password"
                                value="{{old('password')}}" 
                                placeholder="Type Password"
                                class="form-control"
                                required>
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="form-group">
                            <label for="password_confirmation" >Repeat Password</label>
                            <input 
                                type="password" 
                                value="{{old('password_confirmation')}}" 
                                class="form-control" 
                                id="password_confirmation" 
                                placeholder="Retype Password"
                                name="password_confirmation"
                                required>
                        </div>
                    </div> 
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button> 
                        <button class="btn btn-info">Create User</button> 
                    </div>
                </div>
            </form> 
        </div> 
    </div>
</div>
<!-- /.modal -->