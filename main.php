<?php
session_start();
require_once('new-connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quoting Dojo Basic II</title>
	<meta name="description" content="Basic-II Quoting Dojo Coding Dojo"/>
	<link rel="stylesheet" type = "text/css" href="main.css.php">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="main.js.php" charset="UTF-8"></script>
</head>
<body>
	<div id ='wrapper'>
		<div id ='container'>
			<div class='quote-post'>
				<h1>Here are the awesome quotes!</h1>
<?php
	$query = "SELECT * FROM users
				JOIN quotes ON users.id = quotes.user_id;";
	run_mysql_query($query);
	$results = fetch_all($query);
	foreach($results as $result){
?>
				<h3 class='large'><?='"'.$result['quote'].'"'?></h3>
				<p class='small'><?="~ ".$result['name'].' at '.$result['date']?></p>
<?php
	}
?>
			</div>
		</div>
	</div>
</body>
</html>