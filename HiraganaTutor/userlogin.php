
<?php

$input = json_decode(file_get_contents('php://input'),true);

$username = $input["username"];
$password = $input["password"];

$link = mysqli_connect('localhost', 'root', '', 'mysql');
$table = 'hiragana_db';
$sql = "SELECT * FROM `$table` WHERE username = '$username' AND password = '$password';";

$result = mysqli_query($link,$sql);

if (!$result) {
    http_response_code(404);
    die(mysqli_error($link));
}

echo json_encode($result->fetch_object());

mysqli_close($link);        

?>