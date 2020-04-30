<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>My kurva blog</title>
		<link rel="stylesheet" href="../style/style.css">
		<link rel="icon" href="style/favicon.ico">
	</head>
	<body>
		<?php
			require_once('controller/controller.php');
			require_once('model/model.php');
			$blog = new Controller;
			require_once('view/header.php');
			$blog->main();
		?>
	</body>
</html>