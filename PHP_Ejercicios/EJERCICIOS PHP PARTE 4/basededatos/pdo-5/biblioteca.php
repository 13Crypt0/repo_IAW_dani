<?php
/**
 *
 * @author Daniel Martinez Colomer
 */

// Constantes configurables por el programador de la aplicación

define("SQLITE", 1);
define("MYSQL", 2);

// Variables configurables por el administrador de la aplicación

require_once "config.php";

// Variables configurables por el programador de la aplicación

$cfg["tablaPersonas"] = "personas";

// Carga Biblioteca específica de la base de datos utilizada

if ($cfg["dbMotor"] == SQLITE) {
    require_once "biblioteca-sqlite.php";
} elseif ($cfg["dbMotor"] == MYSQL) {
    require_once "biblioteca-mysql.php";
}

// Funciones comunes

// FUNCIÓN DE INSERCIÓN DE REGISTRO

function insertaRegistro($nombre, $apellidos)
{
    global $cfg, $pdo;
    $consulta = "INSERT INTO $cfg[tablaPersonas]
                (nombre, apellidos)
                VALUES (:nombre, :apellidos)";

    $resultado = $pdo->prepare($consulta);
    if (!$resultado) {
        print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos])) {
        print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "    <p>Registro creado correctamente.</p>\n";
        print "\n";
    }
}


// FUNCIÓN DE CONTEO DE REGISTROS

function cuentaRegistros()
{
    global $cfg, $pdo;
    $consulta = "SELECT COUNT(*) FROM $cfg[tablaPersonas]";

    $resultado = $pdo->query($consulta);
    if (!$resultado) {
        print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "    <p>La tabla contiene {$resultado->fetchColumn()} registro(s).</p>\n";
        print "\n";
    }
}

// FUNCIÓN DE SELECCIÓN DE TODOS LOS REGISTROS

function muestraRegistros()
{
    global $cfg, $pdo;
    $consulta = "SELECT * FROM $cfg[tablaPersonas]";

    $resultado = $pdo->query($consulta);
    if (!$resultado) {
        print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "    <p><strong>Registro(s) obtenido(s)</strong></p>\n";
        print "    <ul>\n";
        while ($registro = $resultado->fetch()) {
            print "      <li>$registro[id] - $registro[nombre] - $registro[apellidos]</li>\n";
            print "\n";
        }
        print "    </ul>\n";
        print "\n";
    }
}