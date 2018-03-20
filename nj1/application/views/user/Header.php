<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?=$title?></title>
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
    <link href="<?=base_url()?>assets/css/bootstrap-social.css" rel="stylesheet" />
    <style>
.card-header{
    background: #8ec63f !important;

}
.nav li.active a {
    background-color: #8ec63f !important;
}
</style>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="<?=base_url()?>assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="<?=base_url('user/dashboard')?>" class="simple-text">
                    <img src="<?=base_url()?>assets/img/b1.png" alt="Logo"  title="" data-placement="bottom" data-html="true" style="height: 60px;">
                </a>
                <!-- <h3>Naija Coin</h3> -->
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav" >
                    <li class="<?php if($this->uri->segment(2) == 'dashboard'){ echo 'active';}?>">
                        <a href="<?=base_url();?>user/update_balance">
                            <p>Refresh balance</p>
                        </a>
                    </li>
                    

                    <!-- <li class="<?php if($this->uri->segment(2) == 'purchase_token'){ echo 'active';}?>">
                            <a href="<?=base_url();?>user/purchase_token">
                                Purchase Naija Coin
                            </a>
                     </li>
                    
                    <div class="logo">
                        <b>Withdrawal</b>
                    </div>
                      <li class="<?php if($this->uri->segment(2) == 'transfer_ether'){ echo 'active';}?>">
                            <a href="<?=base_url();?>user/transfer_ether">
                                Ether
                            </a>
                        </li>

                        <li class="<?php if($this->uri->segment(2) == 'external_transaction'){ echo 'active';}?>">
                        <a href="<?=base_url();?>user/external_transaction">
                            <p>Naija Coin</p>
                        </a>
                        </li>
                    <div class="logo" style="bottom: 23px;"></div>
                    <li class="<?php if($this->uri->segment(1) == 'user_address'){ echo 'active';}?>">
                        <a href="<?=base_url('user_address');?>">
                            <p>Deposit</p>
                        </a>
                    </li>
                    <li>
                        <a href="https://etherscan.io/address/<?=$_SESSION['etp_Useraddress']?>#tokentxns" target="_blank">
                            <p>Transaction History</p>
                        </a>
                    </li> -->
                    <li class="<?php if($this->uri->segment(2) == 'list_property'){ echo 'active';}?><?php if($this->uri->segment(2) == 'list_property'){ echo 'active';}?>">
                        <a href="<?=base_url();?>user/list_property">
                            <p>List property</p>
                        </a>
                    </li>

                    <li class="<?php if($this->uri->segment(2) == 'token'){ echo 'active';}?><?php if($this->uri->segment(2) == 'token'){ echo 'active';}?>">
                        <a href="<?=base_url();?>user/token">
                            <p>Token</p>
                        </a>
                    </li>

                    <li class="<?php if($this->uri->segment(2) == 'user_profile'){ echo 'active';}?><?php if($this->uri->segment(2) == 'change_password'){ echo 'active';}?>">
                        <a href="<?=base_url();?>user/user_profile">
                            <p>Profile</p>
                        </a>
                    </li>
                    <!-- <li class="<?php if($this->uri->segment(2) == 'faq'){ echo 'active';}?>">
                        <a href="<?=base_url('user/faq');?>">
                            <p>FAQ</p>
                        </a>
                    </li> -->
                    <li>
                        <a href="<?=base_url();?>user/logout">
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
         <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- <a class="navbar-brand" href="#">DASHBOARD </a> -->
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li> -->
                            <style type="text/css">
                                
#days {
  
  color: #8ec63f;
}
#hours {
  
  color: #8ec63f;
}
#minutes {
  
  color: #8ec63f;
}
#seconds {
  
  color: #8ec63f;
}

li .row div {
  display: inline-block;
  line-height: 1;
}

.row #timer span {
  display: block;
  font-size: 20px;
  color: white;
}


                            </style>
                           
  </ul>
                    </div>
                </div>
            </nav>