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

    p {
      font-size: 20px;
    }

    .input-layer {
      height: 100vh;
      display: flex;
      flex-direction: column;
      padding-top: 120px;
      padding-left: 20px;
      align-items: center;
      justify-content: flex-start;
    }
  </style>
  <!-- input style -->
  <style>
    .textfield-div {
      height: 70px;
      width: 90vw;
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
      width: 100%;
    }

    .textfield-label {
      font-size: x-large;
      margin-top: 0px;
      margin-bottom: 5px;
    }

    .textfield-input-div {
      width: 100%;

    }
  </style>
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
  </style>
</head>

<body>

  <?php
  if (
    !empty($_POST['title']) and  !empty($_POST['short'])
    and  !empty($_POST['full'])
    and  !empty($_POST['location'])
    and  !empty($_POST['salary'])
  ) {
    $cookie_email =  $_COOKIE["email"];
    $query_read = "SELECT * FROM recruitment.users where user_email = '" . $cookie_email . "' ";
    $result = mysqli_query($connect, $query_read);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row["user_id"];
    $current_date = date("Y/m/d");
    $query = "INSERT INTO recruitment.jobs VALUES ( null , '" . $_POST['title'] . "' , '" . $_POST['short'] . "' , '" . $_POST['full'] . "' , '" . $current_date . "' , '" . $user_id . "' , '" . $_POST['location'] . "' , '" . $_POST['salary'] . "')";
    $result2 = mysqli_query($connect, $query);
    if (!$result2) {
      // die("query failed" . mysqli_errno($connect));
      echo "invalid inuputs";

    } else {
      echo "job added successfully";

    }
  }

  ?>



  <h1>Add Job</h1>

  <div class="input-layer">
    <form id="add_form" action="" method="post">

      <div class="textfield-div">
        <p class="textfield-label">Job title:</p>
        <div class="textfield-input-div">
          <input type="text" id="title" name="title" />
        </div>
      </div>

      <div class="textfield-div">
        <p class="textfield-label">Job short description:</p>
        <div class="textfield-input-div">
          <input type="text" id="short" name="short" />
        </div>
      </div>

      <div class="textfield-div">
        <p class="textfield-label">Job full description:</p>
        <div class="textfield-input-div">
          <input type="text" id="full" name="full" />
        </div>
      </div>

      <div class="textfield-div">
        <p class="textfield-label">Job location:</p>
        <div class="textfield-input-div">
          <input type="text" id="location" name="location" />
        </div>
      </div>

      <div class="textfield-div">
        <p class="textfield-label">Job salary</p>
        <div class="textfield-input-div">
          <input type="text" id="salary" name="salary" />
        </div>
      </div>

      <div class="button-div">
        <button type="submit" form="add_form" value="Submit">Add</button>
      </div>
    </form>

  </div>
</body>

</html>