<?php
function getNumOfapplication(){
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  if (mysqli_connect_errno())     //check connection is establish
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   exit;   //terminate the script
   }
   $sql="select * from permohonan";
   $qry = mysqli_query($con,$sql);  //run query
   return $qry;
}

function getNumOfPurchase(){
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  if (mysqli_connect_errno())     //check connection is establish
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   exit;   //terminate the script
   }
   $sql="select * from pembelian";
   $qry = mysqli_query($con,$sql);  //run query
   return $qry;
}
function getNumOfPurchaseByStaff($staffID){
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  if (mysqli_connect_errno())     //check connection is establish
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   exit;   //terminate the script
   }
   $sql="select * from pembelian where staffID =".$staffID."";
   $qry = mysqli_query($con,$sql);  //run query
   $count = 0;
   while($row=mysqli_fetch_assoc($qry)){
     $count++;
   }
   return $count;
}

function getPurchasebyIdStaff($staffIdtoSearch){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select * from pembelian where staffID = '".$staffIdtoSearch."'";


  	$qry=mysqli_query($con,$sql);
  	return $qry;
}

function getPurchasebyDate($start, $end){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select * from pembelian where tarikhBeli between '".$start."' and '".$end."'";


  	$qry=mysqli_query($con,$sql);
  	return $qry;
}

function getUserID($username){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select staffID from staff where username ='".$username."'";


  	$qry=mysqli_query($con,$sql);
  	return $qry;

}



function getPurchasebyStaff($staffID){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select * from pembelian where staffID ='".$staffID."'";
  	$qry=mysqli_query($con,$sql);
  	return $qry;
}
function getPurchasebyStaffandYear($staffID, $year){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select * from pembelian where staffID ='".$staffID."' and tarikhBeli BETWEEN '".$year."-1-1' AND '".$year."-12-31'";
  	$qry=mysqli_query($con,$sql);
  	return $qry;
}
function getAllStaffId(){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select staffID from staff";
  	$qry=mysqli_query($con,$sql);
  	return $qry;
}
function getAllStaff(){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select * from staff";
  	$qry=mysqli_query($con,$sql);
  	return $qry;
}
function checkDahLayak($staffID){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select tarikhBeli from pembelian where staffID = '".$staffID."'";
  	$qry=mysqli_query($con,$sql);
  	return $qry;
}

function generatePembelianId(){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select pembelianID from pembelian";
  	$qry=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($qry)){
      $idLatest = $row['pembelianID'];
    }
    $idBaru = substr($idLatest,1);
  	return ($idBaru+1);
}
function checkWujud($staffIdYangDicari){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select * from staff where staffID = '".$staffIdYangDicari."'";
  	$qry=mysqli_query($con,$sql);
    $x = false;
    if(mysqli_num_rows($qry) >0){
      $x = true;
    }
  	return $x;
}
function getPurchasebyYear($year){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select * from pembelian where tarikhBeli BETWEEN '".$year."-1-1' AND '".$year."-12-31'";
  	$qry=mysqli_query($con,$sql);
  	return $qry;
}
function checkWujudTahun($tahunDicari){
  //create connection
  $con=mysqli_connect("localhost", "root", "root", "device_management");
  	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: ".mysqli_connect_error();
  		exit;
  	}
  	$sql="select tarikhBeli from pembelian where tarikhBeli BETWEEN '".$tahunDicari."-1-1' AND '".$tahunDicari."-12-31'";
  	$qry=mysqli_query($con,$sql);
    $x = false;
    if(mysqli_num_rows($qry) >0){
      $x = true;
    }
  	return $x;
}
 ?>
