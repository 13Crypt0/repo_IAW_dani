<?php
/**
 *
 * @author Escriba aquí su nombre
 */

// Variables configurables por el administrador de la aplicación

include "config.php";

// FUNCIONES ESPECÍFICAS DE LA BASE DE DATOS MYSQL

// MYSQL: FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS

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
    } finally {
        $tmp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $tmp;
    }
}

// MYSQL: FUNCIÓN DE BORRADO Y CREACIÓN DE TABLA

function borraTodo()
{
    print "  <p class=\"aviso\">Ejercicio incompleto</p>\n";
}

// FUNCIÓN DE INSERCIÓN DE REGISTRO

function insertaRegistro($nombre, $apellidos)
{
    print "  <p class=\"aviso\">Ejercicio incompleto</p>\n";
}

// FUNCIÓN DE CONTEO DE REGISTROS

function cuentaRegistros()
{
    print "  <p class=\"aviso\">Ejercicio incompleto</p>\n";
}

// FUNCIÓN DE SELECCIÓN DE TODOS LOS REGISTROS

function muestraRegistros()
{
    print "  <p class=\"aviso\">Ejercicio incompleto</p>\n";
}

// FUNCIÓN DE MODIFICACIÓN DE REGISTRO

function modificaRegistro($id, $nombre, $apellidos)
{
    print "  <p class=\"aviso\">Ejercicio incompleto</p>\n";
}

// FUNCIÓN DE BORRADO DE REGISTROS

function borraRegistros($id)
{
    print "  <p class=\"aviso\">Ejercicio incompleto</p>\n";
}
