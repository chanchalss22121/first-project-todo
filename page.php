<html>
	<head>
		<title></title>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
		 <meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<style>
	*
	{
		font-size:16px;
	}
	.header
	{
		height:50px;
		
	}
		.col-sm-3
		{
			margin-top:10px;
			font-size:22px;
			font-weight:bold;
			display:flex;
			padding-left:0px;
		}
		.header span
		{
			border-radius:0px;
			font-size:20px;
			font-weight:bold;
			
		}
		.col-sm-9.hr
		{
			padding-top:10px;
			border-bottom:1px solid #b5d5ff; 
			
			
		}
		.hr .col-sm-2
		{
			float:right;
			text-decoration:underline;
			
		}
		
		a
		{
			color:black;
		}

		
		.navbar {
			  overflow: hidden;
			 
			   min-height:100px;
			}

			.navbar a {
			  float: left;
			  font-size: 16px;
			  color: black;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			 
			}

			.subnav {
			  float: left;
			  overflow: hidden;
			   background-color: #fbfbfb;
			margin-left:2px;
			}

			.subnav .subnavbtn {
			  font-size: 16px;  
			  border: none;
			  outline: none;
			  color: black;
			  padding: 14px 16px;
			  background-color: inherit;
			  font-family: inherit;
			  margin: 0;
			}

			.navbar a:hover, .subnav:hover .subnavbtn {
			  background-color: #ededed;
			}

			.subnav-content {
			  display: none;
			  position: absolute;
			  left: 0;
			  background-color: #ededed;
			  width: 100%;
			  z-index: 1;
			  color: black;
			  height:50px;
			}

			.subnav-content a:btn {
			  float: left;
			  color: black;
			  text-decoration: none;
			}

			.subnav-content btn:hover {
			  background-color: #eee;
			  color: black;
			}

			.subnav:hover .subnav-content {
			  display: block;
			}
			.input
			{
			float:right ;
			border-radius: 10px;
			border:none;
			margin-top:4px;

			}
			.input
			{
			float:right ;
			border-radius: 10px;
			border:none;
			margin-top:4px;

		}
			}
#newtask{
    position: relative;
    padding: 5px 5px;
}
	#newtask input{
		width: 30%;
		height: 40px;
		padding: 12px;
		color: #111111;
		font-weight: 500;
		position: relative;
		border-radius: 5px;
		font-family: 'Poppins',sans-serif;
		font-size: 15px;
		border: 2px solid #d1d3d4;
	}

	#newtask input:focus{
		outline: none;
		border-color: #0d75ec;
	}
	#newtask button{
    position: relative;
    font-weight: 500;
    font-size: 16px;
    background-color: #0d75ec;
    border: none;
    color: #ffffff;
    cursor: pointer;
    outline: none;
    width: 10%;
    height: 40px;
    border-radius: 5px;
    font-family: 'Poppins',sans-serif;
}
#tasks{
    border-radius: 10px;
    width: 100%;
    position: relative;
    background-color: #ffffff;
    
  
}

.task{
    border-radius: 5px;
    align-items: center;
    justify-content: space-between;
    border: 1px solid #939697;
    cursor: pointer;
    background-color: #c5e1e6;
    height: 50px;
    margin-bottom: 8px;
    padding: 5px 10px;
    display: flex;
	
}
.task span{
    font-family: 'Poppins',sans-serif;
    font-size: 15px;
    font-weight: 400;
}
.task button{
    background-color: #0a2ea4;
    color: #ffffff;
    border: none;
    cursor: pointer;
    outline: none;
    height: 100%;
    width: 40px;
    border-radius: 5px;
}


		
		footer
		{
			background:color:#b5d5ff; 
		}
		
		
	</style>
	<body>
		<div class="container">
			<div class="header">
				<div class="col-sm-3"><span class="badge">+2</span>My Tinnytodo Demo</div>
				<div class="col-sm-9 hr">
					<div class=" col-sm-2 " >
						<a href="">Setting</a>|
						<a href="login.php">Logout</a>
					</div>
				</div>
			</div>
			<div class="navbar">
				<div class="subnav">
					<button class="subnavbtn ">All task<i class="fa fa-caret-down"></i>
						<div class="subnav-content " >
								<input type="text" class="input" id="toggle" >
						</div>
					</button>
				</div> 
				<div class="subnav">
					<button class="subnavbtn" >+</button>
					<div class="subnav-content">
					   <div id="newtask">
							<input type="text" placeholder="Task to be done..">
							<button id="push" >Add</button>
						</div>
					</div>
				</div> 
			</div>
			
			<div id="tasks"></div>
			
			<footer></footer>
			
		</div>
	</body>
	
	<script type="text/javascript">
	//for button
	$(document).ready(function() {
  $('#button').click(function() {
    $(this).toggleClass("down");
  });
});
	
//javascript
	document.querySelector('#push').onclick = function(){
    if(document.querySelector('#newtask input').value.length == 0){
        alert("Please Enter a Task")
    }
    else{
        document.querySelector('#tasks').innerHTML += `
            <div class="task">
                <span id="taskname">
                    ${document.querySelector('#newtask input').value}
                </span>
                <button class="delete">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>
        `;

        var current_tasks = document.querySelectorAll(".delete");
        for(var i=0; i<current_tasks.length; i++){
            current_tasks[i].onclick = function(){
                this.parentNode.remove();
            }
        }

        var tasks = document.querySelectorAll(".task");
        for(var i=0; i<tasks.length; i++){
            tasks[i].onclick = function(){
                this.classList.toggle('completed');
            }
        }

        document.querySelector("#newtask input").value = "";
    }
}

}

	</script>
</html>