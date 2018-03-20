
<script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
     <div class="wrapper">       
        <div class="main-panel">
             <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                                <?php 
                                if($this->session->flashdata('flashdata'))
                                {
                                    ?>
                                <div class="col s12 m2">
                                    <div class="alert alert-danger">
                                        <button type="button" aria-hidden="true" class="close">×</button>
                                        <span><?=$this->session->flashdata('flashdata')?></span>
                                    </div>
                                </div>
                                <?php
                               }
                               ?>
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Purchase Token</h4>
                                </div>
                                
                                <div class="card-content">
                                    <form method="post" action="<?=base_url('user/purchase_token')?>">
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <p style="text-align: center;">Minimum Token Purchase :- <?=$min_token?></p>
                                                <p style="text-align: center;">Your ETH Balance :- <?= $_SESSION['user_ether_balance'];?></p>
                                                <p style="text-align: center;">1 Token  = <?=$token_value?> Ethereum</p>
                                                 <p style="text-align: center;">Bonus Amount:-<?=$countdown->result()[0]->bonus_amount?>%</p>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Token</label>
                                                    <input type="text" class="form-control" id="__tkn_amt__" name="token_amount" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <input type="text" class="form-control" id="bonus_amout" value="" disabled="disabled" placeholder="Bonus Amount">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" id="eth_charge" name="eth_charge" value="" placeholder="Charges in Ether" disabled="disabled">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Fee</label>
                                                    <input type="text" class="form-control" name="fees" value="0.001" disabled="disabled">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-info pull-right" value="Send Amount">
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
           eth_charge = <?=$token_value?>;
           var total_eth_charges = token_amount*eth_charge;
           var total_bonus = token_amount * <?=$countdown->result()[0]->bonus_amount?> * 1/100;
           var total_token_amt = parseFloat(token_amount) +parseFloat(total_bonus);
           $("#bonus_amout").val(token_amount + '+' + parseFloat(total_bonus) + ' (Bonus Amount) ='+total_token_amt);
           $("#eth_charge").val(parseFloat(total_eth_charges));
        });
    });
    
</script>