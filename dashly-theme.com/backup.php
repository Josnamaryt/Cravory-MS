            <!-- Profile view
            <div class="modal fade" id="1user_profile_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="1user_profile_modal">User profile</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <table border=2 cellpadding="10"> 
                                <tr>
                                        <th> User Name </th>
                                        <th> User Email </th>
                                        
                                        <th> User address </th>
                                        <th> User Phone </th>
                                        <th> Action </th>
                                        <th> Status </th>
                                    
                                </tr>
                                    <?php
                                    // $User_view_query = "SELECT * FROM `user_credential_reg`";
                                    // $res_user = mysqli_query($conn, $User_view_query);
                                
                                    // while ($user_list = mysqli_fetch_array($res_user)) {
                                    // ?>
                                <tr>
                                    <td><?php// echo $user_list['u_name']; ?></td>
                                    <td><?php echo $user_list['u_mail']; ?></td>
                                
                                    <td><?php// echo $user_list['u_adrs']; ?></td>
                                    <td><?php// echo $user_list['u_phone']; ?></td>
                                    <input type="hidden" name="u_id" value="<?php //echo $user_list['u_id'];?>">
                                    <td><button type="submit" name="userview_delete" class="btn btn-outline-danger">Delete</button>
                                
                                    <td><center>
                                    
                                    <p class="text-muted mb-0"><?php 
                                    if($user_list['u_status']==1){
                                        echo "<div class='badge rounded-pill text-bg-success' role='alert' style='transform: scale(1.0)'>
                                        Active
                                    </div>";
                                    }
                                    elseif($user_list['u_status']==2){
                                        echo "<div class='badge rounded-pill text-bg-warning' role='alert' style='transform: scale(0.7)'>
                                        suspended
                                    </div>";
                                    } 
                                    elseif($user_list['u_status']==3){
                                        echo "<div class='badge rounded-pill text-bg-danger' role='alert' style='transform: scale(0.7)'>
                                        Removed
                                    </div>";
                                    }
                                    else{ 
                                        echo "<div class='spinner-border spinner-border-sm'>
                                    </div>";  
                                    }
                                    ?></p></center>
                                    </td> 
                                </tr>
                                <?php
                                    }
                                ?>
                                </table>
                                </div>


                            <div class="modal-footer">
                                <button type="submit" name="userprofile" class="btn btn-outline-success">Success</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                                <?php
                                    $conn = mysqli_connect("localhost", "root", "", "cravory");
                                    if(isset($_POST['userview_delete'])){
                                    $del_user_id=$_POST['u_id'];
                                    $del_query="DELETE FROM `user_credential_reg` WHERE `u_id`= $del_user_id ";
                                    $del_user=mysqli_query($conn,$del_query);
                                    if($del_user){
                                        ?> <script>alert("Deleted successfully"); </script><?php 
                                    }
                                    }     
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div> -->