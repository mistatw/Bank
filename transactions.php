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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="users.php  ">Users</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link current" href="transactions.php">Transactions</a></li>
                </ul>
            </div>
        </div>
    </nav>  
<table class="table table-bordered table-dark" style="width: 80%; margin-top: 30px;  margin-left: auto; margin-right: auto; border-radius: 5px; ">
    
      <tr>
      <th scope="col">ID</th>
       <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Amount</th>
        <th scope="col">Time</th>

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
      
      $sql = "SELECT uid, frm, too, amt, time FROM transactions";
      $result = $conn->query($sql);
      
      
      if ($result->num_rows > 0) {
        
      // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>
          <td>".$row["uid"]."</td>
          <td>".$row["frm"]."</td>
          <td>".$row["too"]."</td>
          <td>".$row["amt"]."</td>
          <td>".$row["time"]."</td>
          </tr>";  
      
        }
        echo "</table>";
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>

      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
      <script src="assets/js/transfer.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>  
      <script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
      
      </body>
      </html>