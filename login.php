<?php
    session_start();
    $rd1="login.php";
    $name="Login";
    $uname="";
    $pass="";
    if(isset($_SESSION["USER"])){
        $log="user.php";
        $rd1="book.php";
        $name=$_SESSION["USER"];
    }
    else{
        $log="login.php";
    }

    if(isset($_COOKIE["user"])){
      $uname=$_COOKIE["user"];
    }
    //checking whether there is a current logged in user, and checking and assigning cookie values if set
?>

<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">

        <link rel=stylesheet href="./css/header%20and%20footer.css">
        <link rel=stylesheet href="./css/all.css">
        <link rel=stylesheet href="./css/login.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <script src="../src/js/slider.js"></script>

        <!-- Bootstrap-->
        <link rel=stylesheet typea="text/css" href="./css/bootstrap.css">
        <link rel=stylesheet typea="text/css" href="./css/font-awesome.css">

        <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

        <title>Log In</title>
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
          <section>
            <div class="login">
                
                <div class="form">
                  <div class='ltxt'>
                    <h1>LOGIN</h1>
                  </div>
                  <div class='inputs'>
                    <form action="loginphp.php" method="POST">
                      <input type='text'placeholder="Username" class='forminput' name="Username" value="<?php echo $uname ?>" required> <!-- filling the input with the cookie value -->
                      <input type='password'placeholder="Password" class='forminput' name="Password" value="" required>
                      <div class="buttons">
                        <div class='tick'>
                          <input type="checkbox" id="rme" name="rme">
                            <lable for="rme">Remember me</lable>
                        </div>
                        <div>
                          <input type="submit" name="submit" value="Log In " class="submit">
                        </div>
                      </div>
                  </form>
                  <div class="buttons2">
                    <div class="up">
                      <input type="button" value="Sign UP" onclick="location.href='signup.php'">
                    </div>
                    <div class="up">
                      <input type='button' value="Reset Password" onclick="location.href='forgot.php'" class="up">
                    </div>
                </div>
              </div>
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
