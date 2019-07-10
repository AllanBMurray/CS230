
<?php

$input = json_decode(file_get_contents('php://input'),true);

$username = $input["username"];
$password = $input["password"];

$link = mysqli_connect('localhost', 'root', '', 'mysql');
$table = 'hiragana_db';
$sql = "INSERT INTO `$table` (`username`, `password`, `corrects`, `attempts`) VALUES ('$username','$password','0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0','0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0');";

$result = mysqli_query($link,$sql);

if (!$result) {
    http_response_code(404);
    die(mysqli_error($link));
}
mysqli_close($link);        

?>