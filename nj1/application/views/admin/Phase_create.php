
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Phase create</a> <a href="#" class="current"></a> </div>

    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                                    
              <div class="widget-box">
                 <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Phase create</h5>
                    </div>
                                <div class="widget-content nopadding">
                        <form action="<?=base_url('admin/phase_create/').$update_id?>" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Phase title:</label>
                                <div class="controls">
                                    <input type="text" name="title" class="span5" placeholder="Phase title" value="" required="">
                                    <p class="help-block" style="color: #960004 "></p>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Bonus Amount:</label>
                                <div class="controls">
                                    <input type="text" name="bonus_amount" class="span5" placeholder="Bonus Amount" value="<?=$bonus_amount?>" required="" maxlength="2">
                                    <p class="help-block" style="color: #960004 "></p>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Reffral Amount:</label>
                                <div class="controls">
                                    <input type="text" name="reffral_amount" class="span5" placeholder="Reffral Amount" value="<?=$reffral_amount?>" required="" maxlength="2">
                                    <p class="help-block" style="color: #960004 "></p>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Target:</label>
                                <div class="controls">
                                    <input type="text" name="target" class="span5" placeholder="Target" value="<?=$target?>" required="">
                                    <p class="help-block" style="color: #960004 "></p>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Start date:</label>
                                <div class="controls">
                                    <input type="text" name="start_date" class="span5" placeholder="Start date" 
                                     id="datepicker" required="">
                                    <p class="help-block" style="color: #960004 "></p>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">End Date:</label>
                                <div class="controls">
                                    <input type="text" name="end_date" class="span5" placeholder="End date"  id="end_date" required="">
                                    <p class="help-block" style="color: #960004 " ></p>

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
