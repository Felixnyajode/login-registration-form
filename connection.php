<?php
session_start();
require_once('new-connection.php');
/*Now that we know that the registraion info is valid, we are going to add it to the database.*/

//The checkForUser function checks if same name is already in the database.  
<?php
function insert_new_user($first_name, $last_name, $email, $password, $bday_year, $bday_month, $bday_day) {
     $password = md5($password);
     $esc_first_name = escape_this_string($first_name);
     $esc_last_name = escape_this_string($last_name);
     $esc_email = escape_this_string($email);
     $esc_password = escape_this_string($password);
     $date = $esc_bday_year."-".$esc_bday_month."-".$esc_bday_day;
     $query = "INSERT INTO users (first_name, last_name, email, users.password, users.date) 
     			VALUES ('{$esc_first_name}', '$esc_last_name', '{$esc_email}', '$esc_password', '$date');";
     if(run_mysql_query($query)){
     	return TRUE;
     }
}
if(insert_new_user($_SESSION['first_name'], $_SESSION['last_name'], $_SESSION['email'], $_SESSION['password'], $_SESSION['bday-year'], $_SESSION['bday-month'], $_SESSION['bday-day']))
{
    echo "Thank you for registering!";
    die();
    session_destroy();
    exit();
}
else {
    echo "Registration failed, please fill out form again."; 
    die();
    session_destroy();
    session_start();
    header('location: index.php');
}
?>