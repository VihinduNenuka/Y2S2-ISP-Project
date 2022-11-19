<?php
    require'config.php';
    session_start();
    $uname="Login";
    
    if(isset($_SESSION["USER"])){
        $log="user.php";
        $name=$_SESSION["USER"];
    }
    else{
        $log="login.php";
    }
    $pass="";

    //fetching account details to validate login 
    if(isset($_POST["submit"])){
        $sql="SELECT * FROM `account` WHERE 1";

        $uname=$_POST["Username"];
        $pass=$_POST["Password"];
        $flag=0;

        if($uname=="admin"&& $pass=="password"){

            echo"<script > alert('Cannot make the reservation!); window.location='book.php'</script>";
        }
        
        if($con->query($sql)){
            $result=$con->query($sql);
            while($row=$result->fetch_assoc()){ //verifying hashed password
                if($row["Username"]==$uname and password_verify($pass, $row["Password"])){
                    $pLvl=$row["PL"];
                    $hpass=$row["Password"];
                    $uImgLoc=$row["ImgLocation"]; //fetching dynamic user details at login success
                    $flag=1;
                    break;
                }
                
            }
            if($flag==1){
                $_SESSION["USER"]=$uname;
                $_SESSION["PL"]=$pLvl;
                $_SESSION["uImgLoc"]=$uImgLoc; //setting sessions from dynamic account details
                if(isset($_POST["rme"])){
                    setcookie("user", $uname, time()+(3600),"/");//setting username as a cookie if the remember me check box is ticked
                }
                $msg="Hello ".$uname; //Dynamic login messeges according to login status
                $msg2="Have a nice Day";
                $msg3="location.href='user.php'";
             }
             
            else{
                $uname="Login";
                $msg="OOPS!";
                $msg2="Invalid Username or Password Entered";
                $msg3="location.href='login.php'";
            }
        }
        $con->close();
    }
    else{
        echo "Conenction Error";
    }

?>

<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">

        <link rel=stylesheet href="./css/header%20and%20footer.css">
        <link rel=stylesheet href="./css/all.css">
        <link rel=stylesheet href="./css/home.css">
        <link rel=stylesheet href="css/login.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

        <!-- Bootstrap-->
        <link rel=stylesheet typea="text/css" href="./css/bootstrap.css">
        <link rel=stylesheet typea="text/css" href="./css/font-awesome.css">

        <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

        <title>Salon Hisakes</title>
    </head>

    <body>
        <div class="backround">
   

            <section class="msg">
                <div class="smsg">
                    <H1><?php echo $msg; ?></H1><!--  Display generated messeges-->
                    <p><?php echo $msg2; ?></p> <!-- Setting an automatic redirect to user to relevent page upon the login status-->
                    <script>
                        setTimeout("<?php echo $msg3; ?>", 3000);
                    </script>
                </div>
            </section>

      
        </div>
    </body>
</html>
