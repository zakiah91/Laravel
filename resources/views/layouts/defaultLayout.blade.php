<!DOCTYPE html>
<html lang="en">
	<head>
		@include('includes.head')
	</head>
	
	<body>
	
	
		<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
			<div class="container-fluid">
				<a class="navbar-brand">My Journal</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarContent">
					@include('includes.navbar')
				</div>
			</div>
		</nav>
		
		@yield('content')
		
		<div class="modal" tabindex="-1" id="postStatus" aria-labelledby="postStatusLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Status</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" id="modalMsg">
						<p id="modalText" style="display:block">Data is successfully inserted.</p>
						<textarea id="myEditedContent" style="display:none;" class="form-control" rows="12" onKeyDown="checkTextEntered(event,'myEditedContent')"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="modalDone()">Done</button>
					</div>
				</div>
			</div>
		</div>
	
		<br/><br/>
		<div class="container">
			<footer class="text-center">
				@include('includes.footer')
			<footer>
		</div>
		
	</body>

</html>
