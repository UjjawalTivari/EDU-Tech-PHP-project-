<?php
ob_start();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<?php
require_once('Database.php');
session_start();
include_once ('validateSession.php');

$isSubmitted = false;
if(isset($_POST['btnsubmit']))
{
    $isSubmitted = true;
    $_SESSION['userName']=$_POST['userName'];
    $_SESSION['userId']=Database::retrieve_id($_POST['userName']);
    $_SESSION['lastTime']=time();
    $_SESSION['role'] = Database::retrieve_role(Database::retrieve_id($_POST['userName']));

    if($isSubmitted){
        $isValidLogin = Database::validate_user($_POST['userName'], $_POST['password']);
        //Remember Me
        //saves the username and password in cookie

        if(isset($_POST['autologin']))
        {
            $remember = $_POST['autologin'];
            if($remember = 1)
            {
                setcookie("userName",$_POST['userName'],time()+3600*24);
                setcookie("password",($_POST['password']),time()+3600*24);
            }

        }
        else
        {
            unset($_COOKIE['userName']);
            unset($_COOKIE['password']);
            setcookie("userName",'',time()-3600*24);
            setcookie("password",'',time()-3600*24);
        }

    }

}
?>
<head>
    <title>Edu-Tech</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'> 
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles-2.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>
        footer ul.social.list-inline li a {
            display: block;
            height: 50px;
            width: 50px;
            line-height: 50px;
            font-size: 25px;
            border-radius: 100%;
            color: white;
            text-align: center;
        }

        .profile-picture {
            display: inline-block;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }

        footer ul.social.list-inline { margin: 0; text-align: center;}
        footer ul.social.list-inline li.social-github a { background-color: #333333; }
        footer ul.social.list-inline li.social-github a:hover { background-color: white; }
        footer ul.social.list-inline li.social-twitter a { background-color: #1da1f2; }
        footer ul.social.list-inline li.social-twitter a:hover { background-color: white; }
        footer ul.social.list-inline li.social-facebook a { background-color: #3b5998; }
        footer ul.social.list-inline li.social-facebook a:hover { background-color: white; }
        footer ul.social.list-inline li.social-google-plus a { background-color: #dd4b39; }
        footer ul.social.list-inline li.social-google-plus a:hover { background-color: white; }
        footer .footer { text-align: center; padding: 50px 0; }
    </style>

</head> 

<body class="login-page access-page has-full-screen-bg">
    <div class="upper-wrapper">
        <!-- ******HEADER****** -->
        <header class="header">  
            <div class="container">       
                <h1 class="logo">
                    <a href="index.php"><span class="logo-icon"></span><span class="text">Edu-Tech</span></a>
                </h1><!--//logo-->
                                     
            </div><!--//container-->
        </header><!--//header-->
        
        <!-- ******Login Section****** --> 
        <section class="login-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">
                        <div class="form-box-inner">
                            <h2 class="title text-center">Log in to Edu-Tech</h2>
                            <div class="row">
                                <div class="form-container col-xs-12">
                                    <form class="login-form" action="login.php" method="post">
                                        <?php
                                            if ($isSubmitted && !$isValidLogin)
                                                echo '<div class="alert alert-danger">
                                                            <strong>Incorrect credentials!</strong> 
                                                      </div>';
                                        ?>
                                        <div class="form-group email">
                                            <label class="sr-only">Email or username</label>
                                            <input id="login-email" type="text" class="form-control login-email" placeholder="Username" name="userName" value="<?php if(isset($_COOKIE['userName'])) { echo $_COOKIE['userName']; } ?>">
                                        </div><!--//form-group-->
                                        <div class="form-group password">
                                            <label class="sr-only" for="login-password">Password</label>
                                            <input id="login-password" type="password" class="form-control login-password" placeholder="Password" name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>">
                                            <p class="forgot-password"><a href="reset-password.php">Forgot password?</a></p>
                                        </div><!--//form-group-->
                                        <button type="submit" class="btn btn-block btn-cta-primary" name ="btnsubmit">Log in</button>
                                        <div class="checkbox remember">
                                            <label>
                                                <input type="checkbox" name="autologin"> Remember me
                                            </label>
                                        </div><!--//checkbox-->
                                         <p class="lead">Don't have a Edu-Tech account yet? <br /><a class="signup-link" href="testRegistrationForm.php">Create your account now</a></p>
                                    </form>
                                </div><!--//form-container-->
                        </div><!--//form-box-inner-->
                    </div><!--//form-box-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//contact-section-->
    </div><!--//upper-wrapper-->

    <footer class="footer footer-main">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="footer-col connect col-xs-12">
                        <div class="footer-col-middle">
                            <ul class="social list-inline">
                                <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a> </li>
                                <li class="social-google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                    <div class="clearfix"></div>
                </div><!--//row-->
            </div><!--//container-->
        </div><!--//footer-content-->
        <div class="bottom-bar">
            <div class="container">
                <small class="copyright">Copyright Edu-Tech Inc. </a></small>
            </div><!--//container-->
        </div><!--//bottom-bar-->
    </footer><!--//footer-->

    <!-- Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
    <script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
    <script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script> 
    <script type="text/javascript" src="assets/js/main.js"></script>
    
            
</body>
</html>
<?php

?>
<?php
if($isSubmitted){
    if ($isValidLogin)
    {
        //echo "login succeeded";
        header("Location: welcome.php");
        error_reporting(E_ALL | E_WARNING | E_NOTICE);
        ini_set('display_errors', TRUE);
        flush();
    }
}
?>