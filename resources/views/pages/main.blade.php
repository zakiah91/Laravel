@extends('layouts.defaultLayout')

@section('content')
	<div class="container" id="write" style="display:block;">
		<br/><br/>
		<div class="col-md-2">
			<label class="form-label"><b>Date :</b></label>
			<input type="date" class="form-control" id="formDate"/>
		</div>
		<br/><br/>
		<div class="col-md-12">
			<label class="form-label"><b>Content :</b></label>
			<textarea class="form-control" rows="12" onKeyDown="checkTextEntered(event)"></textarea>
		</div>
		<br></br>
		<button onClick="submitForm()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postStatus">Submit</button>
	</div>
	
	<div class="container" id="history" style="display:none;">
		<br></br>
		<div id="warning_msg"></div>
		<div id="table_content">
		</div>
	</div>
	
	<div class="modal" tabindex="-1" id="postStatus" aria-labelledby="postStatusLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Status</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body" id="modalMsg">
					<p>Data is successfully inserted.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Done</button>
				</div>
			</div>
		</div>
	</div>
		
@stop
