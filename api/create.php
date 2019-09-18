<?php
include('../config/db-connect.php');

$postBody = file_get_contents("php://input");
$postBody = json_decode($postBody);

$name = mysqli_real_escape_string($conn, $postBody->name);
$surname = mysqli_real_escape_string($conn, $postBody->surname);
$email = mysqli_real_escape_string($conn, $postBody->email);

$query = "INSERT INTO test_table(name, surname, email) VALUES('$name', '$surname', '$email')";

if (mysqli_query($conn, $query)) {
    echo (json_encode($postBody));
} else {
    echo 'Could not insert into table ' . mysqli_error($conn);
}
