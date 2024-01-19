<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
$username = $_SESSION['username'];//terima
if ($username == null) {
  echo "<script>
  alert('Need to login again');
  window.location.href='iindex.php';
  </script>";
}
include "function.php";


?>
<!DOCTYPE html>
<html lang="en">
<title>Carian Staff</title>
<link rel="icon" type="image/x-icon" href="logo1.png">
<style>
  /* Add some style to the body */
  body {
    font-family: sans-serif;
    margin: 0;
    background-color: #f4f4f4;
  }
  /* Add some style to the navigation bar */
  ul {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f7f4d1;
    color: white;
    height: 70px;
    border-right:1px solid #black;
    list-style-type: none;
    margin: 0;
    padding: 0;
  }
  /* Style the logo */
  li img {
    height: 60px;
    margin-left: 20px;
  }
  /* Style the navigation links */
  li a {
    text-decoration: none;
    color: black;
    font-size: 18px;
    margin-left: 20px;
  }
  .active {
    text-decoration: underline;
    text-decoration-color: black;
  }
  li a:hover:not(.active) {
    text-decoration: underline;
}
  /* Add some style to the login form */
  form {

  }
  /* Style the form inputs */
  form input[type="text"], form input[type="password"] {

    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  /* Style the submit button */
  form input[type="submit"] {

    background-color: #0072c6;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  h1{
    color: black;
    text-align: center;
  }
  h2{
    color: black;
    text-align: center;
  }
  #tablecss {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
  border-radius: 5px;
  }

  #tablecss td, #tablecss th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #tablecss tr:nth-child(even){background-color: #f2f2f2;}

  #tablecss tr:hover {background-color: #ddd;}

  #tablecss th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }
  .mesej {
    max-width: 400px;
    margin: auto;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    height: 70px;
  }
  .mesej2 {
    max-width: 400px;
    margin: auto;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    height: 100px;
  }
</style>
<body>



<?php
$username = $_SESSION['username'];//terima
 ?>
 <ul>
   <li><img src="logo1.png" alt="Logo"></li>
   <table border="0px">
     <td><li style="float:right"><a class=""href="adminView.php">Halaman Utama</a></li></td>
     <td><li style="float:right"><a class=""href="carianPage.php">Carian</a></li></td>
     <td><li style="float:right"><a class="active"href="#">Carian Nombor Pekerja</a></li></td>
     <td><li style="float:right"><a href="logout.php">Log Keluar</a></li></td>
   </table>
 </ul>



  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">

    <div class="hero-container">
      <div>
        <center>
        <h1>Carian Mengikut Nombor Pekerja</h1>
        <form class="" action="carianIdStaff.php" method="post">
          <input type="text" id="staffIdYangDicari" placeholder="Masukkan nombor pekerja" name="staffIdYangDicari">
          <input type="submit" name = "cari" value="Cari">
        </form>
        <br><br>
        <?php
        if(isset($_POST["cari"])){
          $staffIdYangDicari=$_POST['staffIdYangDicari']; //terima
          $info = getPurchasebyStaff($staffIdYangDicari);
          $wujud = checkWujud($staffIdYangDicari);
         ?>
        <?php
        $kira = mysqli_num_rows($info);
         ?>
        <?php
        if( $kira >0 && $wujud ==true){
          ?>
          <table id="tablecss">

            <th>BIL</th>
            <th>PEMBELIAN ID</th>
            <th>NOMBOR SIRI</th>
            <th>NOMBOR PEKERJA</th>
            <th>TARIKH BELI</th>
            <th>PEMBELIAN</th>
            <th>HARGA</th>
            <th>TARIKH MOHON</th>
            <th>NOMBOR SIRI</th>
            <th>TARIKH TYDP</th>

             <?php
             $count=1;

             while($row=mysqli_fetch_assoc($info))
             {
               //display
               echo"<tr>";
               echo "<td>".($count)."</td>";
               echo "<td>".$row['pembelianID']."</td>";
               echo"<td>".$row['siriNum']."</td>";
               echo"<td>".$row['staffID']."</td>";
               echo"<td>".$row['tarikhBeli']."</td>";
               echo"<td>".$row['pembelian']."</td>";
               echo"<td>".$row['harga']."</td>";
               echo"<td>".$row['tarikhMohon']."</td>";
               echo"<td>".$row['snNum']."</td>";
               echo"<td>".$row['tarikhTYDP']."</td>";
               $count++;
             }

              ?>

             </table>
          <?php
        }
        else if($wujud == true){
          echo "<h1 class = 'mesej2'>Pengguna ".$staffIdYangDicari." tidak pernah membuat sebarang pembelian</h1>";
        }
        else if($wujud ==false){
          echo "<h1 class = 'mesej'>Staff ".$staffIdYangDicari." tidak wujud</h1>";
        }
      }
         ?>



    </div>
  </section>



</body>
</html>
