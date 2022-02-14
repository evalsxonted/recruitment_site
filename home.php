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
    <script>
        function goToAddPage() {
            window.location.href = "add.php";
        }

        function goToRequestsPage() {
            window.location.href = "requests.php";
        }

        function goToApplicationsPage() {
            window.location.href = "applications.php";
        }
    </script>
</head>

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

    .main-layer {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
    }

    .top-layer {
        margin-top: 20px;
        width: 100%;
        display: flex;
        align-items: center;
        /*cross*/
        justify-content: flex-end;
        /*main*/

    }

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
        width: 250px;
        font-family: "Port Lligat Slab", serif;
    }

    button.bot-button {
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

    .buttons-spacer {
        width: 50px;
    }

    button:hover {
        background-color: #7000aa;
    }

    .middle-layer {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        /*cross*/
        justify-content: space-between;
        /*main*/
        width: 100%;

    }

    .left-layer {
        min-width: 60%;
        margin-top: 40px;
        margin-left: 10px;
        margin-right: 20px;
        height: 200px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        /*cross*/
        justify-content: flex-start;
        /*main*/
    }

    .right-layer {
        margin-top: 30px;
        margin-right: 20px;

        display: flex;
        flex-direction: column;
        align-items: flex-start;
        /*cross*/
        justify-content: flex-start;
        /*main*/
    }

    .job-card {
        width: 100%;
        background-color: #FFF2E6;
        border: 1px solid black;
        border-radius: 10px;
        padding: 6px;

    }

    .hint-text {
        font-size: large;
        color: #7c7c7c;
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

    .search-label {
        font-size: 30px;
        font-weight: 200;
    }

    .textfield-input-div {
        font-size: 25px;
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

    td {
        padding-top: 25px;
        padding-bottom: 25px;
        white-space: nowrap;

    }

    .bot-buttons-layer {
        margin-top: 10px;
        width: 100%;
        display: flex;
        align-items: center;
        /*cross*/
        justify-content: flex-end;
        /*main*/
    }
</style>

<body>
    <h1>
        Home
    </h1>
    <div class="main-layer">
        <div class="top-layer">
            <div class="button-div">
                <button onclick="goToAddPage()">Add Request</button>
            </div>
            <div class="buttons-spacer">
            </div>
            <div class="button-div">
                <button onclick="goToApplicationsPage()">Your Applications</button>
            </div>
            <div class="buttons-spacer">
            </div>
            <div class="button-div">
                <button onclick="goToRequestsPage()">Your Requests</button>
            </div>
            <div class="buttons-spacer">
            </div>
        </div>
        <div class="middle-layer">
            <div class="left-layer">


                <?php
                // location.replace(`home.php?email=${email}`);
                $query = "SELECT * FROM recruitment.jobs ";
                if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
                    $tempCount = 0;
                    if (!empty($_POST['name'])) {
                        $query .= " WHERE job_name = '" . $_POST['name'] . "' ";
                        $tempCount = 1;
                    }
                    if (!empty($_POST['location'])) {
                        if ($tempCount > 0) {
                            $query .= " and ";
                        }
                        $query .= " WHERE job_location = '" . $_POST['location'] . "' ";
                        $tempCount = 1;
                    }
                    if (!empty($_POST['salary'])) {
                        if ($tempCount > 0) {
                            $query .= " and ";
                        }
                        $query .= " WHERE job_salary > '" . $_POST['salary'] . "' ";
                    }
                } 
                $query .= "LIMIT 20";

                echo $query;

                $result = mysqli_query($connect, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                            <div class="job-card">
                                <h2>
                                    ' .  $row["job_name"]  .  '
                                </h2>
                                <p>
                                ' .  $row["job_short_desc"]  .  '
                                <br>
                                ' .  $row["job_long_desc"]  .  '
                                </p>
                                <div class="hints-div">
                                    <div class="hint-text">
                                    ' .  $row["user_id"]  .  '
                                    </div>
                                    <div class="hint-text">
                                    ' .  $row["job_post_date"]  .  '
                                    </div>
                                </div>
                            </div>
                            <br>
                            ';
                    }
                }

                ?>


            </div>
            <div class="right-layer">
                <p class="search-label">
                    Search:
                </p>
                <form id="search_form" action="" method="post">
                    <table class="textfield-input-div">
                        <tr>
                            <td>
                                Job Name:
                            </td>
                            <td>
                                <input type="text" id="name" name="name" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Location:
                            </td>
                            <td>
                                <input type="text" id="location" name="location" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Job Type:
                            </td>
                            <td>
                                <input type="text" id="email" name="email" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Min Salary:
                            </td>
                            <td>
                                <input type="text" id="salary" name="salary" />
                            </td>
                        </tr>
                    </table>
                <div class="bot-buttons-layer">
                    <div class="button-div">
                        <button class="bot-button" type="reset" value="Reset" name="reset" return false>Reset</button>
                    </div>
                    <div class="buttons-spacer">
                    </div>
                    <div class="button-div">
                        <button class="bot-button" type="submit" form="search_form" value="Submit">Search</button>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    <?php

    ?>
</body>

</html>