<?php
/**
 *
 * @author Daniel Martinez Colomer
 */

// FUNCIONES ESPECÍFICAS DE LA BASE DE DATOS MYSQL

include "config.php";


// CONEXION BASE DE DATOS

function conectaDb()
{
    global $cfg;

    try {
        $tmp = new PDO("mysql:host=$cfg[mysqlHost];dbname=$cfg[mysqlDatabase];charset=utf8mb4", $cfg["mysqlUser"], $cfg["mysqlPassword"]);
    } catch (PDOException $e) {
        $tmp = new PDO("mysql:host=$cfg[mysqlHost];charset=utf8mb4", $cfg["mysqlUser"], $cfg["mysqlPassword"]);
    } catch (PDOException $e) {
        print "    <p class=\"aviso\">Error: No puede conectarse con la base de datos. {$e->getMessage()}</p>\n";
        exit;
    }finally {
        $tmp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $tmp;
    }
}

// MYSQL: FUNCIÓN DE BORRADO Y CREACIÓN DE TABLA


function borraTodo()
{
    global $pdo, $cfg;

    $consulta = "DROP DATABASE IF EXISTS $cfg[mysqlDatabase]";

    if (!$pdo->query($consulta)) {
        print "    <p class=\"aviso\">Error al borrar la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "    <p>Base de datos borrada correctamente (si existía).</p>\n";
    }
    print "\n";

    $consulta = "CREATE DATABASE $cfg[mysqlDatabase]
                 CHARACTER SET utf8mb4
                 COLLATE utf8mb4_unicode_ci";

    if (!$pdo->query($consulta)) {
        print "    <p class=\"aviso\">Error al crear la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "    <p>Base de datos creada correctamente.</p>\n";
        print "\n";

        $consulta = "USE $cfg[mysqlDatabase]";

        if (!$pdo->query($consulta)) {
            print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        } else {
            print "    <p>Base de datos seleccionada correctamente.</p>\n";
            print "\n";

            $consulta = "CREATE TABLE $cfg[tablaPersonas] (
                         id INTEGER UNSIGNED AUTO_INCREMENT,
                         nombre VARCHAR($cfg[tablaPersonasTamNombre]),
                         apellidos VARCHAR($cfg[tablaPersonasTamApellidos]),
                         PRIMARY KEY(id)
                         )";

            if (!$pdo->query($consulta)) {
                print "    <p class=\"aviso\">Error al crear la tabla. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } else {
                print "    <p>Tabla creada correctamente.</p>\n";
            }
        }
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
            print "\n";
        }
    }
}