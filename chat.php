<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <style>
    /* Add some style to the body */
    body {
      font-family: sans-serif;
      margin: 0;
      background-color: #f4f4f4;
    }
    /* Add some style to the navigation bar */
    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #0072c6;
      color: white;
      height: 50px;
    }
    /* Style the logo */
    nav img {
      height: 30px;
      margin-left: 20px;
    }
    /* Style the navigation links */
    nav a {
      text-decoration: none;
      color: white;
      font-size: 18px;
      margin-left: 20px;
    }
    /* Add some style to the login form */
    form {
      max-width: 300px;
      margin: auto;
      background-color: white;
      padding: 20px;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
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
      width: 100%;
      background-color: #0072c6;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- Add the navigation bar -->
  <nav>
    <!-- Add the logo -->
    <img src="logo1.png" alt="Logo">
    <!-- Add the navigation links -->
    <a href="#">Home</a>
    <a href="#" class="active">Login</a>
    <a href="#">Sign Up</a>
  </nav>
  <!-- Add the login form -->
  <form action="/login" method="post">
    <label for="username">Kata Nama:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Kata Laluan:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
