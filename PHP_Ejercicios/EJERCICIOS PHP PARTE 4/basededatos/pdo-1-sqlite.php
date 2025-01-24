<?php
/**
 * @author Daniel Martinez Colomer
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>SQLite (1). PDO. Ejercicios (bases de datos). Daniel Martinez Colomer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-proyectos.css" title="Color">
</head>

<body>
  <h1>PDO 1 - SQLite: programa único</h1>

  <main>
<?php

// PASO 1: Definir las opciones del programa

$cfg["sqliteDatabase"] = "/tmp/db.sqlite";

$cfg["tablaPersonas"] = "personas";           
$cfg["tablaPersonasTamNombre"]    = 40;
$cfg["tablaPersonasTamApellidos"] = 60;


// PASO 2: Crear el objeto PDO de conexión con la base de datos.

try {
    $pdo = new PDO("sqlite:$cfg[sqliteDatabase]");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $pdo->query("PRAGMA foreign_keys = ON");
    $pdo->query("PRAGMA encoding = 'UTF-8'");
} catch (PDOException $e) {
    print "<p class=\"aviso\">Error: No puede conectarse con la base de datos. {$e->getMessage()}</p>\n";
    exit;
}

// PASO 3: Borrar la tabla.

// CONSULTA DE BORRADO DE TABLA

$consulta = "DROP TABLE IF EXISTS $cfg[tablaPersonas]";

if (!$pdo->query($consulta)) {
    print "<p class=\"aviso\">Error al borrar la tabla. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p>Tabla borrada correctamente (si existía).</p>\n";
}
print "\n";

// PASO 4: Crear la tabla.

// SQLITE: CONSULTA DE CREACIÓN DE TABLA

$consulta = " CREATE TABLE $cfg[tablaPersonas] (
              id INTEGER PRIMARY KEY,
              nombre VARCHAR($cfg[tablaPersonasTamNombre]),
              apellidos VARCHAR($cfg[tablaPersonasTamApellidos])
              )";

if (!$pdo->query($consulta)) {
print "<p class=\"aviso\">Error al crear la tabla. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
print "<p>Tabla creada correctamente.</p>\n";
}
print "\n";

// PASO 5: Insertar un registro en la tabla.

$nombre    = "Daniel";
$apellidos = "Martinez";

//Como estos datos deberian venir de un formulario se indica :nombre, :apellido

$consulta = "INSERT INTO $cfg[tablaPersonas]
             (nombre, apellidos)
             VALUES (:nombre, :apellidos)";

$resultado = $pdo->prepare($consulta);
if (!$resultado) {
    print "p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} elseif (!$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos])) {
    print "<p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p>Registro creado correctamente.</p>\n";
    print "\n";
}

// PASO 6: Mostrar cuántos registros hay en la tabla.

$consulta  = "SELECT COUNT(*) FROM $cfg[tablaPersonas]";

$resultado = $pdo->query($consulta);
if (!$resultado) {
    print "<p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p>La tabla contiene {$resultado->fetchColumn()} registro(s).</p>\n";
}

// PASO 7: Mostrar los valores del registro guardado en la tabla.

$consulta  = "SELECT * FROM $cfg[tablaPersonas]";

$resultado = $pdo->query($consulta);
if (!$resultado) {
    print "<p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p><strong>Registro(s) obtenido(s)</strong></p>\n";
    print "<ul>\n";
    foreach ($resultado as $registro) {
        print "<li>$registro[id] - $registro[nombre] - $registro[apellidos]</li>\n";
    }
    print "</ul>\n";
    print "\n";
}

// PASO 8: Modificar el registro guardado en la tabla.

$id = 1;
$nombre    = "Dani";
$apellidos = "Martinez";

$consulta = "UPDATE $cfg[tablaPersonas]
             SET nombre=:nombre, apellidos=:apellidos
             WHERE id=:id";

$resultado = $pdo->prepare($consulta);
if (!$resultado) {
    print "<p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} elseif (!$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos, ":id" => $id])) {
    print "<p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p>Registro modificado correctamente.</p>\n";
    print "\n";
}

// PASO 9: Mostrar los valores del registro guardado en la tabla.

$consulta  = "SELECT * FROM $cfg[tablaPersonas]";

$resultado = $pdo->query($consulta);
if (!$resultado) {
    print "<p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p><strong>Registro(s) obtenido(s)</strong></p>\n";
    print "<ul>\n";
    foreach ($resultado as $registro) {
        print "<li>$registro[id] - $registro[nombre] - $registro[apellidos]</li>\n";
    }
    print "</ul>\n";
    print "\n";
}

// PASO 10: Insertar un segundo registro en la tabla.

$nombre    = "Pedro";
$apellidos = "Moreno";

$consulta = "INSERT INTO $cfg[tablaPersonas]
             (nombre, apellidos)
             VALUES (:nombre, :apellidos)";

$resultado = $pdo->prepare($consulta);
if (!$resultado) {
    print "<p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} elseif (!$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos])) {
    print "<p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p>Registro creado correctamente.</p>\n";
    print "\n";
}

// PASO 11: Mostrar cuántos registros hay en la tabla.

$consulta  = "SELECT COUNT(*) FROM $cfg[tablaPersonas]";

$resultado = $pdo->query($consulta);
if (!$resultado) {
    print "<p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p>La tabla contiene {$resultado->fetchColumn()} registro(s).</p>\n";
}

// PASO 12: Mostrar los valores de los dos registros guardados en la tabla.

$consulta  = "SELECT * FROM $cfg[tablaPersonas]";

$resultado = $pdo->query($consulta);
if (!$resultado) {
    print "<p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p><strong>Registro(s) obtenido(s)</strong></p>\n";
    print "<ul>\n";
    foreach ($resultado as $registro) {
        print "<li>$registro[id] - $registro[nombre] - $registro[apellidos]</li>\n";
    }
    print "</ul>\n";
    print "\n";
}

// PASO 13: Borrar el primer registro guardado en la tabla.

$id = [1 => "on"];

foreach ($id as $indice => $valor) {
    $consulta = "DELETE FROM $cfg[tablaPersonas]
                 WHERE id=:indice";

    $resultado = $pdo->prepare($consulta);
    if (!$resultado) {
        print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([":indice" => $indice])) {
        print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "    <p>Registro borrado correctamente (si existía).</p>\n";
        print "\n";
    }
}

// PASO 14: Mostrar los valores del registro guardado en la tabla.

$consulta  = "SELECT * FROM $cfg[tablaPersonas]";

$resultado = $pdo->query($consulta);
if (!$resultado) {
    print "<p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p><strong>Registro(s) obtenido(s)</strong></p>\n";
    print "<ul>\n";
    foreach ($resultado as $registro) {
        print "<li>$registro[id] - $registro[nombre] - $registro[apellidos]</li>\n";
    }
    print "</ul>\n";
    print "\n";
}

?>
  </main>

  <footer>
    <p>Daniel Martinez Colomer</p>
  </footer>
</body>
</html>
