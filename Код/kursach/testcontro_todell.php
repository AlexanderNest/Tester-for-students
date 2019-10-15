<?php
	if (isset($_POST['addtest'])){
		header ('Location: addtest.php');
		exit;
	}
	
	if (isset($_POST['deletetest'])){
		header ('Location: deletetest.php');
		exit;
	}
?>