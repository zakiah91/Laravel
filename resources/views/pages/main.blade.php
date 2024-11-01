@extends('layouts.defaultLayout')


@section('content')


	<div class="container" id="write" style="display:block;">
		<br/><br/>
		@csrf
		<div class="col-md-2">
			<label class="form-label"><b>Date :</b></label>
			<input type="date" class="form-control" id="formDate"/>
		</div>
		<br/><br/>
		<div class="col-md-12">
			<label class="form-label"><b>Content :</b></label>
			<textarea id="myText" class="form-control" rows="12" onKeyDown="checkTextEntered(event,'myText')"></textarea>
		</div>
		<br></br>
		<button onClick="submitForm('myText')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postStatus">Submit</button>
	</div>
	
			
@stop