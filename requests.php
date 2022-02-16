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
if (isset($_POST["application"])) {

    if (isset($_POST["status"])) {

        $query = "UPDATE recruitment.applications SET app_status = '" . $_POST["status"]  . "' WHERE app_id = " . $_POST["application"];
        $result2 = mysqli_query($connect, $query);

        if (!$result2) {
            die("query failed" . mysqli_errno($connect));
        }
    }
    if (isset($_POST["delete"])) {



        $query = "Delete FROM recruitment.jobs WHERE job_id = " . $_POST["job"];
        $result2 = mysqli_query($connect, $query);

        if (!$result2) {
            die("query failed" . mysqli_errno($connect));
        }
    }

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

        .cards-layer {
            padding-top: 100px;
            padding-left: 5px;
            padding-right: 5px;
        }

        .job-card {
            background-color: #FFF2E6;
            border: 1px solid black;
            border-radius: 10px;
            padding: 6px;
            margin-bottom: 20px;

        }

        .hints-div {
            height: 30px;
            display: flex;
            flex-direction: row;
            align-items: center;
            /*cross*/
            justify-content: space-between;
            /*main*/
        }

        .hint-text {
            font-size: large;
            color: #7c7c7c;
        }

        .delete-div {
            padding-right: 10px;
        }

        p {
            font-size: 20px;
        }

        .applier-label {
            text-decoration: underline;
        }

        .applier-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .appliers-div {
            margin-right: 20px;
        }

        .status-div {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        select {
            background-color: transparent;
            border: 1px solid black;
            border-radius: 8px;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            height: 30px;
            width: 200px;
        }
    </style>
</head>

<body>
    <h1>My Requests</h1>
    <div class="cards-layer">
        <?php

        $cookie_email =  $_COOKIE["email"];
        $query_read = "SELECT * FROM recruitment.users where user_email = '" . $cookie_email . "' ";
        $result = mysqli_query($connect, $query_read);
        $row = mysqli_fetch_assoc($result);
        // $user_id = $row["user_id"];
        $query_read2 = "SELECT * FROM recruitment.jobs where user_id = '" . $row["user_id"] . "' ";
        $result2 = mysqli_query($connect, $query_read2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                echo '<div class="job-card">
                <form id="cv_form" action="" method="post">

                <h2>
                ' . $row2["job_name"] . '

                </h2>
                <p>
                ' . $row2["job_short_desc"] . '

                </p>
                <hr width="90%" />
                <div class="appliers-div">
                    <h3 class="applier-label">
                        Appliers:
                    </h3>';
                $query_read3 = "SELECT * FROM recruitment.applications where job_id = '" . $row2["job_id"] . "' ";
                $result3 = mysqli_query($connect, $query_read3);

                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {

                        $query_read4 = "SELECT * FROM recruitment.users where user_id = '" . $row3['user_id'] . "' ";
                        $result4 = mysqli_query($connect, $query_read4);
                        $row4 = mysqli_fetch_assoc($result4);
                        $cv = "/cvs/" . explode("cvs", $row3["app_cv"])[1];
                        echo '<ul>
                        <li class="applier-row">
                            <p>
                            ' . $row4["user_name"] . '
                            </p>
                            
                            <div class="download-div">
                                <a href="' . $cv  . '"  target="_blank"><img src="download.png" alt="download-cv" width="50" height="35"></a>
                            </div>
                            <div class="status-div">
                                Status: &nbsp;
                                <input type="hidden" id="application" name="application" value="' . $row3["app_id"] . '"/>
                                <input type="hidden" id="job" name="job" value="' . $row3["job_id"] . '"/>

                                <select name="status" id="status" onchange="cv_form.submit()">';
                        if ($row3["app_status"] == "Sent") {
                            echo '<option value="Sent" selected="selected">Sent</option>
                                    <option value="Recieved">Recieved</option>
                                    <option value="Read">Read</option>
                                    <option value="Accepted">Accepted</option>';
                        } else if ($row3["app_status"] == "Recieved") {
                            echo '<option value="Sent" >Sent</option>
                                    <option value="Recieved" selected="selected">Recieved</option>
                                    <option value="Read">Read</option>
                                    <option value="Accepted">Accepted</option>';
                        } else if ($row3["app_status"] == "Read") {
                            echo '<option value="Sent" >Sent</option>
                                    <option value="Recieved">Recieved</option>
                                    <option value="Read" selected="selected">Read</option>
                                    <option value="Accepted">Accepted</option>';
                        } else if ($row3["app_status"] == "Accepted") {
                            echo '<option value="Sent" >Sent</option>
                                    <option value="Recieved">Recieved</option>
                                    <option value="Read">Read</option>
                                    <option value="Accepted" selected="selected">Accepted</option>';
                        }

                        echo '</select>
                            </div>
                        </li>
                    </ul>';
                    }
                }
                echo '</div>
                <hr width="90%" />
                <div class="hints-div">
        
                    <div class="hint-text">
                        12/12/2021
                    </div>
                    <div class="delete-div">
                        <input type="hidden" name="delete" id="delete" value="delete" /> 
                        <a onclick="cv_form.submit()"><img src="bin.png" alt="delete" width="30" height="30"></a>
        
                    </div>
        
                </div>
                </form>

            </div>';
            }
        }



        ?>
    </div>
</body>

</html>