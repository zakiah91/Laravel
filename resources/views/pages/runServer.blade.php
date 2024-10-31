@extends('layouts.defaultLayout')

@section('content')
<div class="container" >
	<form method="get" action="/setServer">
		
		<select name="server" class="form-select mt-3" >
			<option selected>Select the server that you want to run :</option>
			<option value="php">PHP</option>
			<option value="java">Java Springboot</option>
		</select>
		
		<div class="row mt-3">
			<input type="submit" class="btn btn-success" value="Submit"></button>
			<br/>
		</div>	
	</form>
</div>


@stop