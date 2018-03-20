<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>/assets/img/Coinselforiginal.png">
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/Coinselforiginal.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Coinself | <?=$title?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="<?=base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>/assets/css/material-kit.css" rel="stylesheet"/>

</head>

<body class="signup-page">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url()?>assets/img/coin.png" alt="Logo"  title="<b>COMMODIUM</b>" data-placement="bottom" data-html="true" style="height: 60px;"></a>
            </div>

            <div class="collapse navbar-collapse" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?=base_url('user/signup')?>">
                            <i class="material-icons">dashboard</i> Sign up
                        </a>
                    </li>
                    <!--<li>
                        <a href="#" >
                            <i class="material-icons">unarchive</i> login
                        </a>
                    </li>-->
                    <!--<li>
                        <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('<?=base_url()?>/assets/img/block4.png'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <?php
                        if(isset($flash))
                        {
                            echo $flash;
                        }
                        ?>
                        <div class="card card-signup">
                            <form class="form" method="post" action="<?=base_url('user/forgotpassword')?>">
                                <div class="header header-primary text-center">
                                    <h4>Forgot Password</h4>
                                    <div class="social-line">
                                        <!--<a href="#pablo" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-google-plus"></i>
                                        </a>-->
                                    </div>
                                </div>
                                <p class="text-divider"></p>
                                <div class="content">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <input type="text" name="email" class="form-control" placeholder="Email..." required/>
                                    </div><br>
                                </div>
                                <div class="footer text-center">
                                    <input type="submit" class="btn btn-info btn-md" value="submit" name="submit"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer" style="margin-top: 140px;">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="">
                                    Coinself
                                </a>
                            </li>
                            <li>
                                <a href="">
                                   About Us
                                </a>
                            </li>
                            <!--<li>
                                <a href="http://blog.creative-tim.com">
                                   Blog
                                </a>
                            </li>-->
                            <li>
                                <a href="">
                                    Terms & Conditions
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy; 2018, made with <i class="fa fa-heart heart"></i> by <a href="">Coinself</a>
                    </div>
                </div>
            </footer>

        </div>

    </div>


</body>
    <!--   Core JS Files   -->
    <script src="<?=base_url()?>/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>/assets/js/material.min.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?=base_url()?>/assets/js/nouislider.min.js" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="<?=base_url()?>/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="../assets/js/material-kit.js" type="text/javascript"></script>

</html>


<!--<!Doctype html>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Description Here">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link href="<?php echo base_url(); ?>public/user/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/flickity.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/jquery.steps.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/custom.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .social-circle li a {
            display: inline-block;
            position: relative;
            margin: 0 auto 0 auto;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            text-align: center;
            width: 50px;
            height: 50px;
            font-size: 20px;
            background: white;
        }


        .social-circle li i {
            margin: 0;
            line-height: 50px;
            text-align: center;
        }

        .social-circle i {
            color: #fff;
            -webkit-transition: all 0.8s;
            -moz-transition: all 0.8s;
            -o-transition: all 0.8s;
            -ms-transition: all 0.8s;
            transition: all 0.8s;
        }
    </style>
</head>
<body>
<div class="nav-container ">
    <div class="bar bar--sm visible-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 col-sm-2">
                    <a href="index.html">
                        <img class="logo logo-dark" alt="logo" src="<?php echo base_url(); ?>public/user/img/logo-yuzu.png" />
                        <img class="logo logo-light" alt="logo" src="<?php echo base_url(); ?>public/user/img/logo-yuzu.png" />
                    </a>
                </div>
                <div class="col-xs-9 col-sm-10 text-right">
                    <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                        <i class="icon icon--sm stack-interface stack-menu"></i>
                    </a>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </div>
    <!--end bar-->
    <!--end bar--
</div>





<head>
    <meta charset="utf-8">
    <title>Login Here</title>

</head>
<body class=" ">
<a id="start"></a>
<div class="main-container">
    <section class="imageblock switchable feature-large height-100">
        <div class="imageblock__content col-md-6 col-sm-4 pos-right">
            <div class="background-image-holder">
                <img alt="image" src="<?php echo base_url(); ?>public/user/img/back.jpg" />
            </div>
        </div>
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-md-5 col-sm-7">
                    <h2>Login to continue</h2>
                    <p class="lead">
                        Welcome back, sign in with your existing Ethereum account credentials
                    </p>
                    <h4> <?php
                        if(isset($flash))
                        {
                            echo $flash;
                        }
                        ?></h4>
                    <form  method="post" action="<?=base_url('user/login')?>" method="post">
                        <div class="row">
                              <div class="col-sm-12">
                               <input id="mobile" type="email"  name="username" placeholder="Email" required>
                                <p class="help-block" style="color: #960004 "><?=form_error('password_confirmation','<div class="help-block" style="color: red ">', '</div>')?></p>
                            </div>
                            <div class="col-sm-12" style="clear: both">
                                <input type="password" name="password" placeholder="Password" required/>
                                <p class="help-block" style="color: #960004 "><?=form_error('password_confirmation','<div class="help-block" style="color: red ">', '</div>')?></p>
                            </div>
                            <div class="col-sm-12">
                                <input class="btn btn--primary type--uppercase" type="submit" value="login" name="submit">
                                <p class="help-block" style="color: #960004 "><?=form_error('password_confirmation','<div class="help-block" style="color: red ">', '</div>')?></p>
                            </div>
                        </div>
                        <!--end row--
                    </form>

                </div>
            </div>
            <!--end of row--
        </div>
        <!--end of container--
    </section>
</div>
<!--<div class="loader"></div>--
<script src="<?php echo base_url(); ?>public/user/js/flickity.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/easypiechart.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/parallax.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/typed.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/datepicker.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/isotope.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/ytplayer.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/granim.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/jquery.steps.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/countdown.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/twitterfetcher.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/spectragram.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/smooth-scroll.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/scripts.js"></script>
<script type="text/javascript">
    setTimeout(function() {
        $("#message-wrapper").remove();
    }, 400)
</script>
</body>


</html>



