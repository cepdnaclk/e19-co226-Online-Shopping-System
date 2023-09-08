<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE -edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
      <!-- bootstrap css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
        crossorigin="anonymous">
        

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
          body{
            overflow: hidden;
          }  
        </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center text-success mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../Images/admin.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4 col-xl-5">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4 col-xl-5">
                        <label for="username" class="form-label">Email</label>
                        <input type="text" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4 col-xl-5">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4 col-xl-5">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your password again" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-success py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<!-- php code -->
<?php 
if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['username'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['confirm_password'];


    //select query
    $select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username or Email already exist.')</script>";
    }else if($admin_password!=$conf_user_password){
        echo "<script>alert('Passwords do not match')</script>";
    }else{
    //insert query
    $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) values ('$admin_name','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    
   }
}
    ?>