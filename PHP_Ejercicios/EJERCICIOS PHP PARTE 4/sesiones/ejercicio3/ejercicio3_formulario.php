<?php

session_name("ejercicio3");
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Formulario Palabra en mayúsculas (Formulario).
    Sesiones (1). Sesiones.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../mclibre-php-ejercicios.css" title="Color">
</head>

<body>
  <h1>Formulario Palabra en mayúsculas (Formulario)</h1>

  <form action="ejercicio3_recogida.php" method="get">

<?php

if (isset($_SESSION["mensaje"])) {
  echo "<p style='color:red' >$_SESSION[mensaje]</p>\n";
} else {
  echo "<p>El texto es: <b>" . $_SESSION['palabra'] . "</b></p>\n";
}



print "\n";
print "    <p>\n";
print "      <label>\n";
print "        Escriba una palabra en mayúsculas:\n";
print "        <input type=\"text\" name=\"palabra\" size=\"20\" maxlength=\"20\">\n";
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
