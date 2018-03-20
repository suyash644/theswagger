<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <!--<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>/assets/img/Coinselforiginal.png">-->
    <!--<link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/Coinselforiginal.png">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?=$title?></title>

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
                <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url()?>assets/img/b1.png" alt="Logo"   data-placement="bottom" data-html="true" style="height: 70px;"></a>
                <!-- <h3>Naija Coin</h3> -->
            </div>

            <div class="collapse navbar-collapse" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
                    <!--<li>
                        <a href="#">
                            <i class="material-icons">dashboard</i> Sign up
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
                            <form class="form" method="post" action="<?=base_url('user/token')?>">
                                <div class="header text-center" style="background-color: #8ec63f;color: white;">
                                    <h4>Token</h4>

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
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <input type="password" name="password" placeholder="Password..." class="form-control" required />
                                        <p class="help-block" style="color: #960004 "><?=form_error('password','<div class="help-block" style="color: red ">', '</div>')?></p>
                                    </div><br>
                                    
                                    <!-- If you want to add a checkbox to this form, uncomment this code

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes" checked>
                                            Subscribe to newsletter
                                        </label>
                                    </div> -->
                                </div>
                                <div class="footer text-center">
                                    <input type="submit" class="btn btn-info btn-md" name="submit" value="submit" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                
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
                        &copy; 2018, made with &nbsp;<i class="fa fa-heart heart" style="color: darkred;"></i>&nbsp; by <a href="https://www.cryptolaunch.in/" target="_blank">cryptolaunch.in</a>
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
    <script src="<?=base_url()?>/assets/js/material-kit.js" type="text/javascript"></script>

</html>


