<?php
    require 'config.php';
    session_start();
    $name="Login";
    $rd1="login.php";
    $flag=0;
    if(isset($_SESSION["USER"])){
        $log="user.php";
        $rd1="book.php";
        $name=$_SESSION["USER"];
        header("location:user.php");
    }
    else{
        $log="login.php";
    }

    if (isset($_POST["submit"])) {
      $uname=$_POST["Username"];
      $pass=$_POST["pass"];
      $rpass=$_POST["rpass"];
      $email=$_POST["email"];
      $telephone=$_POST["telephone"];
      //hashing password before storing in the database to improve security
      $hpass = password_hash($rpass, PASSWORD_BCRYPT);
      //checking for existing usernames for minimize insertion errors
      $fetch="SELECT Username FROM account WHERE Username='$uname'";
      if($con->query($fetch)){
        $result=$con->query($fetch);
        while ($row=$result->fetch_assoc()) {
          if (sizeof($row)>0) {
            echo "<script > alert('Username Unavailable, Please try using another unsername'); window.location='signup.php'</script>";
            $flag=1;
          }
        }

      }
      //inserting data into th database after double checking the password
      if ($flag==0) {
        $insert="INSERT INTO account (Username, Password, PL, ImgLocation, email, telephone) VALUES('$uname', '$hpass', 1, './profileImages/default.png', '$email', '$telephone')";
        if($con->query($insert)){
          echo"<script > alert('Account Created!, Please Login To Continue'); window.location='login.php'</script>";
        }
        else {
          echo "<script > alert('Account Creation Unsuccessfull!); window.location='signup.php'</script>";
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
        <link rel=stylesheet href="./css/signup.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <script src="../src/js/slider.js"></script>

        <!-- Bootstrap-->
        <!-- <link rel=stylesheet typea="text/css" href="./css/bootstrap.css"> -->
        <link rel=stylesheet typea="text/css" href="./css/font-awesome.css">

        <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

        <title>Sign Up</title>
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
                    
                    <li><a href="products.php">SERVICES</a></li>

                    <li><a href="<?php echo $rd1; ?>">BOOK NOW</a></li>
                   
                    <li><a href="contactus.php">GET IN TOUCH</a></li>
                  </ul>
              </div>
            </section>

            <section>
                <div class="grid">
                  <div class="form">
                    <h2>Sign Up</h2>
                        <form action="" method="post">
                          <div class="tform">
                            <input type="text" name="Username" required maxlength="50" placeholder="Username" pattern="[0-9A-Za-z_]{5,50}">
                            <input type="text" name="email" required maxlength="50" placeholder="sam@mail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >
                            <input type="text" name="telephone" required maxlength="50" placeholder="+94xxxxxx" pattern="[0-9]{10,10}">
                            <input type="password" placeholder="Password" name="pass" id="pass" pattern="[A-Za-z0-9_@$#!%^&*/<>]{8,50}" maxlength="50" required>
                            <input type="password" maxlength="50" placeholder="Re-Type Password" name="rpass" id="rpass" required>
                          </div>
                          <div class="sub">
                            <input type="submit" name="submit" value="Create Account" onclick="chkpass()">
                          </div>
                        </form>
                  </div>
                  <div class="timg">
                  </div>
                </div>
            </section>

            <section class="footer">
                <h4>Follow Us On</h4>
                <div class="smicons">
                    <a href="https://twitter.com/login"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
                </div>
                <hr>
                <div class="bottom">
                        <div class="data">
                            <p>2022 Salon HisaKes - All Rights Reserved.</p>
                        </div>
                        <div class="blink">
                            <a href="">Terms of Use</a>
                            <a href="">Data & Web Privacy Policies</a>
                        </div>
                </div>
            </section>
        </div>
    </body>
</html>
