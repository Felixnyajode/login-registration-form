<?php
header('Content-Type: text/javascript; charset=UTF-8');
session_start();
require_once('new-connection.php');
?>
$(document).ready(function(){
	$('.large').hover(function(){
		$(this).css("border-left", "5px solid RGB(66, 139, 203)");
		}, function(){
		$(this).css("border-left", "none");
	});
});
