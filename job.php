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

<?php

if (isset($_POST["submit"])) {
  $cookie_email =  $_COOKIE["email"];
  $query_read = "SELECT * FROM recruitment.users where user_email = '" . $cookie_email . "' ";
  $result = mysqli_query($connect, $query_read);
  $row = mysqli_fetch_assoc($result);
  $user_id = $row["user_id"];
  $current_date = date("Y-m-d");
  $app_status = "Sent";
  $target_dir = getcwd() . DIRECTORY_SEPARATOR;
  $target_file = $target_dir  .  "cvs" . DIRECTORY_SEPARATOR . $current_date . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    $query = sprintf("INSERT INTO recruitment.applications VALUES ( null , '" . $current_date . "' , '" . $user_id . "' , '" . $_GET['id'] . "' , '" . $app_status . "' , '%s')" ,
    $connect->real_escape_string($target_file)
  );
    $result2 = mysqli_query($connect, $query);
    echo " CV has been uploaded.";

  } else {
    echo "Sorry, there was an error uploading your CV.";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <link href="https://fonts.googleapis.com/css2?family=Port+Lligat+Slab&display=swap" rel="stylesheet" />
  <!-- <script src="dialog.js"></script> -->
  <script>
    function CustomPrompt() {
      this.render = function() {
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH + "px";
        dialogbox.style.left = (winW / 2) - (550 * .5) + "px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";
        // document.getElementById('dialogboxhead').innerHTML = "<h2>Apply</h2>";
        // document.getElementById('dialogboxbody').innerHTML = '<input name="fileToUpload" id="fileToUpload" type="file" src="upload_button.png" alt="upload" width="100" height="100">';
        // document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Prompt.ok()" type="submit" form="cv_form" name="submit">Send</button> &nbsp; &nbsp; <button onclick="Prompt.cancel()">Cancel</button>';
      }
      this.cancel = function() {
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
      }
      this.ok = function() {
        var prompt_value1 = document.getElementById('fileToUpload').value;
        console.log(prompt_value1);
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
      }
    }
    var Prompt = new CustomPrompt();
  </script>
  <link rel="stylesheet" href="dialog.css" />

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

    .info-layer {
      padding-top: 100px;
      padding-left: 10px;
      padding-right: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    p {
      font-size: x-large;
    }

    h3 {
      margin: 0;
    }

    h2 {
      font-size: xx-large;
    }

    .top-info {
      font-size: x-large;
    }

    .hint-text {
      font-size: large;
      color: #7c7c7c;
    }

    .bot-layer {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
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
  <script>
    function redirectToHome() {
      window.location.href = 'home.php';
    }
  </script>
</head>

<body>
<h1 onclick="redirectToHome()">
Job
    </h1>
  <?php
  $query = "SELECT * FROM recruitment.jobs WHERE job_id = " . $_GET['id'];
  $result = mysqli_query($connect, $query);
  $row = mysqli_fetch_assoc($result);
  $query2 = "SELECT * FROM recruitment.users where user_id = " . $row["user_id"];
  $result2 = mysqli_query($connect, $query2);
  $user = mysqli_fetch_assoc($result2);
  echo '
    <div class="info-layer">
    <h2>' .  $row["job_name"]  .  '</h2>
    <h3 class="top-info">Location: ' .  $row["job_location"]  .  '</h3>
    <h3 class="top-info">Salary: ' .  $row["job_salary"]  .  ' USD</h3>
    <p>
    ' .  $row["job_short_desc"]  .  '
    ' .  $row["job_long_desc"]  .  '
    </p>
    <div class="bot-layer">
      <div class="hints">
        <div class="hint-text">' .  $user["user_name"]  .  '</div>
        <div class="hint-text">' .  $row["job_post_date"]  .  '</div>
      </div>
      <div class="button-div">
        <button onclick="Prompt.render()">Apply</button>
      </div>
    </div>
    <div></div>
  </div>
  <div id="dialogoverlay"></div>
  <div id="dialogbox">
    <form id="cv_form" action="" method="post" enctype="multipart/form-data">
      <div id="dialogboxhead">
      <h2>Apply</h2>
      </div>
      <div id="dialogboxbody">
      <input name="fileToUpload" id="fileToUpload" type="file" src="upload_button.png" alt="upload" width="100" height="100">
      </div>
      <br>
      <div id="dialogboxfoot">
      <button onclick="Prompt.ok()" type="submit" form="cv_form" name="submit">Send</button> &nbsp; &nbsp; <button onclick="Prompt.cancel()">Cancel</button>
      </div>
    </form>
  </div>
    '
  ?>

</body>

</html>