@extends('layouts.defaultLayout')

@section('content')

	<script type="text/javascript">
		$(document).ready(()=>{setServerSelection('{{  $serverSession  }}')});
	</script>

	<div class="container" style="display:block;" id="login">
			@csrf
			<div class="mt-5 row">
				<label class="text-center"><b>Password : </b></label>
				<input type="password" class="mt-3 form-control" id="pwd"/>
			</div>
			
			<div class="mt-5 row">
				<button type="button" class="btn btn-primary" onClick="tryLogin()">Submit</button>
			</div>

		<div class="mt-5 row">
			<a href="#" onClick="viewForm('login')">
				<p class="text-center">Reset Password</p>
			</a>
		</div>
	</div>
	
	<div class="container" style="display:none;" id="resetPwd">
			<div class="mt-5 row">
				<label class="text-center"><b>Your New Password : </b></label>
				<input type="password" class="form-control" id="newPwd"/>	
			</div>
			
			<div class="mt-5 row">
				<button type="button" class="btn btn-primary" onCLick="reloadPage()">Confirm Your New Password</button>
			</div>
	</div>

	
@stop