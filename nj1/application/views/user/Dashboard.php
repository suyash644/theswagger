
            <div class="content" style="margin-top: 0px;">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                           <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Current Phase</h4>
                                </div>
                                
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12 text-center " style="background-color: white;">
                           
                              <h5 style="font-weight: 500"><b>Get <?=$countdown->result()[0]->bonus_amount?>% bonus  on purchase of token in this phase</b></h6>
                            
                            <h3><?=$countdown->result()[0]->title?></h3>
                            
                            <div class="block-center" style="margin: auto; width: 500px;">
                            <div class="col-md-2 col-xs-2 text-center" style="width: 120px;">
                                <h1 style="font-weight: 800;border:3px solid #8ec63f;border-radius: 100%;" id="days">4</h1>
                                <h4 style="margin-top:-7px;padding: 0px;font-weight: 400">Days</h4>
                            </div>:
                            <div class="col-md-2 col-xs-2" style="width: 120px;">
                                <h1 style="font-weight: 800;border:3px solid #8ec63f;border-radius: 100%;" id="hours">4</h1>
                                <h4 style="margin-top:-7px;padding: 0px;font-weight: 400">hours</h4>
                            </div>:
                            <div class="col-md-2 col-xs-2" style="width: 120px;">
                                <h1 style="font-weight: 800;border:3px solid #8ec63f;border-radius: 100%;" id="minutes">4</h1>
                                <h4 style="margin-top:-7px;padding: 0px;font-weight: 400">minutes</h4>
                            </div>
                            <div class="col-md-2 col-xs-2" style="width: 120px;">
                                <h1 style="font-weight: 800;border:3px solid #8ec63f;border-radius: 100%;" id="seconds">4</h1>
                                <h4 style="margin-top:-7px;padding: 0px;font-weight: 400">seconds</h4>
                            </div>
                            </div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-8 col-md-offset-2">
                            <?php
                                if($this->session->flashdata){
                                    ?>
                                        <div class="alert alert-success">
                                        <button type="button" aria-hidden="true" class="close">×</button>
                                        <span><?=$this->session->flashdata('flashdata');?></span>
                                        </div>
                                    <?php
                                }
                                if(isset($flash))
                                {
                                    echo $flash;
                                }
                            ?>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats" style="min-height: 120px;">
                                <div class="card-header" data-background-color="blue">
                                   <img src="<?=base_url()?>assets/img/ethereum.png" style="width: 50px;height: 50px;">
                                </div>
                                <div class="card-content">
                                    <p class="category" style="font-size:20px;font-weight:500"><?=round(($_SESSION['etp_OrignlEthbal']),8)?></p>
                                    <h4 class="title">Ether Balance</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="<?=base_url();?>user/external_transaction"><div class="card card-stats" style="min-height: 120px;">
                                <div class="card-header" data-background-color="orange">
                                   <i class="material-icons">trending_up</i>
                                </div>
                                <div class="card-content">  
                                    <p class="category">SEND</p>
                                </div>
                            </div></a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="<?=base_url();?>user_address"><div class="card card-stats" style="min-height: 120px;">
                                <div class="card-header" data-background-color="lightblue">
                                   <i class="material-icons">receipt</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">RECEIVE</p>
                                </div>
                            </div></a>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                             <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Referral Code</h4>
                                </div>
                                
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <?php
                                            $value = base_url('user/signup/').$ref->result()[0]->refferal_code;
                                            ?>
                                            <div class="form-group label-floating is-empty">
                                                <input type="text" value="<?=$value?>" class="form-control" id="refferal_code" name="token_amount" placeholder="<?=base_url('user/signup/').$ref->result()[0]->refferal_code?>">
                                            <span class="material-input"></span></div>
                                            <span style="color: #ff9933">Get <?=$countdown->result()[0]->reffral_amount?>% bonus of first purchase of your referrals</span><br/>
                                            <a href="<?=base_url('user/see_referral_bonus')?>">See your referral bonus</a>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-info pull-right" value="Copy Referral Code" onclick="myFunction()">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                       <div class="col-md-1">
                                            <a href="https://twitter.com/intent/tweet?text=<?=$value?>&source=webclient" target="_blank" class="btn btn-info " style="background-color: #55ACEE">
                                                 <i class="fa fa-twitter"></i>
                                            </a>
                                       </div>
                                       <div class="col-md-1">
                                            <a class="btn btn-primary "  href="https://www.facebook.com/sharer.php?u=<?=$value?>" target="_blank" style="background-color: #3B5998">
                                                 <i class="fa fa-facebook"></i>
                                            </a>
                                       </div>
                                       <div class="col-md-1">
                                            <a href="https://plus.google.com/share?url=<?=$value?>" target="_blank" class="btn btn-danger " style="background-color: #DD4B39">
                                                 <i class="fa fa-google"></i>
                                            </a>
                                       </div>
                                       <div class="col-md-1">
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?=$value?>&source=LinkedIn" target="_blank" class="btn " style="background-color: #007BB6">
                                                 <i class="fa fa-linkedin"></i>
                                            </a>
                                       </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                                                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Google Authentication</h4>
                                </div>
                                
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-8 ">
                                            <span>Google Authentication enable?</span>
                                        </div>
                                        <div class="col-md-4">
                                          <?php
                                          if($ref->result()[0]->google_enable == 1)
                                          {
                                            ?>
                                             <a href="<?=base_url('user/google_enable')?>" class="btn btn-info pull-right">Disable</a>
                                            <?php
                                          }
                                          else
                                          {
                                            ?>
                                             <a href="<?=base_url('user')?>" class="btn btn-info pull-right">Enable</a>
                                            <?php
                                          }
                                          ?>
                                         </a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
       
<script>
function myFunction() {
  var copyText = document.getElementById("refferal_code");
  copyText.select();
  document.execCommand("Copy");
}
</script>



  <?php
            if(isset($countdown))
            {
            $end_date = $countdown->result()[0]->end_date;
            $e_date  =  explode('-', $end_date);
            $month = $e_date[1];
            $day = $e_date[2];
            $year = $e_date[0];
            ?>
            
                      
            <script type="text/javascript">
                function makeTimer() {

                        var endTime = new Date("<?=$month?> <?=$day?>, <?=$year?> 12:00:00 PDT");         
                        var endTime = (Date.parse(endTime)) / 1000;

                        var now = new Date();
                        var now = (Date.parse(now) / 1000);

                        var timeLeft = endTime - now;

                        var days = Math.floor(timeLeft / 86400); 
                        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                        if (hours < "10") { hours = "0" + hours; }
                        if (minutes < "10") { minutes = "0" + minutes; }
                        if (seconds < "10") { seconds = "0" + seconds; }

                        $("#days").html(days);
                        $("#hours").html(hours);
                        $("#minutes").html(minutes);
                        $("#seconds").html(seconds);       

                }

                setInterval(function() { makeTimer(); }, 1000);
            </script>
            <?php
            }
            ?>