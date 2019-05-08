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
 				$name = test_input($_POST["name"]);
  				$artist = test_input($_POST["artist"]);
  				$album = test_input($_POST["album"]);
			}

			function test_input($data) {
  				$data = trim($data);
  				$data = stripslashes($data);
  				$data = htmlspecialchars($data);
  				return $data;
			}


		?>

	</form>
</body>
</html>
