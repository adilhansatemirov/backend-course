<?php
$conn = mysqli_connect('localhost', 'adilhansatemirov', 'test1234', 'test');

if (!$conn) {
    echo "Database connection error " . mysqli_connect_error($conn);
}
