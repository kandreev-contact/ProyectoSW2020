<?php
session_start();

if (isset($_SESSION['correo'])) {
    if ($_SESSION['correo'] == "admin@ehu.es") {
        echo
            "<script> 
					alert('Debes de iniciar sesion como usuario');
                    window.location.href='Layout.php';
				</script>";
    }
} else {
    echo
        "<script> 
      alert('Debes de iniciar sesion como usuario');
      window.location.href = 'Layout.php';
    </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
  <style>
    .table_Questions {
      margin: auto;
      border-collapse: collapse;
      text-align: center;
    }

    td,
    th {
      padding: 5px;
    }

    th {
      background-color: #dbd2c3;
    }

    #div1 {
      overflow: scroll;
      height: 100%;
      width: 100%;
    }

    #div1 table {
      width: 95%;
      background-color: lightgray;
    }
  </style>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div id="div1">
      <!--Código PHP para mostrar una tabla con las preguntas de la BD.<br/> La tabla incluye las imágenes de la BD.-->
      <?php
      //Creamos la conexion con la BD.
      $link = mysqli_connect($server, $user, $pass, $basededatos);
      if (!$link) {
        die("Fallo al conectar con la base de datos: " . mysqli_connect_error());
      }
      // Operar con la BD
      $sql = "SELECT * FROM preguntas;";
      $resul = mysqli_query($link, $sql);
      echo '<table border="1px" class="table_Questions"><tr><th>AUTOR</th><th>ENUNCIADO</th><th>RESPUESTA CORRECTA</th><th>RESPUESTA INCORRECTA 1</th> <th>RESPUESTA INCORRECTA 2</th><th>RESPUESTA INCORRECTA 3</th><th>COMPLEJIDAD</th><th>TEMA</th><th>IMAGEN</th></tr>';
      while ($row = mysqli_fetch_array($resul)) {
        echo "<tr><td><a href=\"mailto:" . $row['email'] . "\">" . $row['email'] . "</a></td><td>" . $row['enunciado'] . "</td><td>" . $row['respuestac'] . "</td><td>" . $row['respuestai1'] . "</td><td>" . $row['respuestai2'] . "</td><td>" . $row['respuestai3'] . "</td><td>" . $row['complejidad'] . "</td><td>" . $row['tema'] . "</td><td><img width=\"150\" height=\"150\" src=\"data:image/*;base64, " . $row['imagen'] . "\" alt=\"Sin imagen relacionada\"/></td></tr>";
      }
      echo "</table>";
      mysqli_close($link);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>