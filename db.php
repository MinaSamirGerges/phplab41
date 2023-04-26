<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1> user details </h1>

<table >
				<tr>
					<th>#ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Gender</th>
					<th>new Mail Status</th>
					
				</tr>


<?php
		$db_host="localhost";
		$db_user="root";
		$db_pass="";
		$db_name="lab4";
		$con = mysqli_connect($db_host, $db_user, $db_pass);

		mysqli_select_db( $con,$db_name );
				$sql = "SELECT * FROM users";
				$result = mysqli_query( $con,$sql );
				
				if(! $result ) {
					die('Could not get data: ' . mysqli_error($con));
				 }
				 if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						$newMailStatus = $row['mail_status'] == 0 ? "no" : "yes";
					   echo "<tr>
					 <td>{$row['user_id']} </td>  
					 <td>{$row['user_name']} </td>  
					 <td>{$row['user_email']} </td> 
					 <td>{$row['user_gender']} </td> 
					 <td>$newMailStatus </td>
                     </tr>";
					}
					
				  } else {
					echo "0 results";
				  }
				 mysqli_close($con); 
                 ?>

                 </table>  
                 
    </br>

                 <a href="./index.php">
                    <button>insert</button>
                </a> 			
	</br>
    
</body>
</html>