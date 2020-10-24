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
           	border: 1px solid black;
        	width: 80%;
        	margin-left: 10%;
        	margin-right: 10%;
        	height: 500px;
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
	<?php
    	require "head.php";
 	 
	?>

	<div class="content">
      	<h2 style="font-size: 42px">Market Watch</h2>
      	<div class="table-wrapper">
    	<table>
    	<tr>
        	<th>Name / Symbol</th>
        	<th>Price (USD)</th>
        	<th>Volume (24h)</th>
        	<th>Percent Change (24h)</th>
    	</tr>
    	<tr>
        	<td>Bitcoin / BTC</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Ethereum / ETH</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Tether / USDT</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>XRP / XRP</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Bitcoin Cash / BCH</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Bitcoin SV / BSV</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Litecoin / LTC</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Binance Coin / BNB</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>EOS / EOS</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Cardano / ADA</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Crypto.com Coin / CRO</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Tezos / XTZ</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Chainlink / LINK</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Stellar / XLM</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>UNUS SED LEO / LEO</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Monero / XMR</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>USD Coin / USDC</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Huobi Token / HT</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Neo / NEO</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Ethereum Classic / ETC</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Dash / DASH</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>IOTA / MIOTA</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Compound / COMP</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Zcash / ZEC</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Cosmos / ATOM</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>VeChain / VET</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Maker / MKR</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>HedgeTrade / HEDG</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	<tr>
        	<td>Ontology / ONT</td>
        	<td>$1</td>
        	<td>$1</td>
        	<td>+5%</td>
    	</tr>
    	</table>
	</div>

	<div class="footer">
      	<p style="font-size: 24px; text-align: left">About CryptoSim</p>
      	<p style="text-align: left">CryptoSim is a browser based cryptocurrency trading simulator designed to be simple and easy to use to allow for individuals new to trading to gain the experience they need to trade successfully in the real world.</p>
	</div>

<?php
?>


</body>
</html>





