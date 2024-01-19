
<?php
session_start();
$username = $_SESSION['username'];//terima
$_SESSION['username'] = $username; //bagi
if ($username == null) {
  echo "<script>
  alert('Need to login again');
  window.location.href='iindex.php';
  </script>";
}
include "function.php";
$semuaStaffId = getAllStaffId();
$arrayStaffID = array();



/*for ($i=0; $i < mysqli_num_rows($semuaStaffId); $i++) {
  while($row=mysqli_fetch_assoc($semuaStaffId)){
  $arrayStaffID[$i] = $row['staffID'];
  }
}*/

?>
<!DOCTYPE html>
<html lang="en">
<title>Tambah Pembelian</title>
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
    max-width: 700px;
    margin: auto;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    height: 400px;
  }
  /* Style the form inputs */
  form input[type="text"], form input[type="password"], form input[type="date"] {

    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 170px;
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
 <nav>
   <ul>
     <li><img src="logo1.png" alt="Logo"></li>
     <table border="0px">
       <td><li style="float:right"><a class=""href="adminView.php">Halaman Utama</a></li></td>
       <td><li style="float:right"><a class="active"href="#">Tambah Pembelian</a></li></td>
       <td>  <li style="float:right"><a href="logout.php">Log Keluar</a></li></td>
     </table>
   </ul>
 </nav>
    </div>
  </header><br><br>
  <center>
  <form action="processTambahPembelian.php" method="post">
    <table>
      <tr>
        <td>Nombor Siri:</td>
        <td><input type="text" name="siriNum" class="form-control" placeholder="" required><br></td>
        <td>&emsp;&emsp;</td>
        <td>Nombor Pekerja:</td>
        <td>
          <select name="staffID" id="staffID">
          <?php foreach ($semuaStaffId as $item): ?>
            <option value="<?php echo $item['staffID']; ?>"><?php echo $item['staffID']; ?></option>
          <?php endforeach; ?>
          </select>
        </td>
      </tr>

      <tr>
        <td>Tarikh Beli:</td>
        <td><input type="date" name= "tarikhBeli" class="form-control" placeholder="" required><br><br></td>
        <td>&emsp;&emsp;</td>
        <td>Nama Peranti:</td>
        <td><input type="text" name= "pembelian" class="form-control" placeholder="" required><br><br></td>
      </tr>

      <tr>
        <td>Harga Peranti:</td>
        <td><input type="text" name= "harga" class="form-control" placeholder="" required><br><br></td>
        <td>&emsp;&emsp;</td>
        <td>Tarikh Permohonan:</td>
        <td><input type="date" name= "tarikhMohon" class="form-control" placeholder="" required><br><br></td>
      </tr>

      <tr>
        <td>Nombor Siri Peranti:</td>
        <td><input type="text" name= "snNum" class="form-control" placeholder="" required><br><br></td>
        <td>&emsp;&emsp;</td>
        <td>Tarikh Kelulusan TYDP:</td>
        <td><input type="date" name= "tarikhTYDP" class="form-control" placeholder="" required><br><br></td>
      </tr>

    </table>
    <input type="submit" value="Hantar" name = "submit"class="">
  </center>

  </form>

</body>
</html>
