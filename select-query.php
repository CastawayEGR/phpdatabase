<?php
/* Attempt MariaDB server connection. Assuming you are running MariaDB
server with default setting (user 'root' with no password) */
$dbhost = getenv("MARIADB_SERVICE_HOST");
$dbport = getenv("MARIADB_SERVICE_PORT");
$dbuser = getenv("dbuser");
$dbpwd = getenv("dbpassword");
$dbname = getenv("dbname");

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);

// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM persons";
if($result = mysqli_query($connection, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}

// Close connection
mysqli_close($connection);
?>
