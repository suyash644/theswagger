<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a> <a href="#" class="current">Users</a></div>
        <!--<h1>Categories</h1>-->
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
            </div>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Internal Transaction History</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Unique Id</th>
                            <th>Balance</th>
                            <th>Date Of Creation</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($result as $row)
                        {
                            $i++;
                            ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td><?=$row->name?></td>
                                <td><?=$row->email?></td>
                                <td><?=$row->unique_id?></td>
                                <td><?=round($row->token_amt/1000000000000000000); ?></td>
                                <td><?=$row->date_of_creation?></td>
                                <td>
                                <?php 
                                  if($row->u_status == 1)
                                  {
                                    ?>
                                     <a type="button" class="btn btn-danger" href="<?=base_url('admin/user_block/block/').$row->id?>" onclick="return confirm('Are you sure you want to block that user?')">Block</a>
                                  <?php
                                  }
                                  else
                                  {
                                    ?>
                                     <a type="button" class="btn btn-success" href="<?=base_url('admin/user_block/unblock/').$row->id?>" onclick="return confirm('Are you sure you want to Unblock that user?')">Unblock</a>
                                    <?php
                                  }
                                 ?>
                                 </td>
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
</div><!--Footer-part-->
