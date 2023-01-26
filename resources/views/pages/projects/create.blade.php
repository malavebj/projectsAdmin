 <!-- Modal -->
 <div id="createProjectModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Create New Project</h4> 
            </div> 
			<form method="POST" action="{{ route('projects.store') }}" class="form-horizontal" role="form">
                @csrf                                   
                <div class="form-group">
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-10">
                        <input 
                            name="name"
                            type="text" 
                            class="form-control" 
                            placeholder="Project Name"
                            value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="objective">Main Objective</label>
                    <div class="col-md-10">
                        <input 
                            type="text" 
                            id="objective" 
                            name="mainObjective" 
                            class="form-control" 
                            placeholder="Main Objective"
                            value="{{old('mainObjective')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Description</label>
                    <div class="col-md-10">
                        <textarea 
                            class="form-control" 
                            rows="5"
                            name="description"
                            placeholder="Project Description">
                            {{old('description')}}
                        </textarea>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <i> Project Owner will be defined in Edition Form</i>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button> 
                    <button class="btn btn-info">Create Project</button> 
                </div>
            </form>
        </div> 
    </div>
</div>
<!-- /.modal -->