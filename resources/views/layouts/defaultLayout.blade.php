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
		
		<br/><br/>
		<div class="container">
			<footer class="text-center">
				@include('includes.footer')
			<footer>
		</div>
		
	</body>

</html>
