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
	<link rel="stylesheet" type = "text/css" href="main.css.php" charset="UTF-8">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="main.js.php" charset="UTF-8"></script>
</head>
<body>
	<div id ='wrapper'>
		<div id ='container'>
			<div id ="notification">
<?php
if(isset($_SESSION['messages'])){
	foreach($_SESSION['messages'] as $message){

?>
				<p class='message'><?=$message?></p>
<?php
	}
	unset($_SESSION['messages']);
}
?>
			</div>
			<h1>Please Register: </h1>
		<form enctype="multipart/form-data" action="process.php" method="POST">
			<table>
				<tr>
					<td>Email: </td>
					<td><input type='text' name='email'
<?php
//Display EMAIl if it has been selected previously
if(isset($_SESSION['email'])){ ?>
						value='<?=$_SESSION['email']?>'
<?php }?>
					></td>
				</tr>
				<tr>
					<td colspan = '2'>
<?php
if(isset($_SESSION['messages']['email-empty'])){
?>
						<p class='message'><?=$_SESSION['messages']['email-empty']?></p>
<?php }
if(isset($_SESSION['messages']['email-invalid'])){
?>
						<p class='message'><?=$_SESSION['messages']['email-invalid']?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<td>First Name: </td>
					<td><input type='text' name='first_name'
<?php
//Display FIRSTNAME if it has been selected previously
if(isset($_SESSION['first_name'])){ ?>
						value='<?=$_SESSION['first_name']?>'
<?php 
} ?>
					></td>
				</tr>
				<tr>
					<td colspan = '2'>
<?php
if(isset($_SESSION['messages']['first_name-empty'])){
?>
						<p class='message'><?=$_SESSION['messages']['first_name-empty']?></p>
<?php }
if(isset($_SESSION['messages']['first_name-!a-z'])){
?>
						<p class='message'><?=$_SESSION['messages']['first_name-!a-z']?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<td>Last Name: </td>
					<td><input type='text' name='last_name'
<?php
//Display LASTNAME if it has been selected previously
if(isset($_SESSION['last_name'])){ ?>
						value='<?=$_SESSION['last_name']?>'
<?php
} ?>
					></td>
				</tr>
				<tr>
					<td colspan = '2'>
<?php
if(isset($_SESSION['messages']['last_name-empty'])){
?>
						<p class='message'><?=$_SESSION['messages']['last_name-empty']?></p>
<?php }
if(isset($_SESSION['messages']['last_name-!a-z'])){
?>
						<p class='message'><?=$_SESSION['messages']['last_name-!a-z']?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type='text' name='password'></td>
				</tr>
				<tr>
					<td colspan = '2'>
<?php
if(isset($_SESSION['messages']['password-empty'])){
?>
						<p class='message'><?=$_SESSION['messages']['password-empty']?></p>
<?php }
if(isset($_SESSION['messages']['password-<6'])){
?>
						<p class='message'><?=$_SESSION['messages']['password-<6']?></p>
<?php }
if(isset($_SESSION['messages']['password-!alphanumeric'])){
?>
						<p class='message'><?=$_SESSION['messages']['password-!alphanumeric']?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<td>Confirm Password: </td>
					<td><input type='text' name='passwordConfirm'></td>
				</tr>
				<tr>
					<td colspan = '2'>
<?php
if(isset($_SESSION['messages']['passwordConfirm-empty'])){
?>
						<p class='message'><?=$_SESSION['messages']['passwordConfirm-empty']?></p>
<?php }
if(isset($_SESSION['messages']['passwordConfirm!=password'])){
?>
						<p class='message'><?=$_SESSION['messages']['passwordConfirm!=password']?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<td>Birthday: </td>
					<td>
						<select name="bday-year">
				 			<option value="year">Year</option>
<?php
//for loop of the YEAR options, if already selected previously then it will auto-choose that selection upon return.
for ($i=1970; $i < 2013; $i++) {
	if(isset($_SESSION['bday-year'])){
		if($i==intval($_SESSION['bday-year'])){ ?>
							<option selected='selected' value="<?=$i?>"><?=$i?></option>		
<?php
		}
	} ?>
				 			<option value="<?=$i?>"><?=$i?></option>
<?php
} ?>
						</select>
						<select name="bday-month">
				 			<option value="month">month</option>
<?php
//for loop of the MONTH options, if already selected previously then it will auto-choose that selection upon return.
for ($i=1; $i < 13; $i++) {
	if(isset($_SESSION['bday-month'])){
		if($i==intval($_SESSION['bday-month'])){ ?>
							<option selected='selected' value="<?=$i?>"><?=$i?></option>		
<?php
		}
	} ?>
				 			<option value="<?=$i?>"><?=$i?></option>
<?php
} ?>
						</select>
						<select name="bday-day">
				 			<option value="day">day</option>
<?php
//for loop of the DAY options, if already selected previously then it will auto-choose that selection upon return.
for ($i=1; $i < 31; $i++) {
	if(isset($_SESSION['bday-day'])){
		if($i==intval($_SESSION['bday-day'])){ ?>
							<option selected='selected' value="<?=$i?>"><?=$i?></option>		
<?php
		}
	} ?>
				 			<option value="<?=$i?>"><?=$i?></option>
<?php
} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan = '2'>
<?php
if(isset($_SESSION['messages']['bday-year-empty'])){
?>
						<p class='message'><?=$_SESSION['messages']['bday-year-empty']?></p>
<?php }
if(isset($_SESSION['messages']['bday-month-empty'])){
?>
						<p class='message'><?=$_SESSION['messages']['bday-month-empty']?></p>
<?php }
if(isset($_SESSION['messages']['bday-year-empty'])){
?>
						<p class='message'><?=$_SESSION['messages']['bday-day-empty']?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<td>Please upload your picture:</td>
					<td><input type='file' name='userfile'>
<?php
//if PIC is already uploaded and return to screen, then show a mini-pic of
//their uploaded image.
if(isset($_SESSION['uploadfile'])){
?>
					<img class="little" src="<?=$_SESSION['uploadfile']?>">
<?php
} ?>
					</td>
				</tr>
<?php
//File message to indicate PIC has been uploaded, unless not successful and throw an error.
if(isset($_SESSION['filemessage'])){
?>
				<tr><td colspan="2"><?=$_SESSION['filemessage']?>
<?php 
}
else {
?>
				<tr><td colspan="2">
<?php
	if(isset($_SESSION['messages']['userfile-empty'])){
?>
					<p class='message'><?=$_SESSION['messages']['userfile-empty']?></p>
<?php }
	if(isset($_SESSION['messages']['userfile>3mb'])){
?>
					<p class='message'><?=$_SESSION['messages']['userfile>3mb']?></p>
<?php 
} 	} ?>
				</td>
				</tr>
				<tr>
					<td colspan="2" class='submittal'>
						<input type='submit' name='submit' value='Register'>
						<input type='hidden' name='action' value='register'>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>