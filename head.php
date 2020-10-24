<?php
    session_start();    
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CryptoSim</title>
	<style>
    	*
    	{
          	box-sizing: border-box;
          	font-family: Arial, Helvetica, sans-serif;
    	}
    	body
    	{
          	margin: 0;
          	font-family: Arial, Helvetica, sans-serif;
    	}
    	.topnav
    	{
          	overflow: hidden;
          	background-color: #333;
    	}
    	.topnav a
    	{
          	float: left;
          	display: block;
          	color: #f2f2f2;
          	text-align: center;
          	padding: 14px 16px;
          	text-decoration: none;
    	}
    	.topnav a:hover
    	{
          	background-color: #ddd;
          	color: black;
    	}

    	.content
    	{
          	background-color: #ddd;
          	padding: 10px;
          	text-align: center;
    	}

    	.header
    	{
          	grid-area: header;
          	background-color: #f1f1f1;
          	padding: 30px;
          	text-align: center;
          	font-size: 32px;
    	}
    

    

    	input[type=text], input[type=password]
    	{
          	width: 100%;
          	padding: 12px 20px;
          	margin: 8px 0;
          	display: inline-block;
          	border: 1px solid #ccc;
          	box-sizing: border-box;
    	}
    	button
    	{
          	background-color: #4CAF50;
          	color: white;
          	padding: 14px 20px;
          	margin: 8px 0;
          	border: none;
          	cursor: pointer;
          	width: 100%;
    	}
    	button:hover
    	{
          	opacity: 0.8;
    	}
    	.signupbtn
    	{
          	width: auto;
         	padding: 10px 18px;
         	background-color: #1E90FF;
    	}
    	.cancelbtn
    	{
          	width: auto;
         	padding: 10px 18px;
         	background-color: #DC143C;
    	}
    	.imgcontainer
    	{
          	text-align: center;
          	margin: 24px 0 12px 0;
          	position: relative;
    	}
    	.container
    	{
         	padding: 16px;
    	}
    	span.psw
    	{
          	float: right;
          	padding-top: 16px;
    	}
    	.modal
    	{
          	display: none; /* Hidden by default */
          	position: fixed; /* Stay in place */
          	z-index: 1; /* Sit on top */
          	left: 0;
          	top: 0;
          	width: 100%; /* Full width */
          	height: 100%; /* Full height */
          	overflow: auto; /* Enable scroll if needed */
          	background-color: rgb(0,0,0); /* Fallback color */
          	background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
          	padding-top: 60px;
    	}
    	.modal-content
    	{
          	background-color: #fefefe;
          	margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
          	border: 1px solid #888;
          	width: 80%; /* Could be more or less, depending on screen size */
    	}
    	.close
    	{
          	position: absolute;
          	right: 25px;
          	top: 0;
          	color: #000;
          	font-size: 35px;
          	font-weight: bold;
    	}
    	.close:hover,
    	.close:focus
    	{
          	color: red;
          	cursor: pointer;
    	}
    	.animate
    	{
          	-webkit-animation: animatezoom 0.6s;
          	animation: animatezoom 0.6s
    	}
    	@-webkit-keyframes animatezoom
    	{
          	from {-webkit-transform: scale(0)}
          	to {-webkit-transform: scale(1)}
    	}
    	@keyframes animatezoom
    	{
          	from {transform: scale(0)}
          	to {transform: scale(1)}
    	}
    	@media screen and (max-width: 300px)
    	{
          	span.psw
          	{
             	display: block;
             	float: none;
          	}
          	.signupbtn
          	{
             	width: 100%;
          	}
          	.cancelbtn
          	{
              	width: 100%;
          	}
    	}
	</style>
</head>
<body>

<div class="topnav">
<a href="home.php">Home</a>
      	<a href="myportfolio.php">My Portfolio</a>
<?php
    	if(isset($_SESSION['userUid']))
    	{
   		 echo '
     	<a style="float: right" style="width: auto;" onclick="document.getElementById(\'logout\').style.display=\'block\'">Log Out</a>';
    	}
    	else
    	{
   		 echo '
     	<a style="float: right" onclick="document.getElementById(\'login\').style.display=\'block\'" style="width: auto;">Log In</a>
	';
    	}
?>
   </div>

	<div id="login" class="modal">
      	<form class="modal-content animate" action="includes/login.inc.php" method="post">
        	<div class="imgcontainer">
              	<span onclick="document.getElementById('login').style.display='none'" class="close" title="Close">&times;</span>
        	</div>
        	<div class="container">
              	<label for="userid"><b>Username</b></label>
              	<input type="text" name="userid" placeholder="Enter Username">
              	<label for="lpwd"><b>Password</b></label>
             	<input type="password" name="lpwd" placeholder="Enter Password">
              	<button type="submit" name="login-submit">Login</button>
              	<label>
                  	<input type="checkbox" checked="checked" name="remember"> Remember me
              	</label>
        	</div>
           	<div class="container" style="background-color:#f1f1f1">
              	<button type="button" onclick="document.getElementById('signup').style.display='inline-block'; document.getElementById('login').style.display='none'"  class="signupbtn">Sign Up</button>
              	<span class="psw"><a href="javascript:alert('just remember 4head')">Forgot password?</a></span>
            	</div>
      	</form>
	</div>

	<div id="signup" class="modal">
      	<span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close">&times;</span>
      	<form class="modal-content" action="includes/signup.inc.php" method="post">
           	<div class="container">
              	<h1>Sign Up</h1>
              	<p>Please fill in this form to create an account.</p>
              	<hr>
              	<label for="username"><b>Username</b></label>
              	<input type="text" name="uid" placeholder="Enter Username" name="username">
              	<label for="pwd"><b>Password</b></label>
              	<input type="password" name="pwd" placeholder="Enter Password">
              	<label for="pwd-repeat"><b>Repeat Password</b></label>
            	<input type="password" name="pwd-repeat" placeholder="Repeat Password" name="pwd-repeat">
              	<label>
                	<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
              	</label>
              	<div class="clearfix">
                	<button type="button" onclick="document.getElementById('signup').style.display='none'" class="cancelbtn">Cancel</button>
                	<button type="submit" name="signup-submit"class="signupbtn">Sign Up</button>
              	</div>
        	</div>
      	</form>
	</div>
    
	<div id="logout" class="modal">
      	<form class="modal-content" action="includes/logout.inc.php" method="post">
           	<div class="container">
              	<p>Are you sure you want to log out?.</p>
              	<hr>
              	<div class="clearfix">
                	<button type="button" onclick="document.getElementById('logout').style.display='none'" class="cancelbtn">Cancel</button>
                	<button type="submit" name="logout-submit"class="signupbtn">Log out</button>
              	</div>
        	</div>
      	</form>
	</div>

	<script>
    	var modal = document.getElementById('login');
    	window.onclick = function(event)
    	{
        	if (event.target == modal)
        	{
            	modal.style.display = "none";
        	}
    	}
	</script>

	<script>
    	var modal = document.getElementById('signup');
    	window.onclick = function(event)
    	{
        	if (event.target == modal)
        	{
            	modal.style.display = "none";
        	}
    	}
	</script>
    
	<script>
    	var modal = document.getElementById('logout');
    	window.onclick = function(event)
    	{
        	if (event.target == modal)
        	{
            	modal.style.display = "none";
        	}
    	}
	</script>



</body>
</html>





