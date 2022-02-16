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

        .cards-layer {
            padding-top: 100px;
            padding-left: 5px;
            padding-right: 5px;
        }

        .job-card {
            background-color: #FFF2E6;
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;

        }

        .hints-div {
            height: 30px;
            padding-bottom: 10px;
            padding-right: 10px;
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

        p {
            font-size: 20px;
        }

        .side-hints {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /*cross*/
            justify-content: center;
            /*main*/
        }
    </style>
</head>

<body>
    <h1>My Applications</h1>

    <div class="cards-layer">
        <?php

        $cookie_email =  $_COOKIE["email"];
        $query_read = "SELECT * FROM recruitment.users where user_email = '" . $cookie_email . "' ";
        $result = mysqli_query($connect, $query_read);
        $row = mysqli_fetch_assoc($result);
        $user_id = $row["user_id"];

        $query_read2 = "SELECT * FROM recruitment.applications where user_id = '" . $user_id . "' ";
        $result2 = mysqli_query($connect, $query_read2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {

                $query_read3 = "SELECT * FROM recruitment.jobs where job_id = '" . $row2["job_id"] . "' ";
                $result3 = mysqli_query($connect, $query_read3);
                $row3 = mysqli_fetch_assoc($result3);

                $query_read4 = "SELECT * FROM recruitment.users where user_id = '" . $row3["user_id"] . "' ";
                $result4 = mysqli_query($connect, $query_read4);
                $row4 = mysqli_fetch_assoc($result4);


                echo '<div class="job-card">
                <h2>
                    ' . $row3["job_name"] . '
                </h2>
                <p>
                ' . $row3["job_short_desc"] . '
                </p>
    
                <div class="hints-div">
                    <div class="side-hints">
                        <div class="hint-text">
                        ' . $row4["user_name"] . '
                        </div>
                        <div class="hint-text">
                            Post data:                     ' . $row3["job_post_date"] . '

                        </div>
                    </div>
    
                    <div class="side-hints">
                        <div class="hint-text">
                            Applications status: ' . $row2["app_status"] . '
                        </div>
                        <div class="hint-text">
                            Applications data: ' . $row2["app_date"] . '
                        </div>
                    </div>
                </div>
            </div> ';
            }
        }

        ?>
    </div>
</body>

</html>