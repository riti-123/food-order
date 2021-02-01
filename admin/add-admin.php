<?php include('partials/menu.php');
?>


 <!-- Main content Section Starts -->
 <div class="main-content ">
             <div class="wrapper">
                <h1>Add Admin</h1>
                <br><br>

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; // displaying session message
                        unset($_SESSION['add']); //  removing session message
                    }
                ?>



                <form action="" method="post">
                    <table class="tbl-30">
                        <tr>
                            <td>Full Name:</td>
                            <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                        </tr>

                        <tr>
                            <td>UserName:</td>
                            <td><input type="text" name="username" placeholder="Your UserName"></td>
                        </tr>

                        <tr>
                            <td>Password:</td>
                            <td><input type="Password" name="Password" placeholder="Your Password"></td>
                        </tr>
                    </table>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>

                </form>
             </div>
</div>
  


<?php include('partials/footer.php');
?>

<?php
   ///process the value from Form and save it in Database

   //Check whether the submit button is clicked or not 

   if(isset($_POST['submit']))
   {
      // Button clicked 
      // echo "Button clicked";

      // 1.Get the data from Form
       $full_name = $_POST['full_name'];
       $username = $_POST['username'];
       $Password = md5($_POST['Password']); // Password encryption with md5

       // 2. SQL query to save data into database
       $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            Password='$Password'
       ";
    
        
        // 3. Executing query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // 4. check whether the (query is executed) data is inserted or not and display appropriate messsage
        if($res==TRUE)
        {
            // DATA inserted
            // echo "data inserted";
            //create a variable to display message 
            $_SESSION['add'] = "Admin Added Successfully";
            // Redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // failed to insert data
            // echo "failed to insert data";
            
            $_SESSION['add'] = "Failed To Add Admin ";
            // Redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

   }
   

   ?>