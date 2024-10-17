	//created by: Zakiah Zulkefli (2024)

	let mainUrl = "http://localhost:8080";

	let laravelUrl = "http://localhost:8000";

	function getContent(){
		
		let url = mainUrl + "/journal";
		
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
								"<th class=\"col-md-1\">Action</th>" +
								"<th class=\"col-md-1\">#</th>" +
								"<th class=\"col-md-2\">Date</th>" +
								"<th>Content</th>" +
							"</tr>" +
						"</thead>";
			
			myTable += "<tbody>";
			
			for(let i=0;i<data.length;i++){
				myTable += "<tr id=\""+i+"\">" +
								"<td><button onclick=\"removeCell("+i+")\" class=\"btn btn-warning\">Delete</button></td>"+
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
		
		let path = mainUrl + "/login/update";
		
		let data = {"password": $("#newPwd").val()};
		
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
	
	
	function submitForm(){
		
		//console.log($("input[type='date']").val());
		
		//console.log($("textarea").val());
		
		let path = mainUrl + "/journal/post";
		
		let data = {"date": $("input[type='date']").val(),
		            "content": $("textarea").val()};
		
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
			},
			error: function(error){
				console.log("NG");
			}
		});
		
	}
	
	function tryLogin(){
		
		let path = mainUrl + "/login/isValid";
		
		let data = {"password": $("#pwd").val()};
		
		console.log(data);
		
		$.ajax({
			type: "POST",
			crossDomain: true,
			dataType : "json",
			headers:{
				"Accept": "application/json"
			},
			url: path,
			data: data,
			success : function(response){
				if(response == true){
					location.href  = laravelUrl + "/setSession";
				}
				console.log(response);
			},
			error: function(error){
				console.log("NG");
			}
		});
		
	}
	
	function logout(){
		location.href = laravelUrl + "/logout";
	}
	
	
	function removeCell(i){
		
		let path = mainUrl + "/journal/delete";
		
		let tRow = $("table tr")[i+1];
		
		console.log(tRow.cells[2].innerHTML);
		
		let data = {"date":tRow.cells[2].innerHTML};
		
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
	
	
	