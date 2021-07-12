
<?php
	if(isset($_POST["save"]))
{
	$motor1=$_POST['motor1'];
	$motor2=$_POST['motor2'];
	$motor3=$_POST['motor3'];
	$motor4=$_POST['motor4'];
	$motor5=$_POST['motor5'];
	$motor6=$_POST['motor6'];
	//DB Connection
	$conn = new mysqli('localhost','root','','Direction');
	if($conn->connect_error)
	{
		die('Failed'.$conn->connect->error);
	}
	else
	{
		$stmt = $conn->prepare("INSERT INTO `control` (`motor1`, `motor2`, `motor3`, `motor4`, `motor5`, `motor6`) 
        VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiii", $motor1, $motor2, $motor3, $motor4, $motor5, $motor6);
		$stmt->execute();
		echo"success";
		echo "</br>";  
		echo "motor1 = $motor1";
		echo "</br>";  
		echo "motor2 = $motor2";
		echo "</br>";  
		echo "motor3 = $motor3";
		echo "</br>";  
		echo "motor4 = $motor4";
		echo "</br>";  
		echo "motor5 = $motor5";
		echo "</br>";  
		echo "motor6 = $motor6";
	}
}
if(isset($_POST["On"]))
{
	$conn = new mysqli('localhost','root','','Direction');
	if($conn->connect_error)
	{
		echo "$conn->connect_error";
		die("Failed" .$conn->connect_error);
	} 
    else 
	{
	  $stmt = $conn->prepare("INSERT INTO `run` (`running`) Values (1)");
	  $stmt->execute();
	  echo "Robot Arm is ON!";
	}
}
?>