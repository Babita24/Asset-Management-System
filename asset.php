<?php include('../includes/connection.php');?>
<?php include('../includes/admin_header.php');
$id = null;
$name = null;
$category = "";
$subcategory = "";
$brand = "";
$brand_code = "";
$location = "";
$distributor = "";
$status = "";
if (isset($_GET['id']) && $_GET['id']!=null  ) {
   $id = $_GET['id'];    
   $q = 'SELECT * FROM assets WHERE id='.$id;
   $result = $con->query($q);

   $row = $result->fetch_assoc();
   $name = $row['name'];
   $category = $row['catid'];
   $subcategory = $row['subcatid'];
   $brand = $row['brandid'];
   $brand_code = $row['brand_code'];
   $location = $row['location'];
   $distributor = $row['distributorid'];
   $status = $row['status'];
}
$q_subcategory="";
if (isset ($_GET['id']) && $_GET['id']!=null )
{
   $q_subcategory= "select * from subcategory WHERE catid =".$category." and  status = 1 ";
 
}else{
   $q_subcategory= "select * from subcategory WHERE status = 1 ";
}
$result2 =$con-> query($q_subcategory);

 $q_category= "select * from category where status = 1 ";
 $result1 =$con-> query($q_category);


 $q_brand= "select * from brand where status = 1 ";
 $result3 =$con-> query($q_brand);

 
 $q_location= "select * from assets where status = 1 ";
 $result4 =$con-> query($q_location);
 
 
 $q_distributor= "select * from distributor where status = 1 ";
 $result5 =$con-> query($q_distributor);
?>
<body>
<div class="form-container">

   <form action="<?php echo $baseURl?>submit_pages/submit_asset.php" method="post">
      <h3>Assets Form</h3>
      <div class="flex">
            <input type="hidden" value="<?php echo $id ?>" name="id">
      <input type="text" name="name" value="<?php echo $name;?>" placeholder=" Name of Asset" required class="box">
     

      <div class="inputBox">
              
              <select name="category" value="<?php echo $category; ?>" class="box" onchange="getSubCategory(this.value)" required>
                 <option> Select Category</option>
                 <?php 
                 $selected='';
                 while($row = $result1->fetch_assoc()) {
                    if($category==$row['id']){
                       $selected='selected';
                    }else{
                       $selected='';
                    }
                    echo "<option value=".$row['id']."  ".$selected.">".$row['name']."</option>";
                  }?>
               
              </select>
           </div>

                 
              
              <select name="subcategory" id="subCategory" value="<?php echo $subcategory; ?>" class="box" required>
                 <option> Select Sub Category</option>
                 <?php 
                 $selected='';
                 while($row = $result2->fetch_assoc()) {
                    if($subcategory==$row['id']){
                       $selected='selected';
                    }else{
                       $selected='';
                    }
                    echo "<option value=".$row['id']."  ".$selected.">".$row['name']."</option>";
                  }?>
              </select>

                  <div class="inputBox">
              
              <select name="brand" value="<?php echo $brand; ?>" class="box" required>
                 <option> Select Brand</option>
                 <?php 
                 $selected='';
                 while($row = $result3->fetch_assoc()) {
                    if($brand==$row['id']){
                       $selected='selected';
                    }else{
                       $selected='';
                    }
                    echo "<option value=".$row['id']."  ".$selected.">".$row['name']."</option>";
                  }?>
              </select>
                  </div>

      
              
                        
                  <div class="inputBox">
              
              <select name="location"   value="<?php echo $location; ?>" class="box" required>
                 <option> Select Location</option>
                 <?php 
                 $selected='';
                 while($row = $result4->fetch_assoc()) {
                    if($location==$row['id']){
                       $selected='selected';
                    }else{
                       $selected='';
                    }
                    echo "<option value=".$row['id']."  ".$selected.">".$row['location']."</option>";
                  }?>
              </select>
                  </div>
                  <select name="distributor" value="<?php echo $distributor; ?>" class="box" required>
                 <option> Select Distributor</option>
                 <?php 
                 $selected='';
                 while($row = $result5->fetch_assoc()) {
                    if($brand==$row['id']){
                       $selected='selected';
                    }else{
                       $selected='';
                    }
                    echo "<option value=".$row['id']."  ".$selected.">".$row['name']."</option>";
                  }?>
              </select>
                  </div>
              

 <select name="status" class="box">
               <option <?php if ($status == 1) {
                           echo "selected";
                        } ?> value="1">status true</option>
               <option <?php if ($status == 0) {
                           echo "selected";
                        } ?> value="0">status false</option>
            </select>
      <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
         </div>
    
   </form>

</div>
<script>
   function getSubCategory(catid){
      

      $.post('support/getSubcategoryList.php', {category:catid}, function(response){ 
         document.getElementById('subCategory').innerHTML=response;
      });
   }
</script>


</body>

<?php include('../includes/footer.php');?>


