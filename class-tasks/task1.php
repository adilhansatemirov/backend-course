<?php
// connect to database
$conn = mysqli_connect('localhost', 'adilhansatemirov', 'test1234', 'test');

// check connection
if ($conn) {
    echo "Successfully connected to database<br/>";
} else {
    echo "Couldn't connect to database error: " . mysqli_connect_error($conn);
}

$name = htmlspecialchars($_POST["name"]);

//  create query
$query = "SELECT * FROM test_table WHERE name='" . $name . "'";

//  get result
$result = mysqli_query($conn, $query);

//  save result
$user = mysqli_fetch_all($result, MYSQLI_ASSOC);

print_r($user[0]['email']);

//  free result from memory
mysqli_free_result($result);

//  close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="POST">
        <input type="text" name="name" id="name">
        <input type="submit" value="submit">
    </form>
</body>

</html>