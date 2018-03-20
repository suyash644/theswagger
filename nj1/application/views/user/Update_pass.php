<div class="wrapper">
<div class="main-panel">             
<div class="col-sm-12 col-md-6">
		<!-- main content -->
	       <div id="main_content" class="panel-body">
	       <!-- page heading -->
           <div class="card"> 
           
           
           
                <div class="boxed bg--secondary boxed--lg boxed--border" style="padding: 30px"> 
                    <?php
                if(isset($flash))
                {
                    echo $flash;
                }
                ?>

                        <form method="post" class="form-horizaontal" action="<?=base_url('user/update_password');?>">
                                <div class="form-group">
                                    <label>Old Password:</label>
                                    <input class="validate-required form-control" type="Password" value="" name="old_pass" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label>New Password:</label>
                                    <input class="validate-required form-control" type="Password" value="" name="new_pass1" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password:</label>
                                    <input class="validate-required form-control" type="Password" value="" name="new_pass2" placeholder="" />
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Change Password" class="btn btn-danger btn-sm"/>
                                </div>


                        </form>
                 
                </div>
            </div>
        </div>

</div>
</div>
</div>