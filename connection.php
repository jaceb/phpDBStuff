<?php

$dbPassword = "jace";
$dbUserName = "Jace";
$dbServer = "localhost";
$dbName = "phpfundamentals";


$connection = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);

if($connection->connect_errno)
{
  exit( "db conncetion failed. Reason: ".$connection->connect_error);
}

$tempFirstName = "an author name";
$query = "SELECT first_name, last_name, pen_name FROM Authors WHERE first_name = ?";
statementObj = $connection->perpare($query);
//prepare lets it know we will be sending the values ldap_control_paged_result

$statementObj->bind_param("s", $tempFirstName);
//first param indicates the value type.  s for string. d for decimal or float, i for int

$statementObj->execute();

$statementObj->bind_result($firstName, $lastName, $penName);
$statementObj->store_result();

//$query = "DELETE FROM Authors WHERE id = 4";
//$query = "UPDATE Authors SET pen_name = 'a pen name' WHERE id = 2";
// $query = "INSERT INTO Authors (first_name, last_name, pen_name) VALUES ("john", "jacobs", "not john jacobs")";
// $query = "SELECT first_name, last_name, pen_name FROM Authors ORDER BY first_name";

$resultObj = $connection->query($query);
if($resultObj->num_rows > 0)
{
    while ($statementObj->fetch()) {
      # code...
    }
}

$connection->close();

$resultObj->close();
$connection->query($query);







 ?>
