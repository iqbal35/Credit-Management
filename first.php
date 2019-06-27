<?php

		$connection = mysqli_connect('localhost','root','','sproject');
			if(!$connection){
				die("database connection failed  ".mysqli_connect_error());
		}
		
		$query =' SELECT * FROM users';
		$result = mysqli_query($connection,$query);
		if(!$result){
			die ("error ".mysqli_error($connection));
		}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Credit Management</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
		<style type="text/css">
		   .data{background-color: lightblue;
		   		 padding:10px;
		   		 }
			ul{
			list-style-type:  none;
			margin: 0;
			padding: 40;
			overflow: hidden;
			background-color: lightgreen;
		}
		li{
			float: left;
			padding:10px;
			margin:5px;
		}
		li a {
				display: inline-block;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
		}
		li a:hover {
			background-color: #111;

		}
			</style>
</head>
<body>
	<div><h1 align="center">CREDIT MANAGEMENT</h1></div>
	<div padding= 40>
		<form action='' method="POST">
		<ul>			
				<li>
					<select name="susers" >
						<option selected value="view">View User</option>
						<?php 
							while($row = mysqli_fetch_assoc($result)){
								$name = $row["Name"];
								$id = $row["ID"];
								echo "<option value = '$id'>$name</option>";
							}

						?>
					</select>
				</li>
			

				<a href="help.html"><li>Help</li></a>
				<a href="about.html"><li>About</li></a>
		</ul><br>
		<div><input type="submit" name="submit" value="O.K"></div><br>
		
		</form>
	</div>
	<div class=data>
		<?php 

			if(isset($_POST['submit'])){
				
						$userid = $_POST['susers'];
						if($userid == 'view'){
							echo "please , select the user";
						}
						else{
							session_start();
							$_SESSION['userid_data'] = $userid;
						

							$query2 = "SELECT * FROM users WHERE ID=$userid ";
							$result2 = mysqli_query($connection,$query2);
							if(!$result2){
										die ("error ".mysqli_error($connection));
							}
							$row2 = mysqli_fetch_assoc($result2);
							//print_r($row2);


							echo "User Name      : ".$row2['Name']."<br>";
							echo "ID             : ".$row2['ID']."<br>";
							echo "E-mail         : ".$row2['Email']."<br>";
							echo "Current Credit : ".$row2['Current_Credit']."<br><br>";
							echo "<a href = 'second.php'><input type='button' name='transact' value='Make Transaction' >"."<br></a>";
							echo '<a href="first.php"><input type="button" value="Home Page"></a>';

						}
						


			}
		?>
			
	</div><br>

	


</body>
</html>