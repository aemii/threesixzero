<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Points</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

<div class="container">
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

  </div>
</div>


<?php

$qresult = '';

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "spa";

$conn = new mysqli($servername, $username, $password, $dbname);


if($_SERVER["REQUEST_METHOD"] == "POST") {



  $customerId = $_POST["customerId"];
  $decide = $_POST["radios"];
  $points = $_POST["points"];
  $note = $_POST["note"];


  $sql1 = "SELECT points FROM CUSTOMER WHERE id = '$customerId'";

  $result1 = $conn->query($sql1);

  $row = $result1->fetch_assoc();

    $oldpoints =  $row['points'];


  if($decide === "increase")
  {

    $money =  0;

    $sql5 = "INSERT INTO invoice(id, pointsUsed, money, Note)VALUES('$customerId', '$points', '$money', '$note')";

    $conn->query($sql5);

   $points = $points + $oldpoints;
  }
  else if ($decide === "decrease")
  {

    $sql3 = "SELECT money FROM discount WHERE points = '$points'";

   $result2 = $conn->query($sql3);

    $row1 = $result2->fetch_assoc();

    $money =  $row1['money'];

    $sql = "INSERT INTO invoice(id, pointsUsed, money, Note)VALUES('$customerId', '$points', '$money', '$note')";

    $conn->query($sql);

    $points = $oldpoints - $points;
  }



  $sql2 = "UPDATE customer SET points = '$points' WHERE id = '$customerId'";

  $qresult = $conn->query($sql2);

}

?>


  <form class="form-signin" method="post" autocomplete="on">

    <h2 class="form-signin-heading">POINTS FORM</h2>

    <label for="customerId" class="">Customer Id</label>
    <input name="customerId" type="text" id="customerId" class="form-control" placeholder="Customer ID" required>

    <label for="inputGender" class="">Points</label><br>


    <input type="radio" id="radio1" name="radios" value="increase" required>
    <label for="radio1">Increase</label>
    <input type="radio" id="radio2" name="radios" value="decrease">
    <label for="radio2">Decrease</label>

    <br> <br>

    <label for="points" class="">Points Value</label>
    <input name="points" type="number" id="points" class="form-control" placeholder="100-5000" required>

    <label for="note" class="">Note</label>
    <input name="note" type="text" id="note" class="form-control" placeholder="Add comments here" required>


    <button class="btn btn-lg btn-primary btn-block" type="submit">SUBMIT</button>

  </form>
</div>
<?php
if ($qresult) {

  ?>

  <html>
  <center><h1 style="font-family:poiret_oneregular; color:white"><?php echo $customerId; ?> Points has been changed</h1></center>
  </html>

  <?php
}


?>

    <!-- /container -->
<div style="border-top:3px solid #fff;" class="row">
 	 <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
   		 <p class="btm-p">All Copyrights are reserved.</p>
  	</div>
</div>

<center>

  <b>  <a style="color: white;" href="index.php">Home</a>
    <a style="color: white;" href="points.php">| Points</a>
    <a style="color: white;" href="invoice.php">| Invoice</a> </b>

</center>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
