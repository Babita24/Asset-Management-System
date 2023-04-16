<?php include('../includes/connection.php');?>
<?php include('../includes/admin_header.php');
$id = null;
$category = "";
$name = "";
$slug = "";
$status = "";
if (isset($_GET['id']) && $_GET['id']!=null){
   $id = $_GET['id'];
   $q = 'SELECT * FROM subcategory WHERE id=' . $id;
   $result = $con->query($q);
   
   $row = $result->fetch_assoc();
   $category = $row['catid'];
   $name = $row['name'];
   $slug = $row['slug'];
   $status = $row['status'];
}
 
 $q_category= "select * from category where status = 1 ";
$result1 =$con-> query($q_category);?>
<body>

   <div class="form-container">

      <form action="<?php echo $baseURl?>submit_pages/submit_subcategory.php" method="POST">
         <h3>Sub Category Form</h3>
         <div class="inputBox">
              
              <select name="category"   value="<?php echo $category; ?>" class="box" required>
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
         <input type="text" name="name"  value="<?php echo $name; ?>" placeholder="Sub Category Name" required class="box">
         <input type="text" name="slug"  value="<?php echo $slug; ?>" placeholder="Slug" required class="box">

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

</body>
<?php include('../includes/footer.php');?>