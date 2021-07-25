<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" href="assets/img/logo.png" type="image/png" sizes="16x16">
    <title>TSF BANK</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.css">
    



    <style>

  .clickable-row:hover{
  background: #494d53;
  outline: none;
  cursor: pointer;
}
html, body{height: 100%;}

body {
background: url(assets/img/bg2.jpg);
background-size: cover;
position: center;
background-repeat: no-repeat;
}
.current{
    background-color: #29ae7b;
    border-radius: 25px;
    width: 130px;
    text-align: center;
         
}
  </style>

  
</head>


<body>

    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <a class="navbar-brand" href="index.html">
            <img src="assets/img/logo.png" width="28px" height="28px" class="d-inline-block align-top" alt="">
            TSF BANK
          </a><button data-toggle="collapse" class="navbar-toggler"
                data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link current" href="users.php  ">Users</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="transactions.php ">Transactions</a></li>
                </ul>
            </div>
        </div>
    </nav>  
<table class="table table-bordered table-dark" style="width: 80%; margin-top: 30px;  margin-left: auto; margin-right: auto; border-radius: 5px; ">
    
      <tr>
      <th scope="col">ID</th>
       <th scope="col">Name</th>
        <th scope="col">Mail</th>
        <th scope="col">Balance</th>
      </tr>
    
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

$sql = "SELECT uid, fname, mail, balance FROM customers";
$result = $conn->query($sql);
$stack = array();
$bal= array();

if ($result->num_rows > 0) {
  
// output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr id=".$row["uid"]." class='clickable-row' onclick='pass(this.id)'>
    <td>".$row["uid"]."</td>
    <td>".$row["fname"]."</td>
    <td>".$row["mail"]."</td>
    <td>".$row["balance"]."</td>
    </tr>";  
    array_push( $stack, $row["fname"] );
    $User = json_encode( $stack ); 
    array_push( $bal, $row["balance"] );
    $baln = json_encode( $bal ); 
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>

<script>
  var theArray = <?php echo $User?>;
  var cal = <?php echo $baln?>;
 
</script>

<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/transfer.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>  
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>

</body>
</html>