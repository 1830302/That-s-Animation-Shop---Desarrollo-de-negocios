<?php
// Configuraciones de Base de Datos.
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'thats');
define('DB_PORT', 3306);
date_default_timezone_set('America/Mexico_City');


function getPDO() {
    $host = DB_SERVER;
    $dbname = DB_DATABASE;
    $port = DB_PORT;
    $connStr =  "mysql:host={$host};dbname={$dbname};port={$port}";
    $dbOpt = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    );
    return new PDO($connStr, DB_USER, DB_PASSWORD, $dbOpt);
}
