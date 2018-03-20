<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/matrix-style.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/matrix-media.css" />
    <link href="<?=base_url()?>Public/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=base_url()?>Public/admin/css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
   $( function() {
    $( "#end_date" ).datepicker();
  } );
  </script>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h3>NAIJA ADMIN</h3>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        
        <li class=""><a title="" href="<?=base_url('admin/logout')?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="<?php if($this->uri->segment(2) == 'fees'){echo 'active';}?>"> <a href="<?=base_url('admin/fees')?>"><i class="icon icon-signal"></i> <span>Token Amount</span></a> </li>
        <li class="<?php if($this->uri->segment(2) == 'view_user'){echo 'active';}?>"> <a href="<?=base_url('admin/view_user')?>"><i class="icon icon-signal"></i> <span>View Users</span></a> </li>
        <li class="<?php if($this->uri->segment(2) == 'view_eth_address'){echo 'active';}?>"> <a href="<?=base_url('admin/view_eth_address')?>"><i class="icon icon-signal"></i> <span>Eth Addresses</span></a> </li>
        <li class="<?php if($this->uri->segment(2) == 'phase'){echo 'active';}?>"> <a href="<?=base_url('admin/phase')?>"><i class="icon icon-signal"></i> <span>Phase</span></a> </li>
        <li class="<?php if($this->uri->segment(2) == 'minimum_token'){echo 'active';}?>"> <a href="<?=base_url('admin/minimum_token')?>"><i class="icon icon-signal"></i> <span>Minimum token purchase</span></a> </li>
        <li class="<?php if($this->uri->segment(2) == 'withdrawal_permission'){echo 'active';}?>"> <a href="<?=base_url('admin/withdrawal_permission')?>"><i class="icon icon-signal"></i> <span>Withdrawal Permission</span></a> </li>
          <li class="<?php if($this->uri->segment(2) == 'admin_address'){echo 'active';}?>"> <a href="<?=base_url('admin/admin_address')?>"><i class="icon icon-signal"></i> <span>Create Admin</span></a> </li>
    </ul>
</div>
<!--sidebar-menu-->