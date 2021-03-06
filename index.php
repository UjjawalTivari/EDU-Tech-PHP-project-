<?php
session_start();

include_once ('validateSession.php');
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
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

<body class="home-page">
    <!-- ******HEADER****** -->
    <header id="header" class="header navbar-fixed-top">
        <div class="container">
            <h1 class="logo">
                <a href="index.php"><span class="text">Edu-Tech</span></a>
            </h1><!--//logo-->
            <nav class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->
                <div id="navbar-collapse" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active nav-item"><a href="#">Home</a></li>

                        <li class="nav-item"><a href="<?php if(isset($_SESSION['userId'])){
                                echo "welcome.php";
                            } else {
                                echo "login.php";
                            }?>">Log in</a></li>
                        <li class="nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href="testRegistrationForm.php">Sign Up</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div><!--//container-->
    </header><!--//header-->

    <div class="bg-slider-wrapper">
        <div class="flexslider bg-slider">
            <ul class="slides">
                <li class="slide slide-2"></li>
                <li class="slide slide-3"></li>
            </ul>
        </div>
    </div><!--//bg-slider-wrapper-->

    <section class="promo section section-on-bg">
        <div class="container text-center">
            <h2 class="title">Online EQAO Preparation Platform</h2>
            <p class="intro">Edu-Tech is a online learning platform that helps students and teachers by providing tools to help students identify their weaknesses and resources to improve them.</p>
        </div><!--//container-->
    </section><!--//promo-->

    <div class="sections-wrapper">

        <!-- ******Why Section****** -->
        <section id="why" class="section why">
            <div class="container">
                <h2 class="title text-center">How Can Edu-Tech Help You?</h2>
                <div class="row item">
                    <div class="content col-xs-12 col-md-4">
                        <h3 class="title">Students</h3>
                        <div class="desc">
                            <p>Take a quiz to see how ready you are for your math test. View results, learn what you need to practice, and gain access to helpful videos!</p>
                            <!-- <p>The original PSD of the graphic is included in the package. You can easily customise the PSD to meet your needs.</p> -->
                        </div>
                    </div><!--//content-->
                    <figure class="figure col-md-offset-1 col-sm-offset-0 col-xs-offset-0 col-xs-12 col-md-7">
                        <img class="img-responsive" style="max-width:536px" src="http://teachrworld.org/wp-content/uploads/2015/10/classroom-activities-for-kids.jpg" alt="" />
                    </figure>
                </div><!--//item-->

                <div class="row item">
                    <div class="content col-md-push-8 col-sm-push-0 col-xs-push-0 col-xs-12 col-md-4">
                        <h3 class="title">Educators</h3>
                        <div class="desc">
                            <p>View the results of the students in your room to see how ready your class is, and also the strands and specific sub-strands that students are having difficulty on, matched up with Ontario curriculum expectation.</p>
                        </div>
                    </div><!--//content-->
                    <figure class="figure col-md-pull-4 col-sm-pull-0 col-xs-pull-0 col-xs-12 col-md-7">
                        <img class="img-responsive" src="http://2wuoqc44mkwk23ld08m4topnk0.wpengine.netdna-cdn.com/wp-content/uploads/2012/09/Loan-Forgiveness-For-Teachers.jpg" alt="" />
                    </figure>
                </div><!--//item-->

                <div class="row item last-item">
                    <div class="content col-xs-12 col-md-4">
                        <h3 class="title">Learning Resources</h3>
                        <div class="desc">
                            <p>We have collected over 40 videos that are specifically linked to grade 6 math expectations to make sure you’re ready to succeed!</p>
                        </div>
                    </div><!--//content-->
                    <figure class="figure col-md-offset-1 col-sm-offset-0 col-xs-offset-0 col-xs-12 col-md-7">
                        <img class="img-responsive" src="http://www2.pcmag.com/media/images/484407-the-best-learning-management-systems-lms-for-2015.jpg?thumb=y&width=740&height=426" alt="" />
                    </figure>
                </div><!--//item-->
            </div><!--//container-->
        </section><!--//why-->

        <!-- ******Testimonials Section****** -->
        <section class="section testimonials">
            <div class="container">
                <h2 class="title text-center">Why Early Math Skills are Important?</h2>
                <div id="testimonials-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#testimonials-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#testimonials-carousel" data-slide-to="1"></li>
                        <li data-target="#testimonials-carousel" data-slide-to="2"></li>
                    </ol><!--//carousel-indicators-->
                    <div class="carousel-inner">
                        <div class="item active">
                            <figure class="profile"><img class="profile-picture" src="http://www.rewriteyourstory.com.au/wp-content/themes/nunks/img/pledges/avatar_m.gif" alt="" /></figure>
                            <div class="content">
                                <blockquote>
                                    <i class="fa fa-quote-left"></i>
                                    <p>Early achievement in mathematics is a strong predictor – even more so than reading skills – of later academic achievement, financial success, and future career options.</p>
                                    <p class="source">Charette and Meng</p>
                                    </br>
                                    </br>
                                </blockquote>
                            </div><!--//content-->
                        </div><!--//item-->
                        <div class="item">
                            <figure class="profile"><img class="profile-picture" src="http://www.rewriteyourstory.com.au/wp-content/themes/nunks/img/pledges/avatar_m.gif" alt="" /></figure>
                            <div class="content">
                                <blockquote>
                                    <i class="fa fa-quote-left"></i>
                                    <p>Students who struggle early in math struggle later on: sixth graders who fail math have less than a one-in-five chance of starting twelfth grade on time, and only 19 percent graduate on time or within a year.</p>
                                    <p class="source">Balfanz</p>
                                    </br>
                                    </br>
                                </blockquote>
                            </div><!--//content-->
                        </div><!--//item-->
                        <div class="item">
                            <figure class="profile"><img class="profile-picture" src="http://www.rewriteyourstory.com.au/wp-content/themes/nunks/img/pledges/avatar_m.gif" alt="" /></figure>
                            <div class="content">
                                <blockquote>
                                    <i class="fa fa-quote-left"></i>
                                    <p>Studies consistently find that students who have difficulty with mathematics by the end of their primary school years have not memorized basic number facts, making further math learning difficult and resulting in feelings of helplessness and a lack of confidence and enjoyment.</p>
                                    <p class="source">Hattie and Yates</p>
                                    </br>
                                </blockquote>
                            </div><!--//content-->
                        </div><!--//item-->
                    </div><!--//carousel-inner-->

                </div><!--//carousel-->
            </div><!--//container-->
        </section><!--//testimonials-->

        <!-- ******CTA Section****** -->
        <section id="cta-section" class="section cta-section text-center home-cta-section">
            <div class="container">
               <h2 class="title">Want to Learn More?</h2>
               <p><a class="btn btn-cta btn-cta-primary" href="mailto:suppport@EduTech.com?Subject=More%20Info" target="_top">Contact Us!</a></p>
            </div><!--//container-->
        </section><!--//cta-section-->

    </div><!--//section-wrapper-->

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

    <!-- Vimeo video API -->
    <script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
    <script type="text/javascript" src="assets/js/vimeo.js"></script>


</body>
</html>
