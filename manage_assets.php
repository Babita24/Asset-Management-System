<?php include('../includes/connection.php');?>
<?php include('../includes/admin_header.php');



 
 $q_location= "select * from assets where status = 1 ";
 $location = "";
 if (isset($_GET['id']) && $_GET['id']!=null  ) {
    $id = $_GET['id'];    
    $q9= 'SELECT * FROM assets WHERE id='.$id;
    $result = $con->query($q9);
 
    $row = $result->fetch_assoc();
 $location = $row['location'];
 }
 $result4 =$con-> query($q_location);
 
 
 ?>
<style>


input[type=text], select, textarea {
  width: 30%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
  margin-top: 16px;
  margin-bottom: 12px;
  margin-left: 80px;
  margin-right: 1px;
  resize: vertical;
}

input[type=submit] {
  background-color: #045faa;
  color: white;
  padding: 12px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #5e8ee7;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 5px;
}
</style>
<div class="container">

<form action="<?php echo $baseURl?>manage_pages/manage_assets.php"  method="post">

    <input type="text" id="assetName" name="assetName" placeholder="Asset name...">

    


    <button type="submit" name="submit" class="btn btn-primary" style='font-size:19px'>Search</button>
    <a class='btn btn-default' style='font-size:19px' href='<?php echo $baseURl?>manage_pages/manage_assets.php'>Clear</a>
    <a class='btn btn-warning' style='font-size:19px' href='<?php echo $baseURl?>pages/asset.php'>Add Assets</a>
</form>
</div>


<?php
$location='';
$assetName='';
$assetId=array();
$q='';
$d='';

$q7 = "SELECT * FROM assets";





if(isset($_POST['assetName'])){
    $assetName=$_POST['assetName'];
    $q7="SELECT * FROM assets WHERE name LIKE '%".$assetName."%'";
    

}



?>
<style>
.table>thead>tr>th {
        border-bottom: 1px solid #e7e7e7;
        font-weight: 600;
        font-size: 14px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
    }
</style>
<div class="container-fluid">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">

               
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="table-fit  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">S.No.</th>
                                    <th class="text-nowrap">NAME</th>
                                    <th class="text-nowrap">CATEGORY</th>
                                    <th class="text-nowrap">SUBCATEGORY</th>
                                    <th class="text-nowrap">BRAND</th>
                                    <th class="text-nowrap">LOCATION</th>
                                    <th class="text-nowrap">DISTRIBUTOR</th>
                                    <th class="text-nowrap">CURRENT STATUS</th>
                                    <th class="text-nowrap">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                
                              
                                $r7 = $con->query($q7);
                                while ($row = mysqli_fetch_assoc($r7)) { ?>
                                    <tr id="c<?php echo $row['id']; ?>">
                                        <td><?php echo $i; ?></td>

                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php  echo get_categoryname($row['catid'],$con) ;?></td>
                                        <td><?php  echo get_subcategoryname($row['subcatid'],$con) ;?></td>
                                        <td><?php  echo get_brandname($row['brandid'],$con) ;?></td>
                                        <td><?php echo $row['location']; ?></td>
                                        <td><?php  echo get_distributorname($row['distributorid'],$con) ;?></td>
                                        <td>
                                        <div class="row">
                                                 <label class="switch" style>
                                                    <input type="checkbox" onclick="change_status(<?php echo $row['id'];?>,<?php echo $row['status'];?>);"<?php if ($row['status'] == 1) {echo "checked";} else { echo "";}?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <?php if ($row['status'] == 0) 
                                            {
                                                echo "<span  class='label label-rouded label-warning pull-right'>Inactive</span>";
                                            } else {
                                                echo "<span class='label label-rouded label-success pull-right'>Active</span>";
                                                   }

                                            ?>

                                        </td>
                                        <td>
                                            
             
                            <a class='btn btn-primary' href='<?php echo $baseURl?>pages/asset.php?id=<?php echo $row['id'];?>'><i class='fa fa-pencil' style='font-size:21px'></i></a>
							<a class='btn btn-danger'  href='<?php echo $baseURl?>delete_pages/deleteassets.php?id=<?php echo $row['id']?>'><i class='fa fa-trash' style='font-size:21px'></i></a>
                            <a class='btn btn-dark' href='<?php echo $baseURl?>manage_pages/manage_assetcount.php?asset_id=<?php echo $row['id'];?>'><i class='	fas fa-plus-square' style='font-size:21px'></i></a>
                        </td>
							</tr>
                      </div>

                                        

                                    </tr><?php $i++;
                                        } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
<script>

function change_status(id, status){
            $.ajax({ 
                url:"<?php echo $baseURl?>change_status_pages/change_asset_status.php",
                method:"get",
                data:{id:id, status:status},
                success:function(data){
                   
    location.reload();
                    
                         }
                        
                

            })
        }
</script>





<?php include('../includes/footer.php');?>