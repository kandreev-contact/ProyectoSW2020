<?php

session_start();

if (isset($_SESSION['correo'])) {
    if ($_SESSION['correo'] != "admin@ehu.es") {
        echo "<script> 
                    alert('Debes iniciar sesion como admin');
                    window.location.href='Layout.php';
                </script>";
    }
} else {
    echo "<script> 
                    alert('Debes iniciar sesion como admin');
                    window.location.href='Layout.php';
            </script>";
}

if (isset($_REQUEST['dirCorreo'])) {
    include 'DbConfig.php';
    
    $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
    if (!$mysqli) {
        die("Fallo al conectar con Mysql: " . mysqli_connect_error());
    }
    $email = $_REQUEST['dirCorreo'];
    if ($email != 'admin@ehu.es') {
        $sql = "Delete FROM usuarios WHERE email=\"" . $email . "\" ;";
        echo $sql;
        $resultado = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
        if (!$resultado) {
            die("Error: " . mysqli_error($mysqli));
        }
        
        echo "<script>
                    
                    alert('Usuario alterado.');
                    window.location.href='HandlingAccounts.php';
                    </script>";
        
    } else {
        echo "<script> alert('No sera tan facil jejeje, prueba de otra forma');
                    window.location.href='LogOut.php';
                    </script>";
    }
}


?> 