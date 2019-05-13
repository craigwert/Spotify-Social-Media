<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Profile</title>
  <link href="https://elvis.rowan.edu/~jacksonj0/web/spotify/css/style.css" rel="stylesheet" type="text/css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<div class="main">
<div class="page-out">
<div class="page">
<div class="header">
	<?php 
			include 'header.php';
			
			switch($_GET['page']) {				
				case 'search':
					include 'search.php';
					break;
				case 'edit':
					include 'edit.php';
					break;
				case 'logout':
					include 'logout.php';
					break;
				default:
					include 'profile.php';
					break;
			}

		?>
</div>
</div>
</div>
</div>
</body>
</html>
