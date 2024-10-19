@extends('layouts.defaultLayout')


@section('content')

	<script type="text/javascript">
		$(document).ready(()=>{getContent();});
	</script>
	
	<div class="container" id="history" style="display:block;">
		<br></br>
		<div id="warning_msg"></div>
		<div id="table_content">
		</div>
	</div>
	

		
@stop