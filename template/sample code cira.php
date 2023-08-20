<?php

                    $query="select * from complaints where fkey='$user_key'"; 
                    $res=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_array($res)){
                  ?>
<tr>
    <td><?php echo $row['comp_no']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['com_sub']; ?></td>
    <td><?php echo $row['com_status']; ?></td>
    <input type="hidden" name="comp_id" value="<?php echo $row['comp_no'];?>">
    <td><button type="submit" name="delete_comp" class="btn btn-outline-danger">Delete</button>
</tr>

<?php
                     $i=$i+1;
                    }
                    ?>