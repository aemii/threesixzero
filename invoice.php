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

    <title>Invoice</title>

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
      <div class="logo"> <img src="images/logo.jpg" class="img-responsive img-logo" />
          <br>

      </div>
</div>



    <h2 class="form-signin-heading">CUSTOMER INVOICE</h2>

  <form class="form-signin" method="post" autocomplete="on">

    <label for="customerId" id="label" class="">Customer Id</label>

    <input name="customerId" type="text" id="customerId" class="form-control" placeholder="Customer ID for generating Invoice" required>

    <button class="btn btn-lg btn-primary btn-block" id="btn" type="submit">SUBMIT</button>

    </form>

    <?php

    include('includes/config.php');

    $conn = new mysqli($servername, $username, $password, $dbname);


    if($_SERVER["REQUEST_METHOD"] == "POST") {

    $customerId = $_POST["customerId"];

    ?>



  <script>

    document.getElementById('btn').style.visibility = 'hidden';
    document.getElementById('label').style.visibility = 'hidden';
    document.getElementById('customerId').style.visibility = 'hidden';

  </script>


  <?php


    $sql = "SELECT pointsUsed, money, Note, date FROM invoice WHERE id = '$customerId'";

    $result = $conn->query($sql);

 if($result->num_rows > 0)
  {




  ?>
    <center>

    <table class="table table-bordered" style="margin-top:-150px;">
        <thead>
       <tr>
           
            <th>#</th>
            <th>Points</th>
            <th>$ Awarded</th>
           <th>Note</th>
            <th>Time</th>

        </tr>

        </thead>
        <tbody>

        <?php

        $count = 1;

         while($row = $result->fetch_assoc())
         {
            $points = $row["pointsUsed"];
            $money = $row["money"];
             $note = $row["Note"];
            $time = $row["date"];


        ?>




        <tr>
            <td><?php echo $count ?></td>
            <td><?php echo $points ?></td>
            <td><?php echo '$'.$money ?></td>
            <td><?php echo $note ?></td>
            <td><?php echo $time ?></td>

        </tr>


<?php

             $count++;

   }

        ?>


        </tbody>
    </table>

    </center>


    <center><h4 style="font-family:poiret_oneregular; color:white"> To view your points balance, visit  <a href="www.threesixzero.ca/points">www.threesixzero.ca/points</a></h4></center>

</div>


<?php

}
else
{
    ?>

    <center><h1 style="font-family:poiret_oneregular; color:white"><?php echo $customerId; ?> doesn't exist!</h1></center>

<?php
}

      }
      ?>


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

  </body>
</html>
