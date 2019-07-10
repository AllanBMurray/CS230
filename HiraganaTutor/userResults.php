
<?php

$input = json_decode(file_get_contents('php://input'),true);

$username = $input["username"];
$corrects = $input["corrects"];
$attempts = $input["attempts"];

$link = mysqli_connect('localhost', 'root', '', 'mysql');
$table = 'hiragana_db';
$sql = "UPDATE `$table` SET `corrects` = '$corrects', `attempts` = '$attempts' WHERE `$table`.`username` = '$username';";

echo $sql;

$result = mysqli_query($link,$sql);

if (!$result) {
    http_response_code(404);
    die(mysqli_error($link));
}
mysqli_close($link);        

?>