<?php
    session_start();

    include 'DbConfig.php';

    if (isset($_SESSION['correo'])) {
        if ($_SESSION['correo'] != "admin@ehu.es") {
            echo "<script> alert('Debes iniciar sesion como admin'); window.location.href='Layout.php'; </script>";
        }
    } else {
        echo "<script> alert('Debes iniciar sesion como admin'); window.location.href='Layout.php'; </script>";
    }

    if(isset($_REQUEST['dirCorreo'])){
    //Creamos la conexion con la BD.
    $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
    if(!$mysqli)
    {
        die("Fallo al conectar a MySQL: " .mysqli_connect_error());
    }
    //Creamos la consulta que introducira los datos en el servidor
    $correo = $_REQUEST['dirCorreo'];
    if ($correo != 'admin@ehu.es') {
	$sql = "SELECT estado FROM usuarios WHERE email=\"".$correo."\";";
    $resultado = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
    if(!$resultado){
        die("Error: ".mysqli_error($mysqli));
    }
	$row = mysqli_fetch_array($resultado);
    if($row['estado']=="Activo")
		$upd = "Update usuarios SET estado = 'Bloqueado' WHERE email ='".$correo."';";
	else 
		$upd = "Update usuarios SET estado = 'Activo' WHERE email ='".$correo."';";
	
    mysqli_close($mysqli);
	$mysqli = mysqli_connect($server,$user,$pass,$basededatos);
	if(!$mysqli)
    {
        die("Fallo al conectar a MySQL: " .mysqli_connect_error());
    }
	$update = mysqli_query($mysqli,$upd,MYSQLI_USE_RESULT);
    if(!$update)
    {
        die("Error: " .mysqli_error($mysqli));
    }
	mysqli_close($mysqli);
	 echo "<script>
					
                    alert('Usuario alterado');
                    window.location.href='HandlingAccounts.php';
                    </script>";  
}else{
    echo "<script> alert('No sera tan facil jejeje, prueba de otra forma');
    window.location.href='LogOut.php';
    </script>";
}
	
}			
?>
