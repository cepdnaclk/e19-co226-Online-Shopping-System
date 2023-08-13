<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
  $brand_title=$_POST['brand_title'];

  //select data from the database
  $select_query="Select * from `brands` where brand_title='$brand_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('This brand is present insinde the database.')</script>";
  }else{
    $insert_query="insert into `brands` (brand_title) values ('$brand_title') ";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('Brand has been inserted successfully')</script>";
  }
  }
    
  
}
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
  <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" 
  aria-label="brands" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-success border-0 p-2 my-3 " name="insert_brand" value="Insert Brands" >
    </div>
</form>