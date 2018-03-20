<div class="wrapper" style="padding: 40px;">
  <div class="main-panel">
    <div class="row-fluid">
        
      <div class="col-sm-12 col-md-8">
		<!-- main content -->
         
	       <div id="main_content" class="panel-body">
	       <!-- page heading -->
               <div class="card" style="min-height: 300px;">      
         
                        <?php
                        if(isset($flash))
                        {
                            echo $flash;
                        }
                        ?>
                        <div class="col-md-12" style="text-align: center;">
            <a href="<?=base_url('user/change_password')?>" style="text-transform: uppercase;"><h4>Change Password</h4></a>
         </div>  
                            <div class="boxed bg--secondary boxed--lg boxed--border"> 
                                                      
                                <form method="post" action="<?=base_url('user/update_name');?>">
                                     <div class="col-md-12" style="margin-top: 50px;">
                                            <label style="margin-left: 25px;">EMAIL : </label>
                                            <span class="h5"><?=$profile->email;?></span>
                                        </div> 
                                      
                                       <div class="form-group" style="padding: 40px;">
                                            <label>NAME :</label> 
                                            <input class="validate-required form-control" type="text" value="<?=$profile->name;?>" name="name" placeholder="UserName..." /><br />
                                            <input type="submit" name="submit" value="UPDATE NAME" class="btn btn-info btn-sm"/>
                                        </div>
                                </form>
                             </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
            </div>
            </div>
        </div>
 
