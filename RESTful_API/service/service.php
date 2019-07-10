<?php
//this code is adapted from: https://www.leaseweb.com/labs/2015/10/creating-a-simple-rest-api-in-php/ 


// get the HTTP method, path and body of the request
//****************************************************************************
//explode breaks a string into an array. explode(seperator, string)
//$method is defined for SQL "translation" below.
//
//file_get_contents gets the contents of a file and presents them as a string.
//
//json_decode: Takes a JSON encoded string and converts it into a PHP variable. 
//Second parameter: When TRUE, returned objects will be converted into associative arrays.
//trim: Remove characters from both sides of a string. trim(string, text to be removed)
//The first item in the request array is the table name, set as $table below.
//The second item is the key.
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

$testInput = file_get_contents('php://input');
 
// connect to the mysql database
$link = mysqli_connect('localhost', 'root', '', 'ReadingList');
mysqli_set_charset($link,'utf8');
 
// retrieve the table, key and name from the path
//*******************************************************************************
//preg_replace is to perform a regular expression search and replace.
//preg_replace(pattern to search for and remove, text to add in, string to search and edit)
//
//array_shift: Remove the first element from an array, and return the value of the removed element.
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$key = array_shift($request)+0;
$sname = array_shift($request);

// escape the columns and values from the input object
//********************************************************************************
//The array_keys() function returns an array containing the keys of the json file created
//from the php://input file.
//The array_values() function returns an array containing all the values of an array.
//
//The array_map() function sends each value of an array to a user-made function, 
//and returns an array with new values, given by the user-made function.
//$value is "temp" variable. array_values($input) is the starting array.
//
//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.

//if statement as this code isn't applicable to GET and DELETE
if ($method != 'GET' && $method != 'DELETE') {
  $columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
  $values = array_map(function ($value) use ($link) {
    if ($value===null) return null;
    return mysqli_real_escape_string($link,(string)$value);
  },array_values($input));
	 
// build the SET part of the SQL command for POST and PUT methods
  $set = '';
  for ($i=0;$i<count($columns);$i++) {
    $set.=($i>0?',':'').'`'.$columns[$i].'`=';
    $set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
    }
}
// create SQL based on HTTP method. Two GET options based on key and on name.
switch ($method) {
  case 'GET':
    if ($sname == "0"){
    $sql = "select * from `$table`".($key?" WHERE id=$key":" WHERE id=0");
    }
    else if ($key == "0"){
    $sql = "select * from `$table`".($sname?" WHERE name LIKE '%$sname%'":'');
    } 
    break;
  case 'PUT':
    $sql = "update `$table` set $set where id=$key"; break;
  case 'POST':
    $sql = "insert into `$table` set $set"; break;
  case 'DELETE':
    $sql = "delete from `$table` where id=$key"; break;
}

//echo $sql;
// excecute SQL statement
$result = mysqli_query($link,$sql);
 
// die if SQL statement failed
if (!$result) {
  http_response_code(404);
  die(mysqli_error());
}
 
// print results, insert id or affected row count
if ($method == 'GET') {
  if (!$key) echo '[';
  for ($i=0;$i<mysqli_num_rows($result);$i++) {
    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
  }
  if (!$key) echo ']';
} elseif ($method == 'POST') {
  echo mysqli_insert_id($link);
} elseif ($method != 'DELETE') {
  echo mysqli_affected_rows($link);
}

// close mysql connection
mysqli_close($link);
?>
