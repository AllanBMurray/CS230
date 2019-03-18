<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>CS230 Lab05 - Allan Murray</title>
<style>
.tg {
  border-collapse: collapse;
  border-spacing: 0;
}

.button-style {
  margin: auto;
  display: block;
  color: blue;
  background-color: grey;
  font-size: 16px;
  padding: 10px 10px;
  border-radius: 9px;
  border: 2px solid black;
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  cursor: pointer;
  float: left;
  margin-right: 5px;
}

.button-style:hover {
  background-color: darkgray;
}
</style>

<script>
myTable = document.getElementById('myTable');
function selectRow(){
//this function waits for a relevant cell to be clicked and then sends the cell or row to another function which highlights the cell or row.
myTable = document.getElementById('myTable');
tableCells = myTable.rows[0].cells.length;
/*
if (myTable) {
  for (z = 2; z < tableCells-1; z++) {
    myTable.rows[0].cells[z].onclick = function() {
      hlColumn(this); //sends clicked cell to highlight column function.
    };
  }
}*/
if (myTable) {
  for (y = 1; y < myTable.rows.length; y++) {
    for (z = 0; z < myTable.rows[0].cells.length; z++){
      myTable.rows[y].cells[z].onclick = function() {
        console.log(this.parentNode.rowIndex);
        hlRow(this.parentNode); //sends parentNode of the cell clicked. This is the row of the cell.
      };
    }  
  }
}
}

function hlRow(selCell) {
//all cell highlighting is firstly removed. Then all the cells in the row passed are highlighted. The rowToDelete value is set to the index of the row passed.
for (trhl = 0; trhl < myTable.rows.length; trhl++){
    for (tchl = 0; tchl < myTable.rows[0].cells.length; tchl++){
      myTable.rows[trhl].cells[tchl].style.borderWidth = "1px";
      myTable.rows[trhl].cells[tchl].style.borderColor = "black";
      myTable.rows[trhl].cells[tchl].style.backgroundColor = "white";
    }
  }
  for (hl = 0; hl < myTable.rows[0].cells.length; hl++){
    myTable.rows[selCell.rowIndex].cells[hl].style.borderWidth = "3px";
    myTable.rows[selCell.rowIndex].cells[hl].style.borderColor = "purple";
    myTable.rows[selCell.rowIndex].cells[hl].style.backgroundColor = "lightgrey";
  }
  rowToDelete = selCell.rowIndex;
  console.log(rowToDelete+"r1d");
  console.log(myTable.rows[selCell.rowIndex].cells[0].innerHTML);
  console.log(selCell);
  document.getElementById("updateid").value = myTable.rows[selCell.rowIndex].cells[0].innerHTML;
  document.getElementById("deleteid").value = myTable.rows[selCell.rowIndex].cells[0].innerHTML;
}

function deselectCells(){
//puts formatting of all cells back to normal including any selected cells. rowToDelete and cellToDelete both set to zero as nothing is now selected.
  for (trhl = 0; trhl < myTable.rows.length; trhl++){
    for (tchl = 0; tchl < myTable.rows[0].cells.length; tchl++){
      myTable.rows[trhl].cells[tchl].style.borderWidth = "1px";
      myTable.rows[trhl].cells[tchl].style.borderColor = "black";
    }
  }
  rowToDelete = 0;
  cellToDelete = 0;
}

//function to move contents of the row in the update section to hidden form prior to POST.
function populate(){
  console.log("populate function");
  myTable = document.getElementById('myUpdate');
  document.getElementById('uid').value = myUpdate.rows[1].cells[0].innerHTML;
  document.getElementById('ucreator').value = myUpdate.rows[1].cells[1].innerHTML;
  document.getElementById('utitle').value = myUpdate.rows[1].cells[2].innerHTML;
  document.getElementById('utype').value = myUpdate.rows[1].cells[3].innerHTML;
  document.getElementById('uidentifier').value = myUpdate.rows[1].cells[4].innerHTML;
  document.getElementById('udate').value = myUpdate.rows[1].cells[5].innerHTML;
  document.getElementById('ulanguage').value = myUpdate.rows[1].cells[6].innerHTML;
  document.getElementById('udescription').value = myUpdate.rows[1].cells[7].innerHTML;
}
</script>
</head>
<body>


  <h1>CS230 Lab05 - Allan Murray</h1>
  <hr>
  <h2>Create Section</h2>
  <button onclick="selectRow()">Test Button</button>
 
 <?php // unset($_POST);
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
<input type="submit" class="button-style" name="addBook" id="addBook" value="Submit Book Information"><br>
</form><br>
<div>
<hr>
<h2>Book Database</h2>
</div>
<?php
  $creator = $title = $type = $identifier = $language = $description = "";
  $id = 0;
  $date = date('m/d/Y');
echo "<table class='tg' id='myTable'>";
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
  /*
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
  */
  //this code re-directs to user to the page in order to clear POST information and
  //display current table.
  echo '<script type="text/javascript">
          window.location = window.location.href
        </script>';

}
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return ("'$data'"); //adds single quotations for database entry.
    }

?>
<hr>
<h2>Update Section</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Update ID: <input type="text" name="updateid" id="updateid"><br>
<input type="submit" class="button-style" name="updateBook" id="updateBook" value="Update Book Information"><br>
<!--<p id="updateid"></p>-->
</form><br>
<div><br>
<?php
  if(isset($_POST['updateBook'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $updateid = ($_POST["updateid"]);
      echo "<table class='tg' id='myUpdate'>";
      echo "<tr><th>Id</th><th>Creator</th><th>Title</th><th>Type</th><th>Identifier</th><th>Date</th><th>Language</th><th>Description</th></tr>";
      class updateTableRows extends RecursiveIteratorIterator {
        function __construct($it) {
          parent::__construct($it, self::LEAVES_ONLY);
        }
        function current() {
          return "<td contenteditable='true' style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
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
        $stmt = $conn->prepare("SELECT * FROM eBook_MetaData WHERE id = $updateid");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new updateTableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
          echo $v;
        }
      }
      catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
      $conn = null;
      echo "</table>";
      echo '<form method="post" action="/CS230Lab05.php">';
      echo '<input type="hidden" id="uid" name ="uid" value="test">';
      echo '<input type="hidden" id="ucreator" name ="ucreator" value="testvalue">';
      echo '<input type="hidden" id="utitle" name ="utitle" value="testvalue">';
      echo '<input type="hidden" id="utype" name ="utype" value="testvalue">';
      echo '<input type="hidden" id="uidentifier" name ="uidentifier" value="testvalue">';
      echo '<input type="hidden" id="udate" name ="udate" value="testvalue">';
      echo '<input type="hidden" id="ulanguage" name ="ulanguage" value="testvalue">';
      echo '<input type="hidden" id="udescription" name ="udescription" value="testvalue">';
      echo '<input type="submit" class="button-style" name="addUpdatedBook" id="addUpdatedBook" onclick="populate()" value="Amend Book Information and Then Press This Button"><br>';
      echo '</form><br>';
    }
  }
if(isset($_POST['addUpdatedBook'])){
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $uid = ($_POST["uid"]); 
    $ucreator = ($_POST["ucreator"]); 
    $utitle = ($_POST["utitle"]); 
    $utype = ($_POST["utype"]); 
    $uidentifier = ($_POST["uidentifier"]); 
    $udate = ($_POST["udate"]); 
    $ulanguage = ($_POST["ulanguage"]);  
    $udescription = ($_POST["udescription"]);
    $uservername = "localhost";
    $uusername = "root";
    $upassword = "";
    $udbname = "mysql";
    echo "Hello World";
    /*UPDATE `eBook_MetaData` SET `description` = 'A book.hghgh' WHERE `eBook_MetaData`.`id` = 48 */
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,     $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE eBook_MetaData SET creator = '$ucreator', title = '$utitle', type = '$utype', identifier = '$uidentifier', date = '$udate', language = '$ulanguage', description = '$udescription'
      WHERE id = $uid";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "New record created successfully";
    }
    catch(PDOException $e){
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;

    //this code re-directs to user to the page in order to clear POST information and
    //display current table.
    echo '<script type="text/javascript">
    window.location = window.location.href
  </script>';
  }
	
  }
?></div>

<hr>
<h2>Delete Section</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Delete ID: <input type="text" name="deleteid" id="deleteid"><br>
<input type="submit" class="button-style" name="deleteBook" id="deleteBook" value="Delete Book Information"><br>
</form><br>

<?php
  if(isset($_POST['deleteBook'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $deleteid = ($_POST["deleteid"]);
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "mysql";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql to delete a record
        $sql = "DELETE FROM eBook_MetaData WHERE id = $deleteid";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Record deleted successfully";
      }
      catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
      }

      $conn = null;

      //this code re-directs to user to the page in order to clear POST information and
      //display current table.
      echo '<script type="text/javascript">
              window.location = window.location.href
            </script>';
    }
  }
?>
</body>
</html>
