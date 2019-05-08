<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Edit Profile</title>
</head>
<body>
	<form name="infoForm" class="formArea" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()" method="POST">
		<h2> Edit Your Profile </h2> <br><br>
		
		Display Name: <br>
		<input type="text" name="name" pattern="[A-Za-z0-9]{2,}" required><br>
		Favorite Artist: <br>
		<input type="text" name="artist" pattern="[A-Za-z0-9]{2,}$" required><br>
		Favorite Album: <br>
		<input type="text" name="album" pattern="[A-Za-z0-9]{2,}$" required><br>

		<input type="submit" value="Submit">	
	
		<p hidden name="success"> Form Sucessfully Submitted </p>
		
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
        $favAlbum = $_POST['album'];;
        //$spotifyID =   must figure out how to get spotifyID after logging in.

        $unameQuery = "SELECT uname FROM spotifyDB WHERE uname = '$uname'";
        $idQuery = "SELECT spotifyID FROM spotifyDB WHERE spotifyID = '$spotifyID'";
        $logInQuery = "SELECT * FROM spotifyDB WHERE uname = '$uname' AND spotifyID = '$spotifyID'";

        $unameResult = $connection->query($unameQuery)->num_rows;
        $idResult = $connection->query($idQuery)->num_rows;
        $logInResult = $connection->query($logInQuery)->num_rows;

        if($unameResult !=0){
               //username already exists, choose new one.
        } else {
            $query = "INSERT INTO `spotifyDB` (uname, spotifyID, favArtist, favAlbum) VALUES('$uname','$spotifyID', '$favArtist', '$favAlbum')";
                        if($connection->query($query) === TRUE) {
                         //redirect to page showing username and artist/album
                         }
                         else {
                             echo "Error. $query check command";
                         }

        }
        }
?>

	</form>
</body>
</html>
