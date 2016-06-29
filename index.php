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

    <title>Spa & Saloon</title>

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

$result = '';

$servername = "127.2.149.130:3306";
$username = "adminsCZL1Nq";
$password = "kqQyuytgeVGZ";
$dbname = "threesixzero";

$conn = new mysqli($servername, $username, $password, $dbname);


if($_SERVER["REQUEST_METHOD"] == "POST") {

  $firstname = $_POST["firstName"];
  $lastname = $_POST["lastName"];
  $customerId = $_POST["customerId"];
  $membership = $_POST["membership"];


  $sql = "INSERT INTO customer(firstname, lastname, id, member)VALUES('$firstname', '$lastname', '$customerId', '$membership')";

  $result = $conn->query($sql);

}

?>


  <form class="form-signin" method="post" autocomplete="on">

    <h2 class="form-signin-heading">CUSTOMER FORM</h2>

    <label for="firstName" class="">First Name</label>
    <input name="firstName" type="text" id="firstName" class="form-control" placeholder="Customer First Name" required>

    <label for="lastName" class="">Last Name</label>
    <input name="lastName" type="text" id="LastName" class="form-control" placeholder="Customer Last Name" required>

    <label for="customerId" class="">Customer Id</label>
    <input name="customerId" type="text" id="customerId" class="form-control" placeholder="Customer ID" required>

    <label for="membership" class="">Mebership Date</label>
    <input name="membership" type="text" id="membership" class="form-control" placeholder="e.g 07/11/2016" required>


    <button class="btn btn-lg btn-primary btn-block" type="submit">SUBMIT</button>

  </form>
</div>
<?php
if ($result) {

  ?>

  <html>
  <center><h1 style="font-family:poiret_oneregular; color:white"><?php echo $firstname; ?> has been added!</h1></center>
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
