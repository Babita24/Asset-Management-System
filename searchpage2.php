<?php include('../includes/admin_header.php');?>

<?php include('../includes/connection.php');
 $status= "";
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
 
 
 
 $q_created_at= "select * from assets where status = 1 ";
 $created_at = "";
 if (isset($_GET['id']) && $_GET['id']!=null  ) {
    $id = $_GET['id'];    
    $q9= 'SELECT * FROM assets WHERE id='.$id;
    $result9 = $con->query($q9);
 
    $row = $result9->fetch_assoc();
 $created_at = $row['created_at'];
  
 $status = $row['status'];
 }
 $result9=$con-> query($q_created_at);

 


$location='';
$assetName='';
$created_at='';
$assetId=array();
$q='';
$d='';

if(isset($_POST['location'])){
    $location=$_POST['location'];
}




$q="SELECT * FROM assetcount";


if(isset($_POST['assetName']) && $_POST['assetName']!='' ){
    $assetName=$_POST['assetName'];
    $qs="SELECT id FROM assets WHERE name LIKE '%".$assetName."%'";
    $r7 = $con->query($qs);
    while ($row = mysqli_fetch_assoc($r7)) {
        array_push($assetId,$row['id']);
    }
    $d=implode(',',$assetId);
    if($d!=''){
        $q=$q." WHERE name IN(".$d.")";
    }

}


if(isset($_POST['location']) && $_POST['location']!=''){
    if(str_contains($q, 'WHERE')){
        $q=$q." AND location=".$_POST['location'];
    }
   
    else{
        $q=$q." WHERE location=".$_POST['location'];
    }
}


if(isset($_POST['status']) && $_POST['status']!=''){
    if(str_contains($q, 'WHERE')){
        $q=$q." AND status=".$_POST['status'];
    }
   
    else{
        $q=$q." WHERE status=".$_POST['status'];
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

<form action="<?php echo $baseURl?>pages/searchpage2.php"  method="post">

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
<script>
              var onDateSelect = function(selectedDate, input) {
  if (input.id === 'Start') {
   //getting start date
    var start = $('#Start').datepicker("getDate");
    console.log("start - "+start);
    //setting it has mindate
    $("#End").datepicker('option', 'minDate', start);
  } else if(input.id === 'End'){ 
   //getting end date
    var end = $('#End').datepicker("getDate");
    console.log("end - "+end);
    //passing it max date in start
    $("#Start").datepicker('option', 'maxDate', end);
  }
};



var onDocumentReady = function() {
  var datepickerConfiguration = {
    onSelect: onDateSelect,
    dateFormat: "mm/yy",
  };
  ///--- Component Binding ---///
  $('#Start, #End').datepicker(datepickerConfiguration);
  
};
$(onDocumentReady); // jQuery DOM ready callback registration
</script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<input type="text" id="Start" name="start" min="2000-03">
<input type="text" id="End" name="start" min="2000-03" >


              <select name="status" class="box">
             
               <option <?php if ($status == 1) {
                           echo "selected";
                        } ?> value="1">Status Active</option>
               <option <?php if ($status == 0) {
                           echo "selected";
                        } ?> value="0">Status Inactive</option>
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
                            //    echo $q;
                            //    die();
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
                        


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    





</html>

<?php include('../includes/footer.php'); ?>


