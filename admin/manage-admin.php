<?php include('partials/menu.php')?>


        <!-- Main contetnt section starts -->
        <div class = "main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br>

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br>
                <br>

                <!-- Button to add admin -->
                <a href="add-admin.php" class="btn-1">Add admin</a>
                <br>
                <br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    
                    <?php
                        $sql = "SELECT * FROM admin";

                        //execute the query
                        $res = mysqli_query($conn, $sql);

                        //check wether the query is executed or not
                        if($res==TRUE)
                        {
                            //Count the rows to check wether we have data in the database
                            $count = mysqli_num_rows($res);
                            $sn = 1;

                            if($count > 0)
                            {
                                while($rows=mysqli_fetch_assoc($res))   //gets all the data from the database and stores it
                                {
                                    $id= $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];    

                                    //display the values in our table
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $full_name;?></td>
                                        <td><?php echo $username;?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-2">Update Admin</a>
                                            <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-3"> Delete Admin</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                    ?>
                </table>
            </div>
        </div>

        <!-- Main content section ends here -->


 <?php include('partials/footer.php')?>
   