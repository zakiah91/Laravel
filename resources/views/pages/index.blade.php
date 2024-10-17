<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link href="css/bootstrap.min.css"
				rel="stylesheet">
		
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" 
		        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
				crossorigin="anonymous"></script>
				
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  		        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
				crossorigin="anonymous"></script>
				
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
		        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
				crossorigin="anonymous"></script>
		
		<script  src="js/myJournal.js"></script>
				
	</head>
	
	<body>
	
	
		<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
			<div class="container-fluid">
				<a class="navbar-brand">My Journal</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarContent">
				   <div class="navbar-nav">
					   <a id="menu1" class="nav-link active" onclick="viewForm()" href="#"><b>Write</b></a>
					   <a id="menu2" class="nav-link" onclick="getContent()" href="#"><b>History</b></a>
				   </div>
				</div>
			</div>
		</nav>
		
		<div class="container" id="write" style="display:block;">
			<br/><br/>
			<div class="col-md-2">
				<label class="form-label"><b>Date :</b></label>
				<input type="date" class="form-control" id="formDate"/>
			</div>
			<br/><br/>
			<div class="col-md-12">
				<label class="form-label"><b>Content :</b></label>
				<textarea class="form-control" rows="12"></textarea>
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
		
		<br/><br/>
		<div class="container">
			<footer class="text-center">
				<p>Author: Zakiah Zulkefli (Oct 2024)</p>
			<footer>
		</div>
		
	</body>

</html>
