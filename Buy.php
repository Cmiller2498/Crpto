<?php
    
    
 	require 'dbh.inc.php';
	 
    

	$currency = $_POST['buycurrency'];
	$amount = $_POST['buyshares'];
	$table = $_POST['tablebuy'];
   
	$sql = "update $table set shares = shares+?, cost = cost+?*price, val = shares*price, profit = val-cost where name = ? ";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
   	 header("Location: ../myportfolio.php?buyerror");
   	 exit();
	}
	else
	{
   	 mysqli_stmt_bind_param($stmt, 'iis', $amount, $amount, $currency);
   	 mysqli_execute($stmt);
   	 header("Location: ../myportfolio.php?sharespurchased");
   	 exit();
	}
   ?>

