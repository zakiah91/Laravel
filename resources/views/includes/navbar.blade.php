@if(Session::has("isAllowAccess"))
	<div class="navbar-nav">
	   <a id="menu1" class="nav-link active" onclick="viewForm('main')" href="#"><b>Write</b></a>
	   <a id="menu2" class="nav-link" onclick="getContent()" href="#"><b>History</b></a>
	   <a id="menuLogout" class="nav-link" onClick="logout()" href="#"><b>Logout</b></a>
	</div>
@endif