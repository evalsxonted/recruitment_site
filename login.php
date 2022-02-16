<?php
$host = "localhost";
$user = "root";
$port = 3306;
$password = "0000";
$database = "recruitment";

$connect = mysqli_connect($host, $user, $password, $database, $port);
if (mysqli_connect_error()) {
  die("cannot connect to db " . mysqli_connect_error());
} else {
  // echo "db connected";
}
?>


<!DOCTYPE html>
<html>

<head>
  <link href="https://fonts.googleapis.com/css2?family=Port+Lligat+Slab&display=swap" rel="stylesheet" />
  <style>
    body {
      background-color: #f6f6f6;
      font-family: "Port Lligat Slab", serif;
    }

    h1 {
      position: absolute;
      font-family: "Port Lligat Slab", serif;
      font-size: 45px;

    }

    .input-layer {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
  <!-- input style -->
  <style>
    .textfield-div {
      height: 70px;
      width: 260px;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      /*x axis*/
      justify-content: center;
      margin-bottom: 20px;
    }

    .textfield-label {
      font-family: "Port Lligat Slab", serif;
    }

    input[type="text"] {
      background-color: transparent;
      border: 1px solid black;
      border-radius: 8px;
      -webkit-box-shadow: none;
      -moz-box-shadow: none;
      box-shadow: none;
      height: 40px;
      width: 250px;
    }

    .textfield-label {
      font-size: x-large;
      margin-top: 0px;
      margin-bottom: 5px;
    }
  </style>
  <!-- button & clickable style -->
  <style>
    .button-div {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    button {
      border: 1px solid transparent;
      border-radius: 25px;
      background-color: #7000ff;
      font-size: xx-large;
      -webkit-box-shadow: none;
      -moz-box-shadow: none;
      box-shadow: none;
      padding: 12px;
      color: #fff;
      width: 150px;
      font-family: "Port Lligat Slab", serif;
    }

    button:hover {
      background-color: #7000aa;
    }

    .clikable-div {
      margin-top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .clickable-text {
      font-size: large;
      color: #7c7c7c;
      text-decoration: underline;
      cursor: pointer;

    }
  </style>
</head>

<body>


  <?php
  // button click  
  if (!empty($_POST['password']) and  !empty($_POST['email'])) {
    $userpassword = $_POST['password'];
    $useremail = $_POST['email'];

    $query_read = "SELECT * FROM recruitment.users where user_email = '" . $useremail . "' and user_passwword = '" . $userpassword . "' ";
    $result = mysqli_query($connect, $query_read);
    if ($result->num_rows == 0) {
      //empty
      echo "user is not exist, check login info";
    } else {
      //exist
      $cookie_name = "email";
      $cookie_value = $useremail;
      setcookie($cookie_name, $cookie_value, time() + 864000, "/"); // 864000 = 1 day
      header("Location: home.php");
    }
  }

  ?>


  <h1>LogIn</h1>
  <div class="input-layer">
  <form id="login_form" action="" method="post">
    <div class="inputs-div">
      <div class="textfield-div">
        <p class="textfield-label">Email:</p>
        <div class="textfield-input-div">
          <input type="text" id="email" name="email" />
        </div>
      </div>
      <div class="textfield-div">
        <p class="textfield-label">Password:</p>
        <div class="textfield-input-div">
          <input type="text" id="password" name="password" />
        </div>
      </div>
      <br />
      <br />
      <div class="button-div">
        <button type="submit" form="login_form" value="Submit">LogIn</button>
      </div>
      <div class="clikable-div">
        <a class="clickable-text" href="signup.php"> new account? </a>
      </div>
    </div>
    </form>
  </div>
</body>

</html>