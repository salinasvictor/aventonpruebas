<?php
$conn = new mysqli('localhost','root','','aventon');
$nombre= $_POST['nombre'];
$correo= $_POST['correo'];
$edad= $_POST['edad'];
$carrera= $_POST['carrera'];
$matricula= $_POST['matricula'];
$numero= $_POST['numero'];
$password= $_POST['password'];
$vehiculo= $_POST['vehiculo'];
    // Database connection

    
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		echo "Connected successfully";
		
		$sql =("INSERT INTO aventador (nombre, correo, edad, carrera, matricula, numero, password, vehiculo) VALUES('$nombre', '$correo', '$edad', '$carrera', '$matricula', '$numero', '$password', '$vehiculo')");
		
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
			header("Location: http://localhost/proyecto/pagina/aventador.html");
			exit();
	  } else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	  }
	}

	
?> 