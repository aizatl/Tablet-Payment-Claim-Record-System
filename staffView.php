<?php
session_start();
$username = $_SESSION['username'];//terima
if ($username == null) {
  echo "<script>
  alert('Need to login again');
  window.location.href='iindex.php';
  </script>";
}
$info = null;

include "function.php";
$dapatkanUserID = getUserID($username);
while($row=mysqli_fetch_assoc($dapatkanUserID)){
  $userIdDahDapat = $row['staffID'];
}
$userIdDahDapat = trim($userIdDahDapat);
$info = getPurchasebyStaff($userIdDahDapat);
  if(isset($_POST["cari"])){
    $year = $_POST['carian'];
    $info = getPurchasebyStaffandYear($userIdDahDapat,$year);
  }
  else {
    $info = getPurchasebyStaff($userIdDahDapat);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pembelian</title>
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
      height: 100px;
    }
  </style>
<body>

  <!--==========================
  Header
  ============================-->
  <header>
    <div class="container">
<?php
$username = $_SESSION['username'];//terima

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
    <div class="hero-container">
      <div>
        <?php //echo $info; ?>
        <h1>SEMUA PEMBELIAN UNTUK PENGGUNA <?php echo $userIdDahDapat; ?></h1>
        <center>
        <form class="" action="staffView.php" method="post">
          <input type="text" name="carian" placeholder="Cari mengikut tahun">
          <input type="submit" name="cari" value="Cari">
          <input type="submit" name="paparSemua" value="Papar Semua">
        </form>

        <?php
        $kira = mysqli_num_rows($info);
         ?>

        <br><br>
        <?php
        if ($kira > 0) {
        ?>
        <table id="tablecss">
          <thead>
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
             </thead>
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
      }else {
        echo "<h1 class = 'mesej'>Pengguna ".$userIdDahDapat." tidak melakukan sebarang pembelian pada tahun ".$year."</h1>";
      }

         ?>

       </center>

    </div>
  </section><!-- #hero -->

  <main id="main">
  </main>
</body>
</html>
