<?php
/* Attempt MariaDB server connection. Assuming you are running MariaDB
server with default setting (user 'root' with no password) */

$dbhost = getenv("MARIADB_SERVICE_HOST");
$dbport = getenv("MARIADB_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);

// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt create table query execution
$sql = "CREATE TABLE persons(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE
)";
if(mysqli_query($connection, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}

// Close connection
mysqli_close($connection);
?>
