<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
      Código PHP para añadir una pregunta sin imagen
      <br/>
      <?php
        // Realizar conexion php
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
        if (!$mysqli) {
          die("\nFallo al conectar a MySQL: " . mysqli_connect_error());
        }
        $email = "druskov001@iksale.ehu.es";
        $enunciado = "Quien creo esta pagina web?";
        $respuestac = "Konstantin y Daniel";
        $respuestai1 = "Elur y Asier";
        $respuestai2 = "Jorge y Mauri";
        $respuestai3 = "Se creo sola";
        $complejidad = "1";
        $tema = "Creditos.php";
        echo "\r\nConnection OK.";
        $sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema) VALUES('$email', '$enunciado', '$respuestac', '$respuestai1', '$respuestai2', '$respuestai3', $complejidad, '$tema')";
        if(!mysqli_query($mysqli, $sql)) {
          die("\nError: " . mysqli_error($mysqli));
        }
        echo "\r\nInsert OK.";
        // Cerrar conexión
        mysqli_close($mysqli);
        echo "\r\nClose OK.";
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>