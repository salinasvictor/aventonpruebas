<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $db="agenda";
    $opcion=$_GET["opcion"];
    $server="localhost";
    $userdb="root";
    $pass="";

    switch($opcion){
        case "login":
            $usuario=$_GET["usuario"];
            $password=$_GET["password"];
            $conn=mysqli_connect($server, $userdb, $pass, $db);
            $sql="SELECT id_usuario, nombre FROM usuario WHERE usuario='$usuario' AND password=MD5('$password')";
            if($conn->connect_error){
                $response["error"]=1;
                $response["mensaje"]=$conn->error;
            }else{
                $data=$conn->query($sql);
                if($data->num_rows>0){
                    $response["error"]=0;
                    session_start();
                    $row=$data->fetch_assoc();
                    $_SESSION["nombre"]=$row["nombre"];
                    $_SESSION["id_usuario"]=$row["id_usuario"];
                    $response["nombre"]=$row["nombre"];
                }else{
                    $response["error"]=1;
                    $response["mensaje"]="Usuario o contraseña incorrecto";
                }
                $conn->close();
            }
            case 'ingresar':
                $nombre=$_GET["nombre"];
                $usuario=$_GET["usuario"];
                $password=$_GET["password"];
                $conn=mysqli_connect($server, $userdb, $pass, $db);
                if($conn->connect_error){
                    $response["error"]=1;
                    $response["mensaje"]=$conn->error;
                }else{
                    $conn->query("INSERT INTO usuario (nombre, usuario, password) values ('$nombre', '$usuario', MD5('$password'))");
                    $response["mensaje"]="bien";
                    $conn->close();
                }
                echo json_encode($response);
            
            break;
            default:
            $response["error"]=1;
            $response["mensaje"]="opcion invalida";
            echo json_encode($response);
            break;
            }
            }

?>