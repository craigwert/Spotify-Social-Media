<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Profile</title>
  <link href="http://elvis.rowan.edu/~wertc1/web/spotify/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main">
<div class="page-out">
<div class="page">
<div class="header">
	<?php 
			include 'header.php';
			
			switch($_GET['page']) {				
				case 'followers':
					include 'followers.php';
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
