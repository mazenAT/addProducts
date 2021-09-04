<?php 

function db () {
	static $conn;
	if ($conn===NULL){ 
		$conn = mysqli_connect('localhost','mazen','Test-123','products');
		}
		return $conn;
	}
?>