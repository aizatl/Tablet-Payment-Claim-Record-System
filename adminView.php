
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Admin</title>
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
  border: 0px;
  width: 90%;
  border-radius: 5px;
  }

  #tablecss td, #tablecss th {

    padding: 8px;
  }



  #tablecss th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }
  .button {
  display: inline-block;
  border-radius: 7px;
  background-color: grey;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 270px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  height: 160px;
}

.button a {
  text-decoration: none;
  color: black;
  font-size: 30px;
  margin-left: 10px;
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 1.3s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition:  1.3s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
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
include "function.php";

$dapatkanUserID = getUserID($username);
while($row=mysqli_fetch_assoc($dapatkanUserID)){
  $userIdDahDapat = $row['staffID'];
}
 ?>
      <nav>
        <ul>
          <li><img src="logo1.png" alt="Logo"></li>
          <table border="0px">
            <td><li style="float:right"><a class="active"href="#">Halaman Utama</a></li></td>
            <td>  <li style="float:right"><a href="logout.php">Log Keluar</a></li></td>
          </table>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">

      <div>

      <h1> SELAMAT DATANG ADMIN <?php echo $userIdDahDapat; ?></h1>
      <br><br><br>
      <center>
       <table id="tablecss">
         <tr>
           <td><center><button class="button" style="vertical-align:middle"><a href="tambahPembelian.php"><span>Tambah Pembelian Baru </a></span></button></td>
           <td><center><button class="button" style="vertical-align:middle"><a href="semuaPembelianAdminView.php"><span>Lihat Semua Pembelian </a></span></button></td>
           <td><center><button class="button" style="vertical-align:middle"><a href="adminSemuaStaff.php"><span>Semua Staff </a></span></button></td>
             <td><center><button class="button" style="vertical-align:middle"><a href="carianPage.php"><span>Carian </a></span></button></td>
         </tr>
       </table>
     </center>

    </div>
  </section><!-- #hero -->

</body>
</html>
