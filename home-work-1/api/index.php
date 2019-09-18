<?php
// connect to database
include('../config/db-connect.php');
header('Content-Type: application/json');

$query = "SELECT * FROM test_table";

$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($data);

//  free result from memory
mysqli_free_result($result);

//  close connection
mysqli_close($conn);
