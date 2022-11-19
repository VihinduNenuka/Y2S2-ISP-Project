<?php
 require 'config.php';
 session_start();
 $name="Login";
    $rd1="login.php";
    $unhideFeed='';
    $flag=0;
    if(isset($_SESSION["USER"])){
        $log="user.php";
        $name=$_SESSION["USER"];
        $rd1="book.php";
        $uImgLoc=$_SESSION["uImgLoc"];
        $unhideFeed="<script> document.getElementById('feedback').hidden=false; </script>";
        //restricting visitors only to read feedbacks, only logged in users can add feedbacks
    }
    else{
        $log="login.php";
    }



if (isset($_POST["submit"])) {
    $date=$_POST["date"];
    $time=$_POST["time"];
    $service=$_POST["service"];
    $note=$_POST["note"];

    $telephone="SELECT telephone FROM account WHERE Username='$name'";
    

    //inserting data into th database after double checking the password
    if($flag==0) {
      $insert="INSERT INTO appointment VALUES('$name', '$date', '$time', '$service','$note','$telephone')";
      if($con->query($insert)){
        echo"<script > alert('Booking Complete'); window.location='index.php'</script>";
      }
      else {
        echo "<script > alert('Cannot make the reservation!); window.location='book.php'</script>";
      }
    }
    $con->close();
  }




?>
<html>
<head>
<meta name="viewport" content="with=device-width, initial-scale=1.0">

<link rel="stylesheet" href="css/header%20and%20footer.css">
<link rel=stylesheet href="./css/all.css">
<link rel=stylesheet href="./css/home.css">

<link rel="stylesheet" href="css/book.css">
<link rel="stylesheet" href="css/products.css">
<link rel="stylesheet" href="./css/reg.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
<script src="../src/js/slider.js"></script>
<!-- Using google fonts API and font awesome icons-->



         <!-- Bootstrap-->
        <link rel=stylesheet typea="text/css" href="./css/bootstrap.css">
        <link rel=stylesheet typea="text/css" href="./css/font-awesome.css">

        
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <!-- Using google fonts API and font awesome icons-->
        <title>Salon Hisakes</title>
    </head>
    <body>

    <div class="backround">
    <section class="header">
                <div class="top">
                    <container >
                        <a href="index.php"><img src="images/Salon_HISAKES1.png"></a>
                    </container>
                    <container>
                        <a href="<?php echo $log; ?>"><i class="fas fa-user-circle"></i></a>
                        <a  href="<?php echo $log; ?>"><h1 class="log"><?php echo $name; ?></h1></a>
                    </container>
                </div>

                <div class="links">
                  <ul>
                    <li><a href="index.php">HOME</a></li>
                    
                    <li><a href="home.php">CREATE APPOINTMENT</a></li>
                   
                    <li><a href="contactus.php">GET IN TOUCH</a></li>
                  </ul>
              </div>
            </section>
 <!-- Reservation -->

 <section id="about">

<div class="container ">
    <!-- container -->
    <div class="section-header ">
        <h1>MAKE A RESERVATION</h1>
        <br>

        <h5><em>Mention any special requirement you wish to get other than the one's mention on our service section.</em></h5>
        <hr>
    </div>
</div>
<!-- end container -->
<div class="grid2">
                    <div class="form">
                        <form method="post" action="">
                            <div class="tin">
                                <input type="time" name="time" maxlength="70" placeholder="Full Name" required>
                                <input type="date" name="date"  maxlength="12" required placeholder="Email">

                                
                                
                            </div>
                            <select name="service" class="tarea" id="option" required>
                                    <option value="P001" selected>Motorcycles and Three Wheelers</option>
                                    <option value="P002">Cars and Mini Vans</option>
                                    <option value="P003">Vans and SUVs</option>
                                    <option value="P004">Heavy Vehicles</option>
                                    <option value="P005">Vehicles on Rent</option>
                                </select>
                            <div class="tarea">
                                 <textarea maxlength="400" name="note" class="adinfo"> </textarea>
                            </div>
                            <div class="sub">

                                <input type="submit" class="submit" name="submit" value="Send Inquiry">
                            </div>
                        </form>
                    </div>
                    
                </div>


</section>
</div>
</body>
</html>

