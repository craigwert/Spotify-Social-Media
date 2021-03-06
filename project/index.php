<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Login</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
 <style>
	.loginbtn
{
	background-color: #343434;
	border: none;
	color: white;
	padding: 5px 20px;
	text-align: center;
	font-size: 20px;
	cursor: pointer;
}

.button:hover
{
	background-color: green;
}
</style>
  
</head>
<body>
<div class="main">
<div class="page-out">
<div class="page">
<div class="header">

<center>
<h1> WELCOME </h1>
<br>
<br>
<h2> Log into Spotify to Get Started </h2>
<br>
<br>
<button class="loginbtn" id="btn-login">Login</button>
<center>

<script>
  window.onload=function() {  
    function login(callback) {
        var CLIENT_ID = '23feef2a470941fc82a327cbb66abe53';
        var REDIRECT_URI = 'http://elvis.rowan.edu/~wertc1/web/spotify/home_main.php/?page=edit';
        function getLoginURL(scopes) {
            return 'https://accounts.spotify.com/authorize?client_id=' + CLIENT_ID +
              '&redirect_uri=' + encodeURIComponent(REDIRECT_URI) +
              '&scope=' + 'user-read-private%20user-read-email&state=34fFs29kd09' +
              '&response_type=token';
        }
        
        var url = getLoginURL([
            'user-read-email'
        ]);
        
        var width = 450,
            height = 730,
            left = (screen.width / 2) - (width / 2),
            top = (screen.height / 2) - (height / 2);
    
        window.addEventListener("message", function(event) {
            var hash = JSON.parse(event.data);
            if (hash.type == 'access_token') {
                callback(hash.access_token);
            }
        }, false);
        
        var w = window.open(url,
                            '_self',
                            'menubar=no,location=no,resizable=no,scrollbars=no,status=no, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left
                           );
        
    }
    var loginButton = document.getElementById('btn-login');
    
    loginButton.addEventListener('click', function() {
        login(function(accessToken) {
            getUserData(accessToken)
                .then(function(response) {
                    loginButton.style.display = 'none';
                });
            });
    });
    
}();
  
</script>

</div>
</div>
</div>
</div>
</body>
</html>
