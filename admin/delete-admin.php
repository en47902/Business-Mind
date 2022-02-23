<?php

    include('../config/constants.php');

    //1. get the ID of admin to be deleted
    $id = $_GET['id'];


    //2.create sql query to delete admin
    $sql = "DELETE FROM admin WHERE id=$id";

    //execute the query

    $res = mysqli_query($conn, $sql);

    if($res == TRUE)
    {
        //create session variable to display the message
        $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to delete Admin</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }

    //3. Redirect to manage admin page with message
?>