<?php
require_once("_includes/connection.php");
if(isset($_POST['signup']) && $_POST['signup']=="mm")
{
	$firstname=($_POST['f_name']);
	$lastname=($_POST['l_name']);
	$email=($_POST['u_email']);
	$pass=sha1($_POST['u_hash']);
	$username=($_POST['username']);
	
	$query_check="SELECT * from user WHERE username='$username'";
	$res_check=mysqli_query($connection, $query_check);
	$check_recs=mysqli_num_rows($res_check);
	if($check_recs>0)
		{
			header("location:signup.php?name=Change your username  its already taken.");	
		}
	else{
		
		$query_check="SELECT * from user WHERE u_email='$email'";
	$res_check=mysqli_query($connection, $query_check);
	$check_recs=mysqli_num_rows($res_check);
	if($check_recs>0)
		{
			header("location:signup.php?name=Your email address already exists.");	
		}
	else{
								$query="INSERT INTO user (id,f_name,l_name,u_email,u_hash,username) VALUES 								(null, '$firstname','$lastname','$email','$pass','$username')";
	
								$queryInsertion=mysqli_query($connection, $query);
								if($queryInsertion)
								{
									header("location:thanks.php?");
									exit;
								}
										else
											{
												echo mysqli_error($connection);
											// header("location:signup.php?msg=Something went wrong please try again");
											exit;
											}
	
}
}
}
?>