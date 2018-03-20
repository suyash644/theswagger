<script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
     <div class="wrapper">       
        <div class="main-panel">
             <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-4">
                            Ether : <input type="radio" id="eth_transfer" name="withdrawl">
                            </div>
                            <div class="col-md-4">
                            Coinself Coin : <input type="radio" id="csf_coin" name="withdrawl">
                            </div>
                                <?php
                                echo $permission;
                                if($this->session->flashdata('flashdata')){
                                ?>
                                <div class="col s12 m2">
                                      <div class="alert alert-success">
                                        <button type="button" aria-hidden="true" class="close">×</button>
                                        <span>
                                        <?php
                                            echo $this->session->flashdata('flashdata');
                                        ?>
                                            
                                        </span>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                                
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
</div>
</div>
<script>
$(document).ready(function(){
    $("input[type=radio]").click(function(){

        if($(this).attr("id") == "eth_transfer"){
            
            window.location.href="<?=base_url('user/transfer_ether')?>";
        }else if($(this).attr("id") == "csf_coin"){
            
            window.location.href="<?=base_url('user/external_transaction')?>";
        }
    });
});
</script>