<?php
session_start();

$nameError = $passError = "";
$name = $psw = "";
$complete = false;

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

   if(isset($_POST['submit'])){
	
	if(empty($_POST["name"])){
		$nameError = "Name is required";
	} else {
		$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$nameError = "Only letters and white space allowed";
		}
	}
	
    if(empty($_POST["psw"])){
		$passError = " Please enter your password";
	} else {
		$name = test_input($_POST["psw"]);
		 if(strlen(trim($psw)) > 8) {
        $passError ="Password must be 8 characters";
		 }
     }
	 
	 if($nameError == "" && $passError == ""){
       $_SESSION["name"] = $_POST["name"];
       $_SESSION["psw"] = $_POST["psw"];
       $name = $psw ="";
       $complete = true;	
	 }	
   }	 
?>


<!DOCTYPE html>
<html>
<head>
<title>Sessions</title>
<style>
.error{
	color: red;
}
</style>
</head>
<body>
<form action="" method="post">
<h2>Form</h2>
Name:
<input name="name" type="text" value="<?php echo $name; ?>">
<span class="error"> <?php echo $nameError;?></span>
<br>
Password:
<input name="psw" type="password" value="<?php echo $psw; ?>">
<span class="error"> <?php echo $passError;?></span>
<br>
<input class="submit" name="submit" type="submit" value="Submit">
</form>
</body>
</html>

<?php 
   if($complete){ 
	echo "Thank You for Submission.";	
header ("Location: http://localhost/profile.php"); 
die();
}
?>