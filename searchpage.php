<?php include('../includes/admin_header.php');?>

<?php include('../includes/connection.php');
 
 $q_location= "select * from assets where status = 1 ";
 $location = "";
 if (isset($_GET['id']) && $_GET['id']!=null  ) {
    $id = $_GET['id'];    
    $q9= 'SELECT * FROM assets WHERE id='.$id;
    $result = $con->query($q9);
 
    $row = $result->fetch_assoc();
 $location = $row['location'];
 }
 $result4 =$con-> query($q_location);?>


<?php
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
if($location!='' && $assetId!=''){

   if($d != ''){
    $q="SELECT * FROM assetcount WHERE location=".$location." AND name IN (".$d.")";
   }elseif($assetName!=''){
    $q="";
   }
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 30%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 12px;
  margin-left: 100px;
  margin-right: 5px;
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
</head>
<body>

<center><h2><b>SEARCH PAGE</b></h2></center>

<div class="container">

<form action="<?php echo $baseURl?>pages/searchpage.php"  method="post">

    <input type="text" id="assetName" name="assetName" value="<?php echo $assetName;?>" placeholder="Asset name...">

    <select name="location"   value="<?php echo $location; ?>" class="box">
                 <option value=""> Select Location</option>
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


    <button type="submit" name="submit" class="btn btn-primary" style='font-size:19px'>Search</button>
  </form>
</div>

</body>
</html>

    



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
                            if($q!=''){
                                $i = 1;
                               
                                $r7 = $con->query($q);
                                if(mysqli_num_rows($r7) > 0){
                                    while ($row = mysqli_fetch_assoc($r7)) { ?>
                                        <tr id="c<?php echo $row['id']; ?>">
                                            <td><?php echo $i; ?></td>                             
                                   
                                    
                                            <td><?php  echo get_assetname($row['name'],$con) ;?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php  echo get_locationname($row['location'],$con) ;?></td>
                                            
                                    
                                            </tr><?php $i++;
                                    }
                                }else{
                                    echo "<tr><td colspan='4'>No Data Found</td></tr>";
                                }

                                
                            }else{
                                echo "<tr><td colspan='4'>No Data Found</td></tr>";
                            }

                                 ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
                                

</html>

<?php include('../includes/footer.php'); ?>


