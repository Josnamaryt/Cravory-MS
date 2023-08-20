<td><b style='color:black;'>Upload Photo:</td>
	 <td><input name="u_img" type="file" id="photoimg"></td>
     //-----------user image upload to database----------
       $filename=$_FILES["u_img"]["name"];
       $tempname=$_FILES["u_img"]["tmp_name"];
       $dir="./uploads/".$filename;
       //.................

       //-------- moving file from temp to uploads----------//
       if($re)
       {
              if(move_uploaded_file($tempname,$dir)){
                   //  echo "file successfully uploaded";
              }
              else echo"error uploading file";
       }
       else{
             // echo"retry";
       }
       <td><img src="\The Cravory\uploads\<?php echo $user_list['u_img'];?>"width="40"height="40"></td>
       <th> User Image </th>
       

       <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Image</span>
                                </div>
                                <input name="p_img" type="file" id="photoimg">
                            </div>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "cravory");

                        $log_query="SELECT * FROM `product` WHERE 'p_img'='$p_img'";
                        $re=mysqli_query($conn,$log_query);
                        $num = mysqli_num_rows($re);

                            $filename=$_FILES["p_img"]["name"];
                            $tempname=$_FILES["p_img"]["tmp_name"];
                            $dir="./uploads/".$filename;

                            if($re)
                                {
                                        if(move_uploaded_file($tempname,$dir)){
                                            //  echo "file successfully uploaded";
                                        }
                                        else echo"error uploading file";
                                }
                                else{
                                        // echo"retry";
                                }
                        ?>
                        <td><img src="\The Cravory\uploads\<?php echo $user_list['p_img'];?>"width="40"height="40"></td>
                        
                    </div>