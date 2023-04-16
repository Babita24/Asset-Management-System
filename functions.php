<?php



	function get_categoryname($catid,$con){
		$q = "SELECT * FROM category WHERE id='$catid' ";
		$r = mysqli_query($con,$q);
		$data=mysqli_fetch_assoc($r);
		// print_r($data);
		// die();
		if($data!=null || !empty($data))
		{
			return $data['name'];
		}
		else{
		return "n/a";
		}
		}
		

			
	function get_subcategoryname($subcatid,$con){
		$q = "SELECT * FROM subcategory WHERE id='$subcatid' ";
		$r = mysqli_query($con,$q);
		$data=mysqli_fetch_assoc($r);
		// print_r($data);
		// die();
		if($data!=null || !empty($data))
		{
			return $data['name'];
		}
		else{
		return "n/a";
		}
		}	


	function get_brandname($brandid,$con){
		$q = "SELECT * FROM brand WHERE id='$brandid' ";
		$r = mysqli_query($con,$q);
		$data=mysqli_fetch_assoc($r);
		// print_r($data);
		// die();
		if($data!=null || !empty($data))
		{
			return $data['name'];
		}
		else{
		return "n/a";
		}
		}	

		
			
	function get_brand_code($brand_code,$con){
		$q = "SELECT * FROM brand WHERE id='$brand_code' ";
		$r = mysqli_query($con,$q);
		$data=mysqli_fetch_assoc($r);
		// print_r($data);
		// die();
		if($data!=null || !empty($data))
		{
			return $data['name'];
		}
		else{
		return "n/a";
		}
		}	
		


	function get_distributorname($distributorid,$con){
		$q = "SELECT * FROM distributor WHERE id='$distributorid' ";
		$r = mysqli_query($con,$q);
		$data=mysqli_fetch_assoc($r);
		// print_r($data);
		// die();
		if($data!=null || !empty($data))
		{
			return $data['name'];
		}
		else{
		return "n/a";
		}
		}
		
	function get_locationname($location,$con){
		$q = "SELECT * FROM assets WHERE id='$location' ";
		$r = mysqli_query($con,$q);
		$data=mysqli_fetch_assoc($r);
		// print_r($data);
		// die();
		if($data!=null || !empty($data))
		{
			return $data['location'];
		}
		else{
		return "n/a";
		}
		}

	
		
	function get_assetname($name,$con){
		$q = "SELECT * FROM assets WHERE id='$name' ";
		$r = mysqli_query($con,$q);
		$data=mysqli_fetch_assoc($r);
		// print_r($data);
		// die();
		if($data!=null || !empty($data))
		{
			return $data['name'];
		}
		else{
		return "n/a";
		}
		}
	
?>