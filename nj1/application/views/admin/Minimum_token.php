
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Token Amount</a> <a href="#" class="current"></a> </div>

    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <?php
                if($this->session->flashdata('item'))
                {
                    echo $this->session->flashdata('item');
                }
                ?>                    

                            <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Minimum Token</h5>
                    </div>
                                <div class="widget-content nopadding">
                        <form action="<?=base_url('admin/minimum_token')?>" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Purchase Minimum Token :</label>
                                <div class="controls">
                                    <input type="text" name="min_token" class="span5" placeholder="Minimum Token" value="<?=$min_token; ?>">
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