<?php
$conn = new mysqli('localhost','root','','aventon');
$nombre= $_POST['nombre'];
$correo= $_POST['correo'];
$password= $_POST['password'];
$carrera= $_POST['carrera'];
$matricula= $_POST['matricula'];
$numero= $_POST['numero'];
    // Database connection

    
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		echo "Connected successfully";
		
		$sql =("INSERT INTO aventado (nombre, correo, password, carrera, matricula, numero) VALUES ('$nombre', '$correo', '$password', '$carrera', '$matricula', '$numero')");
		
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
			header("Location: http://localhost/proyecto/pagina/aventado.html");
			exit();
	  } else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	  }
	}

	
?> 