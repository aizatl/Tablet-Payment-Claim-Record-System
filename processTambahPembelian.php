<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$button = $_POST['submit'];
$siriNum = $_POST['siriNum'];
$staffID = $_POST['staffID'];
$tarikhBeli = $_POST['tarikhBeli'];
$pembelian = $_POST['pembelian'];
$harga = $_POST['harga'];
$tarikhMohon = $_POST['tarikhMohon'];
$snNum = $_POST['snNum'];
$tarikhTYDP = $_POST['tarikhTYDP'];

include "function.php";
$check = checkDahLayak($staffID);
$check1 = checkDahLayak($staffID);
mysqli_data_seek($check1, 0);
$maxLatest = null;
while($row=mysqli_fetch_assoc($check1)){
  $maxLatest =  $row["tarikhBeli"];
}
$syarat = false;
if($maxLatest != null){
  $maxLatest = new DateTime($maxLatest);
    while($row=mysqli_fetch_assoc($check)){
      $tarikhLatest = $row['tarikhBeli'];
      $dateLatest = new DateTime($tarikhLatest);
      if($dateLatest > $maxLatest){
        $maxLatest = $dateLatest;
      }
    }
    $dateBeli = new DateTime($tarikhBeli); // nak masukkan
    $diff = $dateBeli->diff($maxLatest);
    if ($diff->y >= 2) {
      $syarat = true;
    }
}else {
  $syarat = true;
}



  if(isset($_POST["submit"]) && $syarat == true){
    $pembelianID = generatePembelianId();//
    $con=mysqli_connect("localhost", "root", "root", "device_management");
    if (mysqli_connect_errno())     //check connection is establish
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     exit;   //terminate the script
     }
     $sql = "insert into pembelian(pembelianID, siriNum,staffID, tarikhBeli, pembelian, harga, tarikhMohon, snNum, tarikhTYDP)
              values('P".$pembelianID."','".$siriNum."','".$staffID."','".$tarikhBeli."','".$pembelian."','".$harga."','".$tarikhMohon."','".$snNum."','".$tarikhTYDP."')";
     $qry=mysqli_query($con,$sql);//execute qry
     echo "<script>
     alert('Berjaya menambah pembelian');
     window.location.href='semuaPembelianAdminView.php';
     </script>";
   }elseif ($syarat == false) {
     echo "<script>
     alert('Staff ".$staffID." tidak melengkapi syarat untuk membuat pembelian baru iaitu cukup 2 tahun');
     window.location.href='tambahPembelian.php';
     </script>";
   }
   else {
      echo "<script>
      alert('Gagal menambah pembelian');
      window.location.href='tambahPembelian.php';
      </script>";

    }

  ?>
