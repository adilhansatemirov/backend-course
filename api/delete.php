<?php
include('../config/db-connect.php');

$postBody = file_get_contents("php://input");
$postBody = json_decode($postBody);

$id = mysqli_real_escape_string($conn, $postBody->id);

$query = "DELETE FROM test_table WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    echo "Delete success";
} else {
    echo 'Could not delete from table ' . mysqli_error($conn);
}
