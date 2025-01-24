<?php
/**
 *
 * @author Daniel Martinez Colomer
 */

// Variables configurables por el administrador de la aplicación

$cfg["mysqlHost"]     = "lamp-docker-mysql-1";
$cfg["mysqlUser"]     = "lamp_user";
$cfg["mysqlPassword"] = "lamp_password";
$cfg["mysqlDatabase"] = "lamp_db";

// Variables configurables por el programador de la aplicación

$cfg["tablaPersonas"] = "personas";
$cfg["tablaPersonasTamNombre"]    = 40;
$cfg["tablaPersonasTamApellidos"] = 60;