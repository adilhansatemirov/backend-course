<?php
include('../config/db-connect.php');
header('Content-Type: application/json');

$postBody = file_get_contents("php://input");
$postBody = json_decode($postBody);

$email = mysqli_real_escape_string($conn, $postBody->email);
$password = mysqli_real_escape_string($conn, $postBody->password);

$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $query);

$data = mysqli_fetch_assoc($result);

if ($data) {
    session_start();
    $_SESSION['user_id'] = $data['id'];
    echo json_encode($data);
} else {
    header("HTTP/1.0 404 Not Found");
}

mysqli_free_result($result);
mysqli_close($conn);
