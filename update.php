<?php
    $table_name = $_GET['table'];
    $row_id = $_GET['id'];
    $statement = "UPDATE ski_verleih.$table_name SET ";
    foreach($_POST as $key => $value) {
        $statement .= "$key='$value', ";
    }
    $statement = rtrim($statement, ", "); # we need to remove the last comma from our statement
    $statement .= " WHERE id=$row_id;";
    
    $services = require 'services.php';
    $db = $services['database'];
    $db->query($statement);

    header("Location: http://localhost:3000/Sites/list_$table_name.php");
?>