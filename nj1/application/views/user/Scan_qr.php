<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>/assets/img/Coinselforiginal.png"/>
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/Coinselforiginal.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Google Authentication</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?=base_url()?>assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?=base_url()?>assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
     <div class="wrapper">       
        <div class="main-panel">
             <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                                <div class="col s12 m2">
                                      <p class="z-depth-5"><?=$this->session->flashdata('flashdata');?></p>
                                </div>
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Google Authenticator</h4>
                                </div>
                                <div class="card-content">
                                         <?php
                                    if(isset($flash))
                                    {
                                        echo $flash;
                                    }
                                    ?>
                                    <form method="post" action="<?=base_url('user/success')?>">
                                        <?php
                                        if(isset($qrcode))
                                        {
                                            ?>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">QR code</label>
                                                     <img alt="Image" style="height: 252px; width: 250px;"; src="<?=$qrcode?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">OTP</label>
                                                    <input type="text" class="form-control" id="__tkn_amt__" name="qrcode" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-info pull-right" value="submit">
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
</div>
</div>
<script>
    $(document).ready(function(){
        $("#__tkn_amt__").on("keyup",function(){
           var token_amount = $(this).val();
           eth_charge = 0.001;
           var total_eth_charges = token_amount*eth_charge;
           $("#eth_charge").val(parseFloat(total_eth_charges));
        });
    });
    
</script>
<footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <!--<ul>
                            <li>
                                <a href="#">
                                    Commodum
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>-->
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="">Commodum</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="<?=base_url()?>assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="<?=base_url()?>assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="<?=base_url()?>assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?=base_url()?>assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?=base_url()?>assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?=base_url()?>assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>

</html>