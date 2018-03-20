<div class="wrapper" style="padding: 40px;">
<div class="main-panel">
		<!-- main content -->
	       <div id="main_content" class="col-sm-8">
	       <!-- page heading -->
           <div class="card"> 
                         <div class="card-header" data-background-color="purple">
                                    <h4 class="title"> RECEIVE</h4>
                                </div>
                            <div class="boxed bg--secondary boxed--lg boxed--border">
                                <?php
                            if(isset($flash))
                            {
                                echo $flash;
                            }
                            ?>
                           
                            <?php
                            if(count($address3) > 1)
                            {
                                ?>
                                <div id="view_form" class="card card-1 boxed boxed--sm boxed--border">
                                <a class="btn btn--primary" id="add_adrs" href="<?=base_url('user_address/add_eth_add')?>">
                                    <span class="btn__text">Add Ethereum Address</span>
                                </a>
                                </div>
                                <?php
                            }
                            ?> 
                                <?php
                                $i = 0;
                                foreach($address3 as $key=>$add){
                                    $i++;
                                    if($add->coin_type == 'e'){
                                    ?>
                                    
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&amp;data=<?= $add->address; ?>" style="width: 50%;padding:20px;" class="center-block"><br /><br />
                                    <strong style="padding: 20px;">Wallet Address</strong> <br />
                                    <span style="padding: 20px;margin-bottom: 20px;"><?=$add->address; ?></span><br><br>
                                    <?php
                                    }
                                }
                                ?>

                                
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                </div>

