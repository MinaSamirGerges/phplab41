<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>


<body>
	
	<h1> registration form </h1>
	<h2> please fill this form and submit to add arecord to the data base  </h2>
	<p style="color: red">* Required field</p>


<?php
$nameErr = $emailErr = $termsErr = $genderErr = "";
$name = $email = $gender = $terms =  "";


    if (empty($_GET["form-name"])) {
      $nameErr = "Name is required";
    } else {
        $nameErr = "";
    }

    
    if (empty($_GET["form-email"])) {
      $emailErr = "Email is required";
    } else {
        $emailErr = "";
    }
      
    if (empty($_GET["form-gender"])) {
      $genderErr = "Gender is required";
    } else {
        $genderErr = "";
    }

	

    
if(!empty($_GET["form-name"]) && !empty($_GET["form-email"])  && !empty($_GET["form-gender"]) )
 {
    $name = $_GET["form-name"];
    $email= $_GET["form-email"];
    $gender = $_GET["form-gender"];
    $terms =  isset($_GET['form-terms']) == 1 ? 1 : 0;

	
   
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='lab4';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   
   //echo 'Connected successfully<br>';

   mysqli_select_db( $conn,$dbname );



// $sql = 'CREATE TABLE users( user_id INT NOT NULL AUTO_INCREMENT,
//    user_name VARCHAR(20) NOT NULL,
//    user_email  VARCHAR(20) NOT NULL,
//    user_gender   VARCHAR(20) NOT NULL,
//    mail_status    INT(1) NOT NULL,
//    primary key ( user_id ))';

// $retval = mysqli_query( $conn,$sql );

// if(! $retval ) {
// 	die('Could not create table: ' . mysqli_error($conn));
//  }
  
//  echo "<br>Database Table  created successfully\n";

 $sql1 = "INSERT INTO users(user_name,user_email, user_gender, mail_status) 
   VALUES ( '$name', '$email', '$gender', '$terms' )";

   $retval1 = mysqli_query( $conn,$sql1 );
   
   if(! $retval1 ) {
      die('Could not insert to table: ' . mysqli_error($conn));
   }
    
   echo "<br>Data inserted to table successfully\n";

 	mysqli_close($conn);
 

 }
?>


	<form
		style="display: flex; gap: 5px; flex-direction: column"
		action="<?php $_PHP_SELF ?>"
		method="GET">


		<div>
			<span style="min-width: 150px; display: inline-flex">Name</span>
				<input type="text" name="form-name" style="min-width: 200px" />
        			<span style='color:red;'><?php echo $nameErr; ?></span>
		</div>
		<br>

		<div>
			<span style="min-width: 300px; display: inline-flex">E-mail</span>
				<input type="email" name="form-email" style="min-width: 200px" />
           			 <span style='color:red;'><?php echo $emailErr; ?></span>
		</div>
		<br>

		
		<div>
			<span style="min-width: 150px; display: inline-flex">Gender</span>
			
					<span style='color:red;'><?php echo $genderErr; ?></span>
			<br>
							<input type="radio" name="form-gender" id="gender-female" value="female"/><label
								for="gender-female"
								>Female</label>
			
			<br>
							<input type="radio" id="gender-male" name="form-gender" value="male"/><label
								for="gender-male"
									>Male</label>	
		</div>
		<br>

		<div>
            <span style="min-width: 150px; display: inline-flex">Receive emails from us  :</span>
				<input type="checkbox" name="form-terms"/>
           		
		</div>
		<br>
		<br>

		

		
		<button type="submit" style="width:100px;">Submit</button>
		
	</form>

	

	

	</body>
</html>
