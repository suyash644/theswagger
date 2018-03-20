<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <!--<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/one.png">
    <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/one.png">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Naija Coin | Home Page </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/material-kit.css" rel="stylesheet"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?=base_url()?>assets/css/demo.css" rel="stylesheet" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body class="index-page">
<!-- Navbar -->
<nav class="navbar navbar-transparent navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#">
                <div class="logo-container">
                    <div class="logo">
                        <img src="<?=base_url()?>assets/img/logowhite.png" alt="Logo"  title="" data-placement="bottom" data-html="true" style="height: 90px;margin-top: -10px;">
                        <!--<h2 style="color: white;text-decoration:none;">Naija Coin</h3>-->
                    </div>
                    <div class="brand">
                    
                    </div>


                </div>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navigation-index">
            <ul class="nav navbar-nav navbar-right">
                <!--<li>
                    <a href="components-documentation.html" target="_blank">
                        <i class="material-icons">dashboard</i> Resources
                    </a>
                </li>-->
                <?php 
                if(isset($_SESSION['etp']))
                {
                  ?>
                   <li>
                    <a href="<?=base_url('user/dashboard')?>">
                        <i class="material-icons">dashboard</i>Dashboard
                    </a>
                  </li>
                  <?php
                }else
                {
                  ?>
                   <li>
                    <a href="<?=base_url('user/signup')?>">
                        <i class="material-icons">dashboard</i>sign up
                    </a>
                </li>
                <li>
                    <a href="<?=base_url('user/login')?>">
                        <i class="material-icons">unarchive</i>login
                    </a>
                </li>
                <?php
                }
                ?>
                <!--<li>
                    <a rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                </li>
                <li>
                    <a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>-->

            </ul>
        </div>
    </div>
</nav>