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
  <title>SQLite (3). PDO. Ejercicios (bases de datos). Daniel Martinez Colomer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-proyectos.css" title="Color">
</head>

<body>
  <h1>PDO 3 - SQLite: programa con biblioteca</h1>

  <main>
<?php

include "biblioteca.php";

$pdo = conectaDb();
borraTodo();
insertaRegistro('Daniel', 'Martinez');
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
