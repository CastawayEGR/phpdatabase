<?php
// MySQL connection settings
//$dbhost = getenv("MYSQL_SERVICE_HOST");
//$dbport = getenv("MYSQL_SERVICE_PORT");
//MariaDB connection settings
$dbhost = getenv("MARIADB_SERVICE_HOST");
$dbport = getenv("MARIADB_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database %s\n", $dbhost);
}
$connection->close();
?>
