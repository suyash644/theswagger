<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a> <a href="#" class="current">Phase manage</a></div>
        <!--<h1>Categories</h1>-->
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
          <?php
            if(isset($flash))
            {
                echo $flash;
            }
            ?>
                
          <a href="<?=base_url('admin/phase_create')?>" class="btn btn-danger">Create</a>
            <div class="span12">
            </div>

            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Phase manage</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Bonus Amount</th>
                            <th>Referral Amount</th>
                            <th>Target</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($return->result() as  $row) 
                        {
                            ?>
                            <tr>
                                <td><?=$row->id?></td>
                                <td><?=$row->title?></td>
                                <td><?=$row->start_date?></td>
                                <td><?=$row->end_date?></td>
                                <td><?=$row->bonus_amount?></td>
                                <td><?=$row->reffral_amount?></td>
                                <td><?=$row->target?> </td>
                                <td><a href="<?=base_url('admin/phase_delete/').$row->id?>" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                                       
                            <?php
                        }
                        ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>