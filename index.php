<?php
session_start();


if(  (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])){
		//if parent account
		header("Location: dashboard.php");
		exit;

}   else {
		header("Location: login.php");


}
?>
