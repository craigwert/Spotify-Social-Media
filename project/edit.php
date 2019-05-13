<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Edit Profile</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<form name="infoForm" class="formArea" action="" onsubmit="" method="POST">
		<h2> Edit Your Profile </h2> <br><br>
		
		Display Name: <br>
		<input type="text" name="name" pattern="[A-Za-z0-9\s]{2,}" required><br>
		Favorite Artist: <br>
		<input type="text" name="artist" pattern="[A-Za-z0-9\s]{2,}$" required><br>
		Favorite Album: <br>
		<input type="text" name="album" pattern="[A-Za-z0-9\s]{2,}$" required><br>

		<input type="submit" value="Submit">	

		<input type="hidden" name="spotID" id="spotID">
		<input type="hidden" name="authToken" id="authToken">
		<p hidden name="success"> Form Sucessfully Submitted </p>
		

<script>
			var url = window.location.href;

			var token = url.match(/\#(?:access_token)\=([\S\s]*?)\&/)[1];
			
			

			function getUserData(accessToken) {
				return $.ajax({
           		   	url: 'https://api.spotify.com/v1/me',
           		   	headers: {
              		  	'Authorization': 'Bearer ' + accessToken
           			 }
       			   });
			}

			console.log(token);
			
			window.name = token;
;

			var jsonData;

			getUserData(token).done(function(json){
				console.log(json.id);
				document.getElementById("spotID").value = json.id;
				document.getElementById("authToken").value = token;
			});

			//var spotifyID = json["id"];
			//console.log(jsonData)
			//alert(spotifyID)
			

		</script>

		


<?php

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
 				 $server = "localhost";
        $username = "datelloa9";
        $password = "acjFinal2020!";
        $database = "datelloa9";
        $connection = new mysqli($Sserver, $username,$password, $database);
        if($connection->connect_error){
            die("Connection Failed: " . $connection->connect_error);
        }
        $uname = $_POST['name'];
        $favArtist = $_POST['artist'];
        $favAlbum = $_POST['album'];
	$spotifyID =  $_POST['spotID'];
	$authToken = $_POST['authToken'];
        $unameQuery = "SELECT uname FROM spotifyDB WHERE uname = '$uname'";
        $idQuery = "SELECT spotifyID FROM spotifyDB WHERE spotifyID = '$spotifyID'";
	$logInQuery = "SELECT * FROM spotifyDB WHERE uname = '$uname' AND spotifyID = '$spotifyID'";
	$authTokenQuery = "SELECT authToken FROM spotifyDB WHERE uname='adatello98'";
        $unameResult = $connection->query($unameQuery)->num_rows;
        $idResult = $connection->query($idQuery)->num_rows;
        $logInResult = $connection->query($logInQuery)->num_rows;
        
            $query = "INSERT INTO `spotifyDB` (uname, spotifyID, favArtist, favAlbum, authToken) VALUES('$uname','$spotifyID', '$favArtist', '$favAlbum', '$authToken')";
                        if($connection->query($query) === TRUE) {
        //redirect to page showing username and artist/album
	
                         }
                         else {
                             echo "Error. $query check command";
        }
	}
		
        
?>

	</form>
</body>
</html>
