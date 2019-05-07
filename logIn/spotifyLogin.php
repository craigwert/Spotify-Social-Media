<!DOCTYPE html>
<html lang="en-us">
<head>
<title>Login</title>
<link rel="stylesheet" href="login.css">
</head>

<body>
  <form name="LogIn" action="http://elvis.rowan.edu/~datelloa9/web/final/Spotify-Social-Media/logIn/logIn.php" method="post">
    <div>
      <label for="username"><b>Username</b></label>
	     <input type="text" id="uname" placeholder="Enter Username" name="uname" required>

	     <label for="spotifyID"> <b>Spotify ID</b></label>
		    <input type="text" id="spotifyID" placeholder="Enter Spotify ID" name="spotifyID" required>

		    <button type="submit">Login</button>
		    
    </div>
    <div name="unameExists" id="nameError" hidden> <b>A user is already registered with this username.  Please try again.</b></div>
    <div name="idExists" id="idError" hidden> <b>A user is already registered with this ID.  Please try again.</b></div>


    <div name="creatAccount" id="create" hidden>
      <button onclick="createAccount(1)"> Yes </button>
      <button onclick="createAccount(0)"> No </button>
	      </div>
<script>
  function createAccount(x){
      if(x==1){
	  confirm("Creating Account for ?"); //createAccount
      }else {
	  //refresh page
      }
  }
</script>
</form>		    
</body>		    	
</html>
