<?php 
    require'config.php';
    session_start();
    $name="LOG IN";
    $rd1="login.php";
    $unhideFeed='';
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

    //feedback storing in database
    if(isset($_POST["feed"])){
        $rate=$_POST["rating"];
        $feedback=$_POST["feedback"];

        $insertFeedback="INSERT INTO `feedback`(`Username`, `Rating`, `Feedback`) VALUES ('$name','$rate','$feedback')";
        if($con->query($insertFeedback)){
            echo "<script> alert('Thank You for your feedback!!!'); </script>";
        }
        else{
            echo "There was an error submitting your feedback";
        }
    }
    
    //loading dynamic feedback to page from database
    //fetching each feedback data with account details and profile picture location
    $fchFeedback="SELECT F.Username, F.Rating, F.Feedback, A.ImgLocation FROM account A, feedback F WHERE A.Username=F.Username";
    function loadFeedback(){
        global $con, $fchFeedback;
        if($con->query($fchFeedback)){
            $feedsobj=$con->query($fchFeedback);
            while($row=$feedsobj->fetch_assoc()){
                $uname=$row["Username"];
                $rate=$row["Rating"];
                $feedtxt=$row["Feedback"];
                $uimg=$row["ImgLocation"]; 
                if($rate==5){
                    $count ="  <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>";
                }
                elseif($rate==4){
                    $count ="  <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='far fa-star'></i>";
                }

                elseif($rate==3){
                    $count ="  <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='far fa-star'></i>
                            <i class='far fa-star'></i>";
                }
                            
                elseif($rate==2){
                    $count ="  <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>";
                }

                elseif($rate==1){
                    $count ="  <i class='fa fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>"; 
                }                               
                    
                echo    "<div class='user'>
                            <img src='$uimg'>
                            <div>
                                <h3>$uname</h3>
                                <p>$feedtxt</p>
                                $count
                            </div>
                        </div>";
            }
        }
        else{
            echo "failed";
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
        <link rel="stylesheet" href="./css/reg.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <script src="../src/js/slider.js"></script>
        <!-- Using google fonts API and font awesome icons-->

        <!-- Bootstrap-->
        <link rel=stylesheet typea="text/css" href="./css/bootstrap.css">
        <link rel=stylesheet typea="text/css" href="./css/font-awesome.css">

        <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

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
<!-- image slider uses javascript function to switch between images, 
function simulates a radio button click automatically with a time interval of 15 seconds
It can also be manually switched -->
            <section class="imageslider">

                 <div class="slider">
                    <div class="slides">

                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">


                        <div class="slide first">
                          <img src="images/bg/silde1.jpg">
                        </div>
                        <div class="slide">
                          <img src="images/bg/2.jpeg">
                        </div>
                        <div class="slide">
                          <img src="images/bg/3.jpg">
                        </div>
                        <div class="slide">
                          <img src="images/bg/4.jpeg">
                        </div>

                    </div>
                        <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                        </div>
                </div>

            </section>
        
      
            <section class="mb">
                <div class="mission">
                    <h1>OUR MISSION</h1>
                    <h3>It is our Prime objective to become the most admired and trusted among our customers, by providing the most satisfying services and beyond.....</h3>
                </div>

            </section>

            <section class="reviews">
                <div class="rbox">
                    <h1>SEE WHAT OUR CLIETS SAYS</h1>
                    <p>NOTHING MAKE US GLAD THAN A SATISFIED CUSTOMER.</p>
                </div>

                <div class="row">
                    
                    <?php loadFeedback(); ?> <!-- call php function that loads dynamic feedbacks -->
                </div>
            </section>
<!-- feedback submission form  -->
            <section id="feedback" hidden>
              <div class="grid">
                <div class="form1">
                  <h2>Give Us your Thoughts</h2>
                  <form  action="" method="post">
                    <div class="label">
                      <div class="starbox">
                        <div class="stars"> <!-- setting star icons as radio button labels -->
                            <input type="radio" name="rating" id='r5' value=5 required>
                            <label for="r5" class="fa fa-star"></label>
                            <input type="radio" name="rating" id='r4' value=4>
                            <label for="r4" class="fa fa-star"></label>
                            <input type="radio" name="rating" id='r3' value=3>
                            <label for="r3" class="fa fa-star"></label>
                            <input type="radio" name="rating" id='r2' value=2>
                            <label for="r2" class="fa fa-star"></label>
                            <input type="radio" name="rating" id='r1' value=1>
                            <input type= 
                            <label for="r1" class="fa fa-star"></label>
                        </div>
                      </div>
                      
                      <textarea id="textr" name="feedback" rows="7"  maxlength="200" placeholder="Enter your thoughts!!!"></textarea>
                      
                  </div>
                  <div class="sub" >
                    <input type="submit" name="feed" value="Rate US!">
                  </div>
              </form>
              </div>
              <div class="img2">
              </div>
            </div>
            </section>

            <?php echo $unhideFeed; ?> <!-- php variable call to call JS script to disable the feedback if a user is not logged in -->
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
