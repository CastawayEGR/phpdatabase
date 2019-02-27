<?php
// MySQL connection settings
//$dbhost = getenv("MYSQL_SERVICE_HOST");
//$dbport = getenv("MYSQL_SERVICE_PORT");
//MariaDB connection settings
$dbhost = getenv("MARIADB_SERVICE_HOST");
$dbport = getenv("MARIADB_SERVICE_PORT");
$dbuser = getenv("dbuser");
$dbpwd = getenv("dbpassword");
$dbname = getenv("dbname");

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database %s \n", $dbhost);
    printf("---\n");
    printf("Database name: %s\n", $dbname);
    printf("---\n");
    printf("Database user: %s\n", $dbuser);
}
$connection->close();
?>
