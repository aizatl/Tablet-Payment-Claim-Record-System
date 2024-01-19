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

$getAllStaff = getAllStaff();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Staff</title>
  <link rel="icon" type="image/x-icon" href="logo1.png">
</head>
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
    height: 100px;
  }
</style>
<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">
<?php
$username = $_SESSION['username'];//terima
 ?>
      <div id="logo" class="pull-left">
      </div>

      <nav>
        <ul>
          <li><img src="logo1.png" alt="Logo"></li>
          <table border="0px">
            <td><li style="float:right"><a class=""href="adminView.php">Halaman Utama</a></li></td>
            <td><li style="float:right"><a class="active"href="#">Staff</a></li></td>
            <td>  <li style="float:right"><a href="logout.php">Log Keluar</a></li></td>
          </table>
        </ul>
      </nav>
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <div>

      <h1>SEMUA STAFF</h1>
      <center>
       <table id="tablecss">
         <thead>
           <th>BIL</th>
           <th>NOMBOR PEKERJA</th>
           <th>NAMA</th>
           <th>JAWATAN PENGARAH</th>
           <th>JAWATAN</th>
           <th>GRED</th>
           <th>JABATAN</th>

           <th>BILANGAN PEMBELIAN</th>
            </thead>
           <?php
           $count=1;
           while($row=mysqli_fetch_assoc($getAllStaff))
           {

             //display
             echo"<tr>";
             echo "<td>".($count)."</td>";
             echo "<td>".$row['staffID']."</td>";
             $idSemasa = $row['staffID'];
             $idSemasa = trim($idSemasa);
             echo"<td>".$row['name']."</td>";
             if ($row['jawatanPengarah'] == !null) {
               echo"<td>".$row['jawatanPengarah']."</td>";
             }else {
               echo"<td>Tiada</td>";
             }

             echo"<td>".$row['jawatan']."</td>";
             echo"<td>".$row['gred']."</td>";
             echo"<td>".$row['jabatan']."</td>";

             $bilanganPembelian = getNumOfPurchaseByStaff($idSemasa);
             echo "<td>".$bilanganPembelian."</td>";
             $count++;
           }
            ?>

       </table>

    </div>
  </section>

</body>
</html>
