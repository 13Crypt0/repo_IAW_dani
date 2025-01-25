<?php
/**
 *
 * @author Daniel Martinez Colomer
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Configurable. PDO. Ejercicios (bases de datos). Daniel Martinez Colomer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-proyectos.css" title="Color">
</head>

<body>
  <h1>PDO 5 - Base de datos configurable: SQLite o MySQL</h1>

  <main>
<?php

require_once "biblioteca.php";
$pdo = conectaDb();
borraTodo();
insertaRegistro("Daniel", "Martinez");
cuentaRegistros();
muestraRegistros();
modificaRegistro('1', 'Dani', 'Martinez');
$id = [1 => "on"];
borraRegistros($id);

?>
  </main>

  <footer>
    <p>Daniel Martinez Colomer</p>
  </footer>
</body>
</html>
