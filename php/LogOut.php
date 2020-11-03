
<html>
<head>
  <?php include '../html/Head.html'?>
  <style>
    .error {
        color: darkred;
    }
    .success {
        color: darkgreen;
    }
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
        <?php
          echo "<p class=\"success\">Hasta pronto<p><br/>";
          echo "<span><a href='Layout.php'>Ir al inicio</a></span>";
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

