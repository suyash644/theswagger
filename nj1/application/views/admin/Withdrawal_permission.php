<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a> <a href="#" class="current">Users</a></div>
        <!--<h1>Categories</h1>-->
    </div>
    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="col-md-6 col-md-offset-2">
                <button class='btn btn-info btn-large' id='authorize_all' >Authorize All</button>
                <button class='btn btn-info btn-large' id='unauthorize_all' >Unauthorize All</button>
            </div>
            <div class="span12">

            </div>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Permission</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
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
                                <td><?=$i?></td>
                                <td><?=$row->name?></td>
                                <td><?=$row->email?></td>
                                <td><?php
                                  if($row->permission == 0){
                                    echo "<p id='p".$row->id."' style='float:left'>Unauthorized</p>";
                                    echo "<button style='float:right' class='btn btn-success' id='unauthorized".$row->id."' onClick='permission_withdrawal(".'"unauthorized"'.",".$row->id.")'>Click to authorize</button>";
                                  }else{
                                    echo "<p 'p".$row->id."' style='float:left'>Authorized</p>";
                                    echo "<button style='float:right' class='btn btn-danger' id='authorized".$row->id."' onClick='permission_withdrawal(".'"authorized"'.",".$row->id.")'>Click to unauthorize</button>";
                                  }
                                ?></td>
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
<script>
    function permission_withdrawal(status,id){
        if(status == 'unauthorized'){
            var url = "<?=base_url('admin/authorize_user');?>";
        }else{
            var url = "<?=base_url('admin/unauthorize_user');?>";
        }
        dataa = "id="+id;
        $.ajax({
            type:"POST",
            url : url,
            data:dataa,
            success:function(response){
                window.location.href="<?=base_url('admin/withdrawal_permission')?>";
                // if($.trim(response) == "authorized"){
                //     $("p"+id).replaceWith("Authorized");
                //     $("#unauthorized"+id).replaceWith("<button style='float:right' class='btn btn-danger' id='authorized"+id+"' onClick='permission_withdrawal("+'"authorized"'+","+id+")'>Click to unauthorize</button>");
                //     }else if($.trim(response) =="unauthorized"){
                //         $("p"+id).replaceWith("Unauthorized");
                //         $("#authorized"+id).replaceWith("<button style='float:right' class='btn btn-success' id='unauthorized"+id+"' onClick='permission_withdrawal("+'"authorized"'+","+id+")'>Click to unauthorize</button>");
                // }
            }
        });
    }
    $("#authorize_all").click(function(){
        $.ajax({
            type:"POST",
            url : "<?=base_url('admin/authorize_all_user');?>",
            success:function(response){
                window.location.href="<?=base_url('admin/withdrawal_permission')?>";
            }
        });   
    });
    $("#unauthorize_all").click(function(){
        $.ajax({
            type:"POST",
            url : "<?=base_url('admin/unauthorize_all_user');?>",
            success:function(response){
                window.location.href="<?=base_url('admin/withdrawal_permission')?>";
            }
        });   
    });
</script>