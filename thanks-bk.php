<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Title</title>
</head>
<body>
	<div id="wrapper">
		<header id="header"></header>
		<main id="main">
			<h1>Thanks</h1>
			<ul>
				<?php
				$dir = $_SESSION["task"];
				$dir2 = scandir($dir .'/');
				foreach ($dir2 as $key => $value) { 
					$ext = substr($value, strrpos($value, '.', -1), strlen($value));
					if ($value != "." && $value != ".." && $value != "error_log" && $ext == ".php" ) {
						?>
						<li><a href='<?php echo $_SESSION["taskname"].'/'.$value?>'><?php echo $_SESSION["taskname"].'/'.$value?></a></li>
					<?php } }?>	
				</ul>
		</main>
		<footer id="footer"></footer>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.11.2.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.main.js"></script>
</body>
</html>