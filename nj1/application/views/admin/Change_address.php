<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Change User</a> <a href="#" class="current"></a> </div>

    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
            <style type="text/css">
                .error {
                   color: red;
                   }
            </style>
                            <?php
                             if(isset($flash))
                             {
                                echo $flash;
                             }
                             $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                             echo validation_errors();
                            ?>             
                            <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Create user</h5>
                    </div>
                                <div class="widget-content nopadding">
                        <form action="<?=base_url('admin/admin_address')?>" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Name:</label>
                                <div class="controls">
                                    <input type="text" name="name" class="span8" placeholder="name" value="<?=$name?>">
                                    <p class="help-block" style="color: #960004 "></p>

                                </div>
                                <label class="control-label">Email:</label>
                                <div class="controls">
                                    <input type="text" name="email" class="span8" placeholder="email" value="<?=$email?>">
                                    <p class="help-block" style="color: #960004 "></p>

                                </div>
                                <label class="control-label">Password:</label>
                                <div class="controls">
                                    <input type="password" name="password" class="span8" placeholder="password" value="<?=$password?>">
                                    <p class="help-block" style="color: #960004 "></p>

                                </div>
                                <label class="control-label">Password Confirmation:</label>
                                <div class="controls">
                                    <input type="password" name="password_confirmation" class="span8" placeholder="Password Confirmation" value="<?=$password_confirmation?>">
                                    <p class="help-block" style="color: #960004 "></p>

                                </div>
                                <label class="control-label">Private Key:</label>
                                <div class="controls">
                                    <input type="text" name="private_key" class="span8" placeholder="Private Key" value="<?=$private_key?>">
                                    <p class="help-block" style="color: #960004 "></p>

                                </div>
                                 <label class="control-label">Key_password:</label>
                                <div class="controls">
                                    <input type="text" name="key_password" class="span8" placeholder="Key Password" value="<?=$key_password?>">
                                    <p class="help-block" style="color: #960004 "></p>

                                </div>
                                <div class="form-actions">
                                    <input type="submit" class="btn btn-success" value="submit" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>