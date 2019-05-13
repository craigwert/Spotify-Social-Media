<!DOCTYPE html>
<html lang="en-us">
<head>
<title>Search</title>
<link rel="stylesheet" href="css/style.css">
<script>
window.main

var albumURL;
var album;

var result;

var token = window.name;

var encodedAlbum;

var searchURL;


function run(){

console.log("running");

function findAlbum(accessToken, url) {

				
				return $.ajax({
				type: 'GET',
                                url: url,
				headers: {
				'Authorization': 'Bearer ' + accessToken
				}
});
}				


	album = document.getElementById('albumText').value;
	encodedAlbum = encodeURIComponent(album);
	searchURL = "https://api.spotify.com/v1/search?q="+encodedAlbum+"&type=album&market=US&limit=1&offset=0";
	var result;
                        findAlbum(token, searchURL).done(function(json){
                                //albumURL = result[0].external_urls.spotify;
				//document.getElementById('player').src = result[0].external_urls.spotify;
				result = json;
                                //console.log(result[0].external_urls.spotify);
				console.log(result);
				document.getElementById('player').src = result.albums.items[0].external_urls.spotify;
				document.getElementById('albumArt').src = result.albums.items[0].images[1].url;
                                //console.log("ran query");
			});
console.log("done");
}

</script>
</head>

<body>

<form name="search" action="http://elvis.rowan.edu/~wertc1/web/spotify/home_main.php/?page=search" method="post">
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
  //query successful
        } else {
              echo "No results";
              }
        }
        $connection->close();
?>

<div> 
<div class="content">
    <h1 class="title"> User: <?php echo $row["uname"]; ?></h1>
    <h1 class="title"> Favorite Artist: <?php echo $row["favArtist"]; ?></h1>
    <h1 class="title"> Favorite Album: <?php echo $row["favAlbum"]; ?></h1>
     <button type="button" onclick="run()">Show Album</button> 
    <input type="hidden" id="albumText" value="<?php echo $row["favAlbum"];?>">
<div>
    <img src="" id="albumArt">
</div>
</div>
</div>

</body>
</html>

<div class="right-out">
<div class="right-in">
<div class="right-panel">
<div class="right-block">
	<iframe id="player" src="" width="238" height="278" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
</div>
</div>
</div>
</div>

</body>
</html>
