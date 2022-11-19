<?php
    session_start();
    $name="Login";
    if(isset($_SESSION["USER"])){
        $log="user.php";
        $name=$_SESSION["USER"];
    }
    else{
        $log="login.php";
    }
// getting current logged user's name via sessions and using it to reassign urls dynamically
?>

<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/header%20and%20footer.css">
        <link rel=stylesheet href="./css/all.css">
        <link rel="stylesheet" href="./css/contact.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <script src="../src/js/slider.js"></script>
        <!-- Used google online fonts for easy font change -->

        <!-- Bootstrap-->
        <link rel=stylesheet typea="text/css" href="./css/bootstrap.css">
        <link rel=stylesheet typea="text/css" href="./css/font-awesome.css">

        <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

        <title>Contact Us</title>
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
                <h1 class="th1">Contact Us</h1>
                <div class="Contactgrid">
                    <div class="contacts">
                        <div class="column">
                            <i class="fa fa-phone"></i>
                            <label for="">Hotlines :</label>
                            <ul>
                                <li>+94 16 4532 8764</li>
                                <li>+94 04 6574 8723</li>
                                <li>+94 33 6754 2313</li>
                                <li>+94 12 6425 5363</li>
                            </ul>
                        </div>
                        <div class="column">
                        <i class="fa fa-map-marker"></i>    
                        <label for="">Emails :</label>
                            <ul>
                                <li>hisakes@mail.lk</li>
                                <li>risakes@gmail.com</li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                        <div class="column">
                        <i class="fa fa-envelope"></i>    
                        <label for="">Visit Us at :</label>
                            <p>Salon Hisakes,<br>6C, Dampe Rd,<br>Suwarapola,<br> Piliyandala.</p>
                        </div>
                    </div> <!-- iframe map link was ripped from google maps for better user interaction--> 
                    <div class="map">
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="400" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=sliit&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/">divi discount</a><br><style>.mapouter{position:relative;text-align:right;border-radius:20px;box-shadow: 3px 6px 18px -3px rgba(0,0,0,0.53);height:400px;width:400px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:400px;border-radius:20px;box-shadow: 3px 6px 18px -3px rgba(0,0,0,0.53);}</style></div></div>
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