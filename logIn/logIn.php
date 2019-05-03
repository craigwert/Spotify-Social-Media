<?php
    include 'spotifyLogin.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){

	$server = "localhost";
	$username = "datelloa9";
	$password = "adnam0920!";
	$database = "datelloa9";

	$connection = new mysqli($Sserver, $username,$password, $database);
	if($connection->connect_error){
	    die("Connection Failed: " . $connection->connect_error);
	}

	$uname = $_POST['uname'];
	$spotifyID = $_POST['spotifyID'];

	$unameQuery = "SELECT uname FROM spotifyDB WHERE uname = '$uname'";
	$idQuery = "SELECT spotifyID FROM spotifyDB WHERE spotifyID = '$spotifyID'";
	$logInQuery = "SELECT * FROM spotifyDB WHERE uname = '$uname' AND spotifyID = '$spotifyID'";

	$unameResult = $connection->query($unameQuery)->num_rows;
        $idResult = $connection->query($idQuery)->num_rows;
        $logInResult = $connection->query($logInQuery)->num_rows;


	echo '<script>document.getElementById("error1").hidden= true;</script>';
        echo '<script>document.getElementById("error2").hidden= true;</script>';
	echo '<script>document.getElementById("create").hidden= true;</script>';
	 
	if(logInResult != 0){
	    echo 'spotify Login';
	    //confirm log in using spotify
	}	
	else if($unameResult !=0){
	       if($idResult !=0){
	       echo '<script>document.getElementById("nameError").hidden= false;</script>';
	       echo '<script>document.getElementById("idError").hidden= false;</script>';
	       } else {
		    echo '<script>document.getElementById("nameError").hidden= false;</script>';	 
	       }
	} else if ($idResult != 0) {
	       echo '<script>document.getElementById("idError").hidden= false;</script>';	
	} else {
	    echo '<script>document.getElementById("create").hidden= false;</script>';	    
	    $query = "INSERT INTO `spotifyDB` (uname, spotifyID) VALUES('$uname','$spotifyID')";
	   	        if($connection->query($query) === TRUE) {
	    	  	 echo "Inserted User: " . $_POST['uname'] . "  ID: ". $_POST['spotifyID'];
		   	 }
		  	 else {
			     echo "Error. $query check command";
		   	 }	  
	    //if yes, add info to DB and then use spotify to log in.
	    // if no, go back to log in page
	}
	}
?>

