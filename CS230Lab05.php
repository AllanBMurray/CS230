<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>CS230 Lab05 - Allan Murray</title>
<style>
//body { background: rgba(0,0,0,0.3);}
</style>

<script>
//alert('hi')
</script>
</head>
<body>


  <h1>CS230 Lab05 - Allan Murray</h1>

  <p>Version 1.0</p>
  <button onclick="submitData()">Submit Data</button>
 <?php

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
ID: <input type="number" name="id" id="id"><br>
Creator: <input type="text" name="creator" id="creator"><br>
Title: <input type="text" name="title" id="title"><br>
Type: <input type="text" name="type" id="type"><br>
Identifier: <input type="text" name="identifier" id="identifier"><br>
Date: <input type="date" name="date" id="date"><br>

<div class="cClearFloat cInputSpace cRadioAdmin">
Language: <label><input type="radio" name="language" id="language" value="English" checked>English</label>
          <label><input type="radio" name="language" id="language" value="French">French </label>
          <label><input type="radio" name="language" id="language" value="German">German</label>
          <label><input type="radio" name="language" id="language" value="Italian">Italian</label>
<div class="cClearFloat cButtonsUser">
Description: <input type="text" name="description" id="description"><br>
<input type="submit" name="addBook" id="addBook" value="Submit Book Information"><br>
</form>

<hr>
<?php
  $creator = $title = $type = $identifier = $language = $description = "";
  $id = 0;
  $date = date('m/d/Y');

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Creator</th><th>Title</th><th>Type</th><th>Identifier</th><th>Date</th><th>Language</th><th>Description</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM eBook_MetaData");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

if(isset($_POST['addBook'])){

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = test_input($_POST["id"]); 
    $creator = test_input($_POST["creator"]); 
    $title = test_input($_POST["title"]); 
    $type = test_input($_POST["type"]); 
    $identifier = test_input($_POST["identifier"]); 
    $date = test_input($_POST["date"]); 
    $language = test_input($_POST["language"]);  
    $description = test_input($_POST["description"]);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mysql";

    //echo "Hello World";
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,     $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO eBook_MetaData (creator, title, type, identifier, date, language, description)
      VALUES ($creator, $title, $type, $identifier, $date, $language, $description)";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "New record created successfully";
    }
    catch(PDOException $e){
      echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
  
	


  }

  echo"<h2>Input values:</h2>";
  echo $id;
  echo "<br>";
  echo $creator;
  echo "<br>";
  echo $title;
  echo "<br>";
  echo $type;
  echo "<br>";
  echo $identifier;
  echo "<br>";
  echo $date;
  echo "<br>";
  echo $language;
  echo "<br>";
  echo $description;
  echo "<br>";
}

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return ("'$data'"); //adds single quotations for database entry.
    }
?>

<h2>Book Database</h2>

</body>
</html>
