<!DOCTYPE html>
<html lang="en-us">
<head>
<title>Search</title>
<link rel="stylesheet" href="login.css">
</head>

<body>
  <form name="search" action="http://elvis.rowan.edu/~datelloa9/web/final/Spotify-Social-Media/logIn/displayInfo.php\
" method="post">
    <div>
      <label for="username"><b>Username</b></label>
             <input type="text" id="uname" placeholder="Enter Username" name="uname" required>

                    <button type="submit">Search</button>

    </div>

</form>

<?php
     if($_SERVER['REQUEST_METHOD'] == "POST"){

        $server = "localhost";
        $username = "datelloa9";
        $password = "acjFinal2020!";
        $database = "datelloa9";

        $connection = new mysqli($Sserver, $username,$password, $database);
        if($connection->connect_error){
            die("Connection Failed: " . $connection->connect_error);
        }

        $uname = $_POST['uname'];

        $nameQuery = "SELECT * FROM spotifyDB WHERE uname = '$uname'";
        $result = $connection->query($nameQuery);
        $row = $result->fetch_assoc();

        if($result->num_rows > 0){
              echo "User: " . $row["uname"] . " Favorite Artist: " . $row["favArtist"] . " Favorite Album: " . $row["favAlbum"];
        } else {
              echo "No results";
              }
        }
        $connection->close();
?>

</body>
</html>
