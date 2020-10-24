<?php

if(isset($_POST['signup-submit'])){
   
	require 'dbh.inc.php';
    
	$username = $_POST['uid'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
    
	if(empty($username) || empty($password) || empty($passwordRepeat)){
    	header("Location: ../home.php?error=emptyfields&uid=".$username);
    	exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    	header("Location: ../home.php?error=invaliduid");
    	exit();
	}
	else if($password !== $passwordRepeat){
    	header("Location: ../home.php?error=passwordcheck&uid=".$username);
    	exit();
	}
	else{
    	$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
    	$stmt = mysqli_stmt_init($conn);
    	if(!mysqli_stmt_prepare($stmt, $sql)){
        	header("Location: ../home.php?error=sqlerror1");
        	exit();
    	}
    	else{
        	mysqli_stmt_bind_param($stmt, "s", $username);
        	mysqli_stmt_execute($stmt);
        	mysqli_stmt_store_result($stmt);
        	$resultCheck =mysqli_stmt_num_rows($stmt);
        	if($resultCheck > 0){
            	header("Location: ../home.php?error=usertaken");
            	exit();
        	}
        	else{
            	$sql = "INSERT INTO users (uidUsers, pwdUsers) VALUES(?, ?)";
            	$sql2 = "create table $username
(
	name varchar(35) not null primary key,
	price int not null,
	shares int not null,
	cost int not null,
	val int not null,
	profit int not null,
	watch boolean not null default false
);";
            	$stmt = mysqli_stmt_init($conn);
            	$stmt2 = mysqli_stmt_init($conn);
            	if(!mysqli_stmt_prepare($stmt, $sql) || !mysqli_stmt_prepare($stmt2, $sql2)){
                	header("Location: ../home.php?error=sqlerror2");
                	exit();
            	}
            	else{
                	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
               	 
                	mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
                	mysqli_stmt_execute($stmt);
                	mysqli_stmt_execute($stmt2);
                	$sql3 = "insert into $username (name, price, shares, cost, val, profit, watch) values ('Bitcoin / BTC', 10, 0, 0, 0, 0, false),  ('Ethereum / ETH', 10, 0, 0, 0, 0, false), ('Tether / USDT', 10, 0, 0, 0, 0, false), ('XRP / XRP', 10, 0, 0, 0, 0, false), ('Bitcoin Cash / BCH', 10, 0, 0, 0, 0, false), ('Bitcoin SV / BSV', 10, 0, 0, 0, 0, false), ('Litecoin / LTC', 10, 0, 0, 0, 0, false), ('Binance Coin / BNB', 10, 0, 0, 0, 0, false), ('EOS / EOS', 10, 0, 0, 0, 0, false), ('Cardano / ADA', 10, 0, 0, 0, 0, false), ('Crypto.com Coin / CRO', 10, 0, 0, 0, 0, false), ('USD Coin / USDC', 10, 0, 0, 0, 0, false), ('Huobi Token / HT', 10, 0, 0, 0, 0, false), ('Neo / NEO', 10, 0, 0, 0, 0, false), ('Ethereum Classic / ETC', 10, 0, 0, 0, 0, false), ('Dash / DASH', 10, 0, 0, 0, 0, false), ('IOTA / MIOTA', 10, 0, 0, 0, 0, false), ('Compound / COMP', 10, 0, 0, 0, 0, false), ('Zcash / ZEC', 10, 0, 0, 0, 0, false), ('Cosmos / ATOM', 10, 0, 0, 0, 0, false), ('VeChain / VET', 10, 0, 0, 0, 0, false), ('Maker / MKR', 10, 0, 0, 0, 0, false), ('HedgeTrade / HEDG', 10, 0, 0, 0, 0, false), ('Tezos / XTZ', 10, 0, 0, 0, 0, false), ('Chainlink / LINK', 10, 0, 0, 0, 0, false), ('Stellar / XLM', 10, 0, 0, 0, 0, false), ('UNUS SED LEO / LEO', 10, 0, 0, 0, 0, false), ('Monero / XMR', 10, 0, 0, 0, 0, false), ('Ontology / ONT', 10, 0, 0, 0, 0, false);";
                	$stmt3 = mysqli_stmt_init($conn);
                	if(!mysqli_stmt_prepare($stmt3, $sql3)){
                	header("Location: ../home.php?error=sqlerror3");
                	exit();
            	}
				 else{
                	mysqli_stmt_execute($stmt3);
                	header("Location: ../home.php?signup=success");
                	exit();}
            	}
        	}
    	}
	}
    
	mysqli_stmt_close();
	mysqli_close($conn);
    
}
else{
	header("Location: ../home.php");
	exit();
}

