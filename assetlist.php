<?php include('../includes/connection.php');?>
<?php include('../includes/admin_header.php');
$location='';
$assetName='';
$assetId=array();
$q='';
$d='';

if(isset($_POST['location'])){
    $location=$_POST['location'];
}

if(isset($_POST['assetName'])){
    $assetName=$_POST['assetName'];
    $qs="SELECT id FROM assets WHERE name LIKE '%".$assetName."%'";
    $r7 = $con->query($qs);
    while ($row = mysqli_fetch_assoc($r7)) {
        array_push($assetId,$row['id']);
    }
    $d=implode(',',$assetId);

}



if($location!=''){
    $q="SELECT * FROM assetcount WHERE location=".$location;
}





if(!empty($assetId) ){
    $q="SELECT * FROM assetcount WHERE name IN (".$d.")";
}

if($location!='' && $assetId!=''  ){
$q="SELECT * FROM assetcount WHERE location=".$location." AND name IN (".$d.")";


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

                <div class="card-title">
                   

                </div>
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>ASSET NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>LOCATION</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                               
                              
                                $r7 = $con->query($q);
                                while ($row = mysqli_fetch_assoc($r7)) { ?>
                                    <tr id="c<?php echo $row['id']; ?>">
                                        <td><?php echo $i; ?></td>                             
                               
                                
                                        <td><?php  echo get_assetname($row['name'],$con) ;?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php  echo get_locationname($row['location'],$con) ;?></td>
                                        
                                
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
                                

<?php include('../includes/footer.php');?>