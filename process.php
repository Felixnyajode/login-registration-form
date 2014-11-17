<?php
session_start();
$errors = array();
//Validate password characters is alphanumeric using this function
function PWValidation($x){
	$x = str_split($x, 1);
	$faultyCheck = TRUE;
	while($faultyCheck) {
		foreach($x as $eachOne) {
			if((ctype_alpha($eachOne) OR (is_numeric($eachOne)))) {	
			}
			else {
				$errorMessage = 'Your password must contain only alphanumeric characters';
				return $errorMessage;
			}
		}
		$faultyCheck = FALSE;
	}
};
//Register button is clicked
if(isset($_POST['action']) && ($_POST['action']=='register')){
//  ********EMAIL*********
//If email is empty throw an error
	if(empty($_POST['email'])){
		$errors['email-empty'] = 'Please enter an e-mail address';
	}
//Else-if email is invalid throw an error	
	elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$errors['email-invalid'] = 'The email address you entered ' . 
			$_POST['email'] . ' is NOT a valid email address!';
	}
//Finally, all correct create an email session variable
	else {
		$_SESSION['email'] = $_POST['email'];
	}
//  ********FIRSTNAME*********
//If first name is empty throw an error
	if(empty($_POST['first_name'])){
		$errors['first_name-empty'] = 'Please enter a first name';
	} 
//Else-if first name is not a-z throw an error
	elseif(!(ctype_alpha($_POST['first_name']))){
			$errors['first_name-!a-z'] = 'The first name you entered needs to be letters.'; 
	}
//Finally, all correct create a first name variable
	else {
		$_SESSION['first_name'] = $_POST['first_name'];
	}
//  ********LASTNAME*********
//If last name is empty throw an error	
	if(empty($_POST['last_name'])){
		$errors['last_name-empty'] = 'Please enter a last name';
	} 
//Else-if last name is not a-z throw an error
	elseif(!(ctype_alpha($_POST['last_name']))){
		$errors['last_name-!a-z'] = 'The last name you entered needs to be letters.'; 
	}
//Finally, all correct create a last name variable
	else {
		$_SESSION['last_name'] = $_POST['last_name'];
	}
//********PASSWORD CODE START -->
//If password is empty throw an error
	if(empty($_POST['password'])){
		$errors['password-empty'] = 'Please enter a password';
	} 
//Else-if password is less than 6 throw an error
	elseif(strlen($_POST['password'])<6){
		$errors['password-<6'] = 'Your password must contain at least 6 characters'; 
	}
//Else-if password is not alphanumeric throw an error
	else {
		$error['password-!alphanumeric'] = PWValidation($_POST['password']);
	}
//If password confirmation is empty throw an error
	if(empty($_POST['passwordConfirm'])){
		$errors['passwordConfirm-empty'] = 'Please enter a confirmation password';
	}
//Else-If password confirmation does not match original password throw and error
	elseif(!($_POST['password']==$_POST['passwordConfirm'])){
		$errors['passwordConfirm!=password'] = 'The passwords do not match.'; 
	}
//Finally, password confirmation matches correct password so create password variable
	else {
		$_SESSION['password'] = $_POST['password'];
	}
// <-- PASSWORD CODE END*******
//  ********Birthday info*********
//Throw an error if user did not choose a year
	if(isset($_POST['bday-year'])){
		if($_POST['bday-year']=='year'){
			$errors['bday-year-empty'] = 'Please provide a birth year.'; 
		}
//Finally create a birthday year variable
		else {
			$_SESSION['bday-year'] = $_POST['bday-year'];
		}
	}
//Throw an error if user did not choose a month
	if(isset($_POST['bday-month'])){
		if($_POST['bday-month']=='month'){
			$errors['bday-month-empty'] = 'Please provide a birth month.'; 
		}
//Finally create a birthday month variable
		else {
			$_SESSION['bday-month'] = $_POST['bday-month'];
		}
	}
//Throw an error if user did not choose a day
	if(isset($_POST['bday-day'])){
		if($_POST['bday-day']=='day'){
			$errors['bday-day-empty'] = 'Please provide a birth day.'; 
		}
//Finally create a birthday day variable
		else {
			$_SESSION['bday-day'] = $_POST['bday-day'];
		}
	};
//*******UPLOAD SECTION*********
	if($_FILES['userfile']['size']=='0'){
		$errors['userfile-empty'] = 'Please provide a profile pic.';
	}
	elseif($_FILES['userfile']['size']>'3000000'){
		$errors['userfile>3mb'] = 'Profile pic must be less than 3 MB';
	}
	else {
		$upload_dir = "uploads/";
		$uploadfile = $upload_dir . basename($_FILES['userfile']['name']);
		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
			$_SESSION['comparisonFile'] = $_FILES['userfile']['name'];
			$_SESSION['filemessage'] = "The file ". basename( $_FILES['userfile']['name']). " has been uploaded.";
			$_SESSION['uploadfile'] = $uploadfile;
		}
	}
//********REDIRECT if statement*********
/*If errors is not empty, then create a session variable with all the errors
and send back to index.php */
	if(!empty($errors)) {
		$_SESSION['messages'] = $errors;
		$_SESSION['pass-fail']=FALSE;
		header('location: index.php');
		exit();
//Otherwise, go to connection.php for further processing.
	} else {
		header('location: connection.php');
		exit();
	}
}