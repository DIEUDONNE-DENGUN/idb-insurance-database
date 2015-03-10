<html>
	<head>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
		<link rel="stylesheet" href="malihu/jquery.mCustomScrollbar.css" />
	  	<link rel="stylesheet" href="colorbox/colorbox.css" />
		<script src="bootstrap/jquery/jquery-2.1.1.min.js"></script>
		
	</head>

	<style type="text/css">
		
	
	</style>

	<body class="container-fluid">
		<div class="topHeading">
			@include('general/header')		
			<div class="row menuOption">
				<div class="col-md-3 hidden-sm hidden-xs"></div>
				<div class="col-md-9">
					<ul class="nav nav-pills nav-justified">
					  <li><a href="{{URL::route('welcome')}}">Home</a></li>
					  <li><a href="{{URL::route('homeCar')}}">Cars</a></li>
					  <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
					  <li><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
					  <li><a href="{{URL::route('homeReports')}}">Reports</a></li>
					  <li class="active" ><a href="{{URL::route('homeAccounts')}}">Accounts</a></li>
					</ul>
				</div>
			</div>
		</div>

<!-- 		<br><br><br><br><br><br><br>
 -->
 	<div class="flush"></div>
		<!-- this is the body of the whole idb -->		
		<center><div class="bbody ">
			<div class="shortInfo row"  >
				<div class="col-md-3 col-sm-3 hidden-xs sidebar">
					@include('general/sideBar')
				</div>
				<div class="col-md-9" >
						<div class="row">
							<article><center>
								<h2>User Accounts Management</h2>

								<p style="display:inline;">
									 <a href="#loginFormDiv" class="inline" > Create A New Account </a>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 <a href="{{URL::route('viewUser')}}"> View | Edit | Delete Existing Users </a>
								</p>
							</center></article>
							
						</div>
						<hr>
						<div style="display:none;" >
							<div class="addFormDiv" id="loginFormDiv">
								<h3><em>Create a New IDb User</em></h3>
								{{ Form::open(array('route' => 'addUser')) }}
									<input type="text" name="name" placeholder="Full Name" id="name" required autofocus><br>
									<input type="email" name="email" placeholder="Email here" id="email" required><br>
									<input type="text" name="username" placeholder="Username" id="username" required><br>
									<input type="password" name="password" placeholder="password" id="pwd1" required><br>
									<input type="password" name="vpassword" placeholder="reenter password" id="pwd2" required><br>
									<br>
									<select class="" name="role" required>
									  <option value="M" >Manager</option>
									  <option value="A" >Administrator</option>
									</select><br><br>
									<button type="submit" name="createUserSubmit" onclick="return validateInputs()"
									id="createUserSubmit" value="save" class="submitt">Create User</button>
								{{ Form::close() }}
	 						</div>
	 					</div>
						<div class="row">
							<div class="col-md-7 " style=" margin: 10 10 10 10">
								<center>
									<h3>Keeping records of your cars</h3>
									akdjfk<br>bjasdf<br>jsdhf<br>
								</center>
								
							</div>
							<div class="col-md-4 " style=" margin: 10px 20 10 20;"> 
								<img src="img/cars.jpg" alt="..." width="200px;" class="img-circle">
							</div>
						</div>
					</div>
			</div>

		</div></center>
		@include('general/footer')
		<script src="bootstrap/js/respond.js"></script>
		<script type="text/javascript">
			$("#createUserSubmit").click(function(){
			 // alert("Value: " + $("#pwd1").val() + " ::: " + $("#pwd2").val());
			  var pw1 = $("#pwd1").val();
			  var pw2 = $("#pwd2").val()
			  if( pw1 != pw2 ){
			  	alert("password mismatch");
			  	return false;
			  }
			});
		</script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>