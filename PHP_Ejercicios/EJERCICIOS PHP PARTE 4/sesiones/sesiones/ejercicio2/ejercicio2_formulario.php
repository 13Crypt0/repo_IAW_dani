<?php
session_name("ejercicio2");
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Formulario Texto 2 (Formulario).
    Sesiones (1). Sesiones.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../mclibre-php-ejercicios.css" title="Color">
</head>

<body>
  <h1>Formulario Texto 2 (Formulario)</h1>

<?php

if (isset($_SESSION["texto"])) {
  echo "<p>El texto es: <b>$_SESSION[texto]</b></p>\n";
}
?>

  <form action="ejercicio2_recogida.php" method="get">
    <p>
      <label>
        Escriba texto:
        <input type="text" name="texto" size="20" maxlength="20">
      </label>
    </p>

    <p>
      <input type="submit" value="Guardar">
      <input type="reset">
    </p>
  </form>

  <footer>
    <p>Daniel Martinez Colomer</p>
  </footer>
</body>
</html>
