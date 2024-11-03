	//created by: Zakiah Zulkefli (2024)

	let mainUrl = "http://localhost:8080";

	let laravelUrl = "http://localhost:8000";
	
	let serverSelection = "";
	
	function setServerSelection(value){
		window.serverSelection = value;
		console.log(value);
	}
	
	function getServerSelection(){
		
		if(window.serverSelection === ""){
			return "php";
		}
		
		return window.serverSelection;
	}
	
	function setMainUrl(){
		return ((getServerSelection() == "php") ? laravelUrl : mainUrl);
	}
	

	function getContent(){
		
		let url = setMainUrl() + "/journal";
		
		//container
		$("#history").css("display","block");
		$("#write").css("display","none");
		
		//menu
		$("#menu1").removeClass("active");
		$("#menu2").addClass("active");
		
		$.get(url,function(data){
			console.log(data);
			//console.log(data[0].content);
			//console.log(data.length);
			
			$("#table_content").empty();
			
			let myTable = "<table class=\"table\">";
			
			myTable += "<thead>"+
							"<tr>" +
								"<th class=\"col-md-2\">Action</th>" +
								"<th class=\"col-md-1\">#</th>" +
								"<th class=\"col-md-2\">Date</th>" +
								"<th>Content</th>" +
							"</tr>" +
						"</thead>";
			
			myTable += "<tbody>";
			
			for(let i=0;i<data.length;i++){
				myTable += "<tr id=\""+i+"\">" +
								"<td><button onclick=\"removeCell("+i+")\" class=\"btn btn-warning\">Delete</button>"+
									 "&nbsp;<button onclick=\"editContent("+i+")\" class=\"btn btn-success\">Edit</button>" +
								"</td>"+
								"<td>"+i+"</td>"+
								"<td>"+data[i].date+"</td>" +
								"<td>"+data[i].content+"</td>"+
							"</tr>";
			}
			
			myTable += "</tbody>";
									
			myTable += "</table>";
			
			$("#table_content").append(myTable);
		})
		.fail(function(){
			console.log("FAIL");
			$("#warning_msg").empty();
			$("#warning_msg").append("<h3>Server refuse the connection. Please try again...</h3>");
		});
		
	}
	
	function editContent(idx){
		let tblRow = $("table tr")[idx+1];
		
		console.log(tblRow);
		
		console.log(tblRow.cells[3].innerHTML);
		
		//$("#modalText").css("display","none");
		$("#modalText").text("Date : "+ tblRow.cells[2].innerHTML);
		$("#myEditedContent").css("display","block");
		$("#myEditedContent").val(tblRow.cells[3].innerHTML);
		$("#postStatus").modal("show");
		
		console.log($("#myEditedContent").css("display"));
	}
	
	function modalDone(){
		
		if($("#myEditedContent").css("display")==="block"){
			
			//$("#modalText").css("display","block");
			//$("#modalText").text("Data is successfully inserted.");
			$("#myEditedContent").css("display","none");
			submitForm("myEditedContent");
		}
		
		
	}
	
	
	function checkTextEntered(event,place){
		
		//console.log(event.keyCode);
		
		//zakiah19102024:if enter is prssed
		if(event.keyCode == 13){
			let currId = (place==="myText")?"#myText":"#myEditedContent";
			let currValue = $(currId).val();
			$(currId).val(currValue + "<br/>");
		}
		
	}
	
	function viewForm(page){
		
		if(page === 'main'){
			//container
			$("#write").css("display","block");	
			$("#history").css("display","none");
			
			//menu
			$("#menu1").addClass("active");
			$("#menu2").removeClass("active");
		}
		else if(page === 'login'){
			$("#login").css("display","none");
			$("#resetPwd").css("display","block");
		}
	
		console.log(this);
	}
	
	function reloadPage(){
		
		let path = setMainUrl() + "/login/update";
		
		let data = (getServerSelection() == "java") ?
					{"password": $("#newPwd").val()} :
					{"password": $("#newPwd").val(), "_token" : $("input[name=_token]").val()} ;
		
		$.ajax({
			type: "POST",
			crossDomain: true,
			dataType: "json",
			headers:{
				"Accept": "application/json"
			},
			url: path,
			data: data,
			success: function(response){
				console.log("OK");
			},
			error: function(error){
				console.log("NG");
			}
		});
		
		location.reload();
	}
	
	
	function submitForm(content){
		
		//console.log($("input[type='date']").val());
		
		//console.log($("#myText").val());
		
		let path = setMainUrl() + "/journal/post";
		
		let currId = (content === 'myText') ? "#myText":"#myEditedContent";
		
		let datePosition = (content === 'myText') ? $("input[type='date']").val() : $("#modalText").text().substring(7);
		
		let data = (getServerSelection() == 'java') ?
							{"date": datePosition,"content": $(currId).val()} :
							{"date": datePosition,"content": $(currId).val() , "_token" : $("input[name=_token]").val()} ;
		
		$.ajax({
			type: "POST",
			crossDomain: true,
			dataType: "json",
			headers: {
				"Accept" : "application/json"
			},
			url: path,
			data: data,
			success: function(response){
				console.log("OK");
				location.reload();
			},
			error: function(error){
				console.log("NG");
			}
		});
		
	}
	
	function tryLogin(){
		
		let path = ((getServerSelection() === 'java') ? mainUrl : laravelUrl) + "/login/isValid";
		
		let data = (getServerSelection() === 'java') ?
						{"usrName": $("#username").val(),"pwd" : $("#pwd").val() } :
						{"password": $("#pwd").val(),"usrName": $("#username").val() ,"_token": $("input[name=_token]").val()};
		
		let headerValue = {"Accept": "application/json"} ;
		
		//console.log(data);
		console.log($("input[name=_token]").val());
		console.log("serverSelection = " +getServerSelection());
		
		$.ajax({
			type: "POST",
			crossDomain: true,
			dataType : "json",
			headers: headerValue,
			url: path,
			data: data,
			success : function(response){
				location.href  = laravelUrl + "/setSession/"+response;
				console.log(response);
			},
			error: function(error){
				console.log("NG");
				//console.log(error);
			}
		});
		
	}
	
	function logout(){
		location.href = laravelUrl + "/logout";
	}
	
	
	function removeCell(i){
		
		let path = setMainUrl() + "/journal/delete";
		
		let tRow = $("table tr")[i+1];
		
		console.log(tRow.cells[2].innerHTML);
		
		let data = (getServerSelection() === 'java') ?
					{"date":tRow.cells[2].innerHTML} :
					{"date":tRow.cells[2].innerHTML, "_token":$("input[name=_token]").val()};
		
		for(let i=0;i<tRow.length;i++){
			console.log(tRow[i]);
		}
		
		$.ajax({
			type: "POST",
			crossDomain: true,
			dataType: "json",
			headers:{
				"Accept": "application/json"
			},
			url: path,
			data: data,
			success: function(response){
				console.log("OK");
			},
			error: function(error){
				console.log("NG");
			}
		});
		
		
		$("#"+i).remove();
	}
	
	
	