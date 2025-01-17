<?php

session_name("ejercicio4");
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
  Formulario Palabras en mayúsculas y minúsculas (Formulario).
    Sesiones (1). Sesiones.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../mclibre-php-ejercicios.css" title="Color">
</head>

<body>
  <h1>Formulario Palabras en mayúsculas y minúsculas (Formulario)</h1>

  <form action="ejercicio4_recogida.php" method="get">

<?php



  print "\n";
print "    <p>Escriba una palabra en mayúsculas y otra en minúsculas:</p>\n";
print "\n";
print "    <p>\n";
print "      <label>\n";
print "        Mayúsculas:\n";

print "        <input type=\"text\" name=\"mayusculas\" size=\"20\" maxlength=\"20\">";
    if (isset($_SESSION["mensaje_mayus"])) {
        echo "<p style='color:red' >$_SESSION[mensaje_mayus]</p>\n";
    } else {
        echo "<p>El texto es: <b>" . $_SESSION['palabra_mayus'] . "</b></p>\n";
    }
print "      </label>\n";
print "    </p>\n";
print "<p>---------------------------------------------<p>\n";
print "    <p>\n";
print "      <label>\n";
print "        Minúsculas:\n";
print "        <input type=\"text\" name=\"minusculas\" size=\"20\" maxlength=\"20\">\n";
    if (isset($_SESSION["mensaje_minus"])) {
        echo "<p style='color:red' >$_SESSION[mensaje_minus]</p>\n";
    } else {
        echo "<p>El texto es: <b>" . $_SESSION['palabra_minus'] . "</b></p>\n";
    }
print "      </label>\n";
print "    </p>\n";
print "\n";

?>
    <p>
      <input type="submit" value="Comprobar">
      <input type="reset">
    </p>
  </form>

  <footer>
    <p>Daniel Martinez Colomer</p>
  </footer>
</body>
</html>
