<?php
session_start();

include "checkLoginUser.php";

$_SESSION['username']=$_POST['username'];
$_SESSION['password']=$_POST['password'];

$username=$_POST['username'];
$password=$_POST['password'];

$isValidUser = validatePassword($username,$password);

if ($isValidUser)
  {
    $userType = getUserType ($username);
    if ($userType == 'admin'){
      $_SESSION['username'] = $username; //bagi
      echo "<script>
      alert('Berjaya Log Masuk sebagai Admin');
      window.location.href='adminView.php';
      </script>";
    }
    else if ($userType == 'basic'){
      $_SESSION['username'] = $username; //bagi
      echo "<script>
      alert('Berjaya Log Masuk sebagai Pengguna');
      window.location.href='staffView.php';
      </script>";
    }


  }//if
else {
        echo "<script>
        alert('Wrong Username or Password');
        window.location.href='iindex.php';
        </script>";
  }

?>
