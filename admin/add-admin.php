<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['add']))     //checking wether the session is set or not
            {
                echo $_SESSION['add'];      //display message if yes
                unset($_SESSION['add']);    //remove session
            }
        ?>
        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td>
                    <input type="text" name="full_name" placeholder="Your Name">
                </td>
            </tr>
            <tr>
                <td>Username: </td>
                <td>
                    <input type="text" name="username" placeholder="Your Username">
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td>
                    <input type="password" name="password" placeholder="Your Password">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-2">
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php')?>

<?php
    //Process the value from Form and save it in the database

    //check if the button is clicked or not
    if(isset($_POST['submit']))
    {
        //button clicked
        //1. get the data from form

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. sql query to save the data into the database

        $sql = "INSERT INTO admin SET 
            full_name ='$full_name',
            username = '$username',
            password = '$password'
        ";
        
        
        //3. executing query and saving it in the database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4.check if the (query is executed) data is inserted or not and display appropriate message

        if($res==TRUE)
        {
            //create a session variable to display message 
            $_SESSION['add'] = "<div class ='success'>Admin added successfully</div>";
            //redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
            //redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
    
?>