<?php
/**
 *
 * @author Daniel Martinez Colomer
 */
// Motor
 $cfg["dbMotor"] = MYSQL;

 // Fichero SQLITE
 $cfg["sqliteDatabase"] = "/tmp/db.sqlite5";
 
 // Parametros MySQL
 $cfg["mysqlHost"]     = "lamp-docker-mysql-1";
 $cfg["mysqlUser"]     = "lamp_user";
 $cfg["mysqlPassword"] = "lamp_password";
 $cfg["mysqlDatabase"] = "lamp_db";

 // Otros
$cfg["tablaPersonasTamNombre"]    = 40;
$cfg["tablaPersonasTamApellidos"] = 60;