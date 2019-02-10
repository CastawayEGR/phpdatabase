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

// Escape user inputs for security
$first_name = mysqli_real_escape_string($connection, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($connection, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($connection, $_REQUEST['email']);

// attempt insert query execution
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
if(mysqli_query($connection, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}

// close connection
mysqli_close($connection);
?>
