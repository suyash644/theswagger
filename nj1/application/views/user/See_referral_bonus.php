    <div class="content" style="margin-top: 0px;">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-8 col-md-offset-2">
                           <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Referral Bonus Earned</h4>
                                </div>
                                
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12 text-center " style="background-color: white;">
                                         <?php
                                         if(count($return->result()) > 0)
                                                 {
                                                  ?>
                                         <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th>S.No</th>
                                                <th>Token</th>
                                                <th>Date</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                                 <?php
                                                 $i = 0;

                                                 foreach ($return->result() as  $row) 
                                                 {
                                                    $i++;
                                                      # code...
                                                    ?>
                                                    <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$row->amount?></td>
                                                    <td><?=$row->ref_date?></td>
                                                  </tr>
                                                    <?php
                                                 }
                                                 ?>
                                              </tbody>
                                              </table>
                                              <?php
                                            } else { echo "There is no Referral earning to show."; }
                                            ?>
                                       </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
        </div>
        </div>