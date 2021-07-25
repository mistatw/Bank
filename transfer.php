<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$frmn =  $_REQUEST['frm'];
$user =  $_REQUEST['user'];
$amt  =  $_REQUEST['amt'];

$sqli = "SELECT balance FROM customers WHERE fname=('$frmn')";
$result = $conn->query($sqli);

if ($result->num_rows > 0) {
  
   $row = $result->fetch_assoc();
   $frmu=$row["balance"];
} 
else {
  echo "0 results";
}

$sqlt = "SELECT balance FROM customers WHERE fname=('$user')";
$result = $conn->query($sqlt);

if ($result->num_rows > 0) {
  
   $row = $result->fetch_assoc();
   $toou=$row["balance"];
} 
else {
  echo "0 results";
}

$mass = $frmu-$amt;
$class = $toou+$amt;

$sql = "UPDATE customers SET balance=('$mass') WHERE fname=('$frmn');";
$sql.= "UPDATE customers SET balance=('$class') WHERE fname=('$user');";
$sql.= "INSERT INTO transactions(frm,too,amt,time) VALUES ('$frmn','$user','$amt',CURRENT_TIMESTAMP())";

if ($conn->multi_query($sql) === TRUE) {
  echo '<br>Success';
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  ?>