<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
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
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #f7f4d1;
    height:100px;
    display: none;

  }

  li {
    float: left;
    text-align: center;



  }
  ul image {
    height: 30px;
    margin-left: 20px;

  }

  li:last-child {
    border-right: none;
  }

  li a {
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;


  }

  li a:hover:not(.active) {
    background-color: black;
  }

  .active {
    text-decoration: underline;
  }
    /* Add some style to the login form */
    form {
      max-width: 400px;
      margin: auto;
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      height: 400px;
    }
    /* Style the form inputs */
    form input[type="text"], form input[type="password"] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    /* Style the submit button */
    form input[type="submit"] {
      width: 30%;
      background-color: #f3f2dd;
      color: black;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }
    h1{
      color: black;
      text-align: center;
    }
    h2{
      color: black;
      text-align: center;
    }

  </style>
</head>
<body>
  <!-- Add the navigation bar -->
<ul>


  <li style="float:center"><h1>MAJLIS PERBANDARAN SELAYANG</h1></li>
  <li style="float:right"><br><a class="active" href="#about">Log Masuk</a></li>

</ul>
<br><br><br><br>
  <!-- Add the login form -->
  <form action="checkLogin.php" method="post">
    <center><img src="logo1.png" alt="Logo" height= "150px" height= "150px"></center><br>
    <label for="username">Kata Nama:</label><br>
    <input type="text" name="username" class="form-control" placeholder="username" required><br>
    <label for="password">Kata Laluan:</label><br>
    <input type="password" name= "password" class="form-control" placeholder="password" required><br><br>
    <input type="submit" value="Log Masuk" class="">
  </form>
</body>
</html>
