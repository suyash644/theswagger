     <div class="wrapper">       
        <div class="main-panel">
             <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            
                                <?php
                                if(isset($flash))
                                {
                                    echo $flash;
                                }

                                if($withdrawal_permission == 0){
                                    ?>
                                        <div class="alert alert-info alert-with-icon" data-notify="container">
                                        <button type="button" aria-hidden="true" class="close">×</button>
                                        <i data-notify="icon" class="material-icons">add_alert</i>
                                        <span data-notify="message">You don't have permission to withdraw Coinself Coin.</span>
                                        </div>
                                    <?php
                                }else{
                                    ?>
                                <div class="card">
                                    <div class="card-header" data-background-color="purple">
                                        <h4 class="title"> Send Token</h4>
                                    </div>
                                    <div class="card-content">
                                    <form method="post" action="<?=base_url('user/save_external_transaction')?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" class="form-control" name="address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Amount</label>
                                                    <input type="text" class="form-control" name="amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Fees in Ether</label>
                                                    <input type="text" class="form-control" name="fees" value="<?=$extrnl;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-info pull-right" value="Send Amount">
                                        <div class="clearfix"></div>
                                    </form>
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