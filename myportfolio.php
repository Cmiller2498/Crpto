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
    	.grid-container
    	{
          	display: grid;
          	grid-template-areas:
        	'header header header header header header'
        	'left left left right right right'
    	}
    	.left,
    	.right
    	{
          	padding: 10px;
         	 
    	}
    	.left
    	{
        	grid-area: left;
    	}
    	.right
    	{
        	grid-area: right;
    	}
    	.footer
    	{
          	background-color: #f1f1f1;
          	padding: 10px;
    	}

    	.table-wrapper
    	{
        	width: 80%;
        	margin-left: 10%;
        	margin-right: 10%;
        	height: auto;
        	max-height: 325px;
        	overflow: auto;
    	}

    	table
    	{
        	font-family: arial, sans-serif;
        	border-collapse: collapse;
        	width: 100%;
    	}
    	td, th
    	{
        	border: 1px solid #dddddd;
        	text-align: left;
        	padding: 8px;
    	}
    	tr:nth-child(even)
    	{
        	background-color: #dddddd;
    	}
    	.portfoliosummary
    	{
        	width: 93%;
        	margin-left: 6%;
        	margin-right: 1%;
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
    	.editbtn
    	{
          	width: auto;
         	padding: 10px 18px;
         	background-color: #708090;
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
    	.tab
    	{
          	overflow: hidden;
          	border: 1px solid #ccc;
          	background-color: #f1f1f1;
    	}
    	.tab button
    	{
          	background-color: inherit;
          	float: left;
         	border: none;
          	outline: none;
          	cursor: pointer;
          	padding: 14px 16px;
          	transition: 0.3s;
          	font-size: 17px;
          	color: black;
    	}
    	.tab button:hover
    	{
          	background-color: #ddd;
    	}
    	.tab button.active
    	{
          	background-color: #ccc;
    	}
    	.tabcontent
    	{
          	display: none;
          	padding: 6px 12px;
          	border: 1px solid #ccc;
          	border-top: none;
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

	<?php
    	require "head.php";
    	if(isset($_SESSION['userUid']))
    	{
   		 $name = $_SESSION['userUid'];
    	}
    	else
    	{
   		 echo '<script> alert("Please log in to view your portfolio.")</script>';
			 echo '<script> window.location = \'home.php\'</script>';
   		 
    	}
	?>

	<div class="content">
      	<h2 style="font-size: 42px">My Portfolio</h2>
      	<table class="portfoliosummary">
          	<tr>
              	<th>Today's Performance</th>
              	<th>Overall Performance</th>
              	<th>Portfolio Cost</th>
              	<th>Portfolio Value</th>
              	<th>Edit Portfolio</th>
          	</tr>
          	<tr>
              	<td>0</td>
              	<td>0</td>
              	<td>0</td>
              	<td>0</td>
              	<td><button class="editbtn" onclick="document.getElementById('editportfolio').style.display='block'" style="width: auto">Buy / Sell</button></td>
          	</tr>
      	</table>
      	<div class="table-wrapper">
        	<table id="portfolio">
            	<tr>
                	<th>Name / Symbol</th>
                	<th>Price (USD)</th>
                	<th>Shares</th>
                	<th>Total Cost (USD)</th>
                	<th>Market Value (USD)</th>
                	<th>Profit (USD)</th>
            	</tr>
            	<?php
   		 $conn = mysqli_connect("localhost", "admin", "Newpassword1", "loginsystem");
   		 $sql = "select * from $name where watch = true";
   		 $result = mysqli_query($conn, $sql);
   		 if(mysqli_num_rows($result) > 0)
   		 {
   			 while($row = mysqli_fetch_assoc($result))
   			 {?>
   				 <tr>
   				 <td><?php echo $row["name"];?></td>
   				 <td><?php echo $row["price"];?></td>
   				 <td><?php echo $row["shares"];?></td>
   				 <td><?php echo $row["cost"];?></td>
   				 <td><?php echo $row["val"];?></td>
   				 <td><?php echo $row["profit"];?></td>
   				 </tr>
   		 <?php    }
   		 }    
    	?>
        	</table>
    	</div>
    	<form action="includes/watch.inc.php" name="currencyname" method="post">
        	<input list="currencies" type="text" placeholder="Enter Currency Name or Symbol" name="cname" style="width: 76%; margin-right: 14%; margin-left: 10%" autocomplete="off">
        	<input type="hidden" value="<?php echo $_SESSION['userUid'];?>" name="tablename">
    	</form>
	</div>

	<datalist id="currencies">
    	<option value="Bitcoin / BTC">
    	<option value="Ethereum / ETH">
    	<option value="Tether / USDt">
    	<option value="XRP / XRP">
    	<option value="Bitcoin Cash / BCH">
    	<option value="Bitcoin SV / BSV">
    	<option value="Litecoin / LTC">
    	<option value="Binance Coin / BNB">
    	<option value="Crypto.com Coin / CRO">
    	<option value="EOS / EOS">
	</datalist>


	<div id="editportfolio" class="modal">
      	<div class="modal-content">
              	<div class="tab">
                  	<button type="button" class="tablinks" onclick="openTab(event, 'BuyTab')" style="width: 33%; height: 100%">Buy</button>
                  	<button type="button" class="tablinks" onclick="openTab(event, 'SellTab')" style="width: 33%; height: 100%">Sell</button>
                  	<button type="button" class="tablinks" onclick="openTab(event, 'RemoveTab')" style="width: 33%; height: 100%">Remove</button>
              	</div>
              	<form id="BuyTab" class="tabcontent" style="display: block;" action="includes/buy.inc.php" method="post">
                  	<h1>Buy</h1>
                  	<hr>
                  	<label for="currency"><b>Currency</b></label>
                      	<input type="text" placeholder="Enter Currency" name="buycurrency" list="currencies" autocomplete="off" id="buycurrency">
                      	<label for="shares"><b>Shares</b></label>
                      	<p></p>
                      	<input type="number" placeholder="Enter Shares" name="buyshares" id="buyshares">
                       	<input type="hidden" value="<?php echo $_SESSION['userUid'];?>" name="tablebuy">
                      	<div class="clearfix">
                        	<button type="button" onclick="document.getElementById('editportfolio').style.display='none'" class="cancelbtn">Cancel</button>
                        	<button type="submit" class="signupbtn">Submit</button>
                    	</div>
              	</form>
            	<form id="SellTab" class="tabcontent" action="includes/sell.inc.php" method="post">
                  	<h1>Sell</h1>
                  	<hr>
                      	<label for="currency"><b>Currency</b></label>
                      	<input type="text" placeholder="Enter Currency" name="sellcurrency" list="currencies" autocomplete="off" id="sellcurrency">
                      	<label for="shares"><b>Shares</b></label>
                      	<p></p>
                      	<input type="number" placeholder="Enter Shares" name="sellshares" id="sellshares">
                       	<input type="hidden" value="<?php echo $_SESSION['userUid'];?>" name="tablesell">
                      	<div class="clearfix">
                        	<button type="button" onclick="document.getElementById('editportfolio').style.display='none'" class="cancelbtn">Cancel</button>
                        	<button type="submit" class="signupbtn">Submit</button>
                    	</div>
            	</form>
            	<form id="RemoveTab" class="tabcontent" action="includes/remove.inc.php" method="post">
                  	<h1>Remove</h1>
                  	<hr>
                      	<label for="currency"><b>Currency</b></label>
                      	<input type="text" placeholder="Enter Currency" name="currencyremove" list="currencies" autocomplete="off" id="removecurrency">
                       	<input type="hidden" value="<?php echo $_SESSION['userUid'];?>" name="tableremove">
                      	<div class="clearfix">
                        	<button type="button" onclick="document.getElementById('editportfolio').style.display='none'" class="cancelbtn">Cancel</button>
                        	<button type="submit" class="signupbtn">Submit</button>
                    	</div>
            	</form>
          	</div>
	</div>


	<script>
    	function openTab(evt, tabName)
    	{
           	var i, tabcontent, tablinks;
          	tabcontent = document.getElementsByClassName("tabcontent");
          	for (i = 0; i < tabcontent.length; i++)
          	{
               	tabcontent[i].style.display = "none";
          	}
          	tablinks = document.getElementsByClassName("tablinks");
          	for (i = 0; i < tablinks.length; i++)
          	{
               	tablinks[i].className = tablinks[i].className.replace(" active", "");
          	}
          	document.getElementById(tabName).style.display = "block";
          	evt.currentTarget.className += " active";
    	}
	</script>

</body>
</html>





