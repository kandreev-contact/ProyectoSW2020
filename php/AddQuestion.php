<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      Código PHP para añadir una pregunta sin imagen
      <?php
      // Realizar conexion php
      $mysqli = mysqli_connect("localhost", "root", "", "quiz");
      if (!$mysqli) {
        die("Fallo al conectar a MySQL: " . mysqli_connect_error());
      }
      echo 'Connection OK';
      // Cerrar conexión
      mysqli_close($mysqli);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>