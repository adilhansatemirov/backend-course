<?php
include('../config/db-connect.php');

$postBody = file_get_contents("php://input");
$postBody = json_decode($postBody);

$id = mysqli_real_escape_string($conn, $postBody->id);
$name = mysqli_real_escape_string($conn, $postBody->name);
$surname = mysqli_real_escape_string($conn, $postBody->surname);
$email = mysqli_real_escape_string($conn, $postBody->email);

$query = "UPDATE test_table SET name = '$name', surname= '$surname', email='$email' WHERE id = '$id'";

if (mysqli_query($conn, $query)) {
    echo (json_encode($postBody));
} else {
    echo 'Could not update the table ' . mysqli_error($conn);
}
