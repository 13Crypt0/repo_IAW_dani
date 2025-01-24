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
  <title>SQLite (2). PDO. Ejercicios (bases de datos). Escriba aquí su nombre</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-proyectos.css" title="Color">
</head>

<body>
  <h1>PDO 2 - SQLite: programa con funciones</h1>

   <main>
<?php

// SQLITE: FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS

function conectaDb()
{
  global $cfg;
  try {
    $tmp = new PDO("sqlite:$cfg[sqliteDatabase]");
    $tmp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $tmp->query("PRAGMA foreign_keys = ON");
    $tmp->query("PRAGMA encoding = 'UTF-8'");
    return $tmp;
} catch (PDOException $e) {
    print "<p class=\"aviso\">Error: No puede conectarse con la base de datos. {$e->getMessage()}</p>\n";
    exit;
  }  
}

// FUNCIÓN DE BORRADO Y CREACIÓN DE TABLA

function borraTodo()
{
  global $cfg, $pdo;
  $consulta = "DROP TABLE IF EXISTS $cfg[tablaPersonas]";

  if (!$pdo->query($consulta)) {
      print "<p class=\"aviso\">Error al borrar la tabla. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
  } else {
      print "<p>Tabla borrada correctamente (si existía).</p>\n";
  }
    print "\n";
  
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
}

// FUNCIÓN DE INSERCIÓN DE REGISTRO

function insertaRegistro($nombre, $apellidos)
{
  global $cfg, $pdo;
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
}

// FUNCIÓN DE CONTEO DE REGISTROS

function cuentaRegistros()
{
  global $cfg, $pdo;
  $consulta  = "SELECT COUNT(*) FROM $cfg[tablaPersonas]";

  $resultado = $pdo->query($consulta);
  if (!$resultado) {
      print "<p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
  } else {
      print "<p>La tabla contiene {$resultado->fetchColumn()} registro(s).</p>\n";
  }
}

// FUNCIÓN DE SELECCIÓN DE TODOS LOS REGISTROS

function muestraRegistros()
{
  global $cfg, $pdo;
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
}
// FUNCIÓN DE MODIFICACIÓN DE REGISTRO

function modificaRegistro($id, $nombre, $apellidos)
{
  global $cfg, $pdo;
  $consulta = "UPDATE $cfg[tablaPersonas]
              SET nombre=:nombre, apellidos=:apellidos
              WHERE id=:id";

  $resultado = $pdo->prepare($consulta);
    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos, ":id" => $id])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      print "    <p>Registro modificado correctamente.</p>\n";
      print "\n";
    }
}

// FUNCIÓN DE BORRADO DE REGISTROS

function borraRegistros($id)
{
  global $cfg, $pdo;
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
    }
}
}

// Variables configurables por el administrador de la aplicación

$cfg["sqliteDatabase"] = "/tmp/db.sqlite2";

// Variables configurables por el programador de la aplicación

$cfg["tablaPersonas"] = "personas";           
$cfg["tablaPersonasTamNombre"]    = 40;
$cfg["tablaPersonasTamApellidos"] = 60;

//PROGRAMA

$pdo = conectaDb();
conectaDb();
borraTodo();
$nombre_user = "Daniel";
$apellidos_user = "Martinez";
insertaRegistro($nombre_user, $apellidos_user);
cuentaRegistros();
muestraRegistros();
$id_mod = 1;
$nombre_mod = "Dani";
$apellidos_mod = "Martinez";
modificaRegistro($id_mod, $nombre_mod, $apellidos_mod);
$id_borr = [1 => "on"];
borraRegistros($id_borr);
?>
  </main>

  <footer>
    <p>Daniel Martinez Colomer</p>
  </footer>
</body>
</html>
