<?php
    
    
 	require 'dbh.inc.php';
	 

	$currency = $_POST['currencyremove'];
	$table = $_POST['tableremove'];
   
	$sql = "update $table set watch = false where name = ? ";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
   	 header("Location: ../myportfolio.php?removewatcherror");
   	 exit();
	}
	else
	{
   	 mysqli_stmt_bind_param($stmt, 's', $currency);
   	 mysqli_execute($stmt);
   	 header("Location: ../myportfolio.php?removedfromwatch");
   	 exit();
	}
 
 /*
 create table testuser1
(
	name varchar not null primary key,
	price int not null,
	shares int not null,
	cost int not null,
	val int not null,
	profit int not null,
	watch boolean not null default false
);


insert into testuser1 (name, price, shares, cost, val, profit, watch) values ('Bitcoin / BTC', 10, 0, 0, 0, 0, false);


*/
   ?>

