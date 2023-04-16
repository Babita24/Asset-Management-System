<?php include('../includes/connection.php');?>
<?php include('../includes/admin_header.php');?>

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

                <div class="card-title">
                    <center>
                        <h1>MANAGE BRANDS </h1>
                        <a class='btn btn-warning' href='<?php echo $baseURl?>pages/brand.php?id='><i class='fa fa-add' style='font-size:21px'></i></a>
                       
                    </center><br>

                </div>
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>BRAND NAME</th>
                                    <th>BRAND CODE</th>
                                    <th>LOGO</th>
                                    <th>SLUG</th>
                                    <th>CURRENT STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $q7 = "SELECT * FROM brand";
                              
                                $r7 = $con->query($q7);
                                while ($row = mysqli_fetch_assoc($r7)) { ?>
                                    <tr id="c<?php echo $row['id']; ?>">
                                        <td><?php echo $i; ?></td>

                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['brand_code']; ?></td>
                                        <td><img src="../images/users/<?php echo $row['logo'];?>" style="height:100px; width: 150px"></td>
                                        <td><?php echo $row['slug']; ?></td>
                                        
                                        <td>
                                        <div class="row">
                                                
                                                <label class="switch" style>
                                                    <input type="checkbox" onclick="change_status(<?php echo $row['id']; ?>,<?php echo $row['status']; ?>);" <?php if ($row['status'] == 1) {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } else {
                                                                                                                                                                                echo "";
                                                                                                                                                                            }
                                                                                                                                                                            ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <?php if ($row['status'] == 0) {
                                                echo "<span  class='label label-rouded label-warning pull-right'>Inactive</span>";
                                            } else {
                                                echo "<span class='label label-rouded label-success pull-right'>Active</span>";
                                            }

                                            ?>

                                        </td>
                                        <td>
                                            
                                                
                            <a class='btn btn-primary'  href='<?php echo $baseURl?>pages/brand.php?id=<?php echo $row['id'];?>'><i class='fa fa-pencil' style='font-size:21px'></i></a>
							<a class='btn btn-danger' href='<?php echo $baseURl?>delete_pages/deletebrands.php?id=<?php echo $row['id']?>'><i class='fa fa-trash' style='font-size:21px'></i></a>
                            
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
                url:"<?php echo $baseURl?>change_status_pages/change_brands_status.php",
                method:"get",
                data:{id:id, status:status},
                success:function(data){
  
    location.reload();
                    
                         }
                        
                

            })
        }
</script>
<?php include('../includes/footer.php');?>