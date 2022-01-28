<?php
$host = "localhost";
$user = "root";
$port = 3306;
$password = "0000";
$database = "recruitment";

$connect = mysqli_connect($host, $user, $password, $database, $port);
if (mysqli_connect_error()) {
    die("cannot connect to db " . mysqli_connect_error());
} else {
    echo "db connected";
}
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>

</body>

</html>

<?php
mysqli_close($connect);
?>