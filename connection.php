<?php
echo "asif";
		$connection = mysqli_connect('localhost','root','','myfirst');
			if(!$connection){
				die("database connection failed  ".mysqli_connect_error());
		}
		echo "database connected";

?>