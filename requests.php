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
            padding: 6px;

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
        <div class="job-card">
            <h2>
                Web Programmer
            </h2>
            <p>
                About the job decsription. Lorem ipsum dolor sit amet, consectetur
                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <hr width="90%" />
            <div class="appliers-div">
                <h3 class="applier-label">
                    Appliers:
                </h3>
                <ul>
                    <li class="applier-row">
                        <p>
                            hi
                        </p>
                        <div class="download-div">
                            <a href=""><img src="download.png" alt="download-cv" width="50" height="35"></a>
                        </div>
                        <div class="status-div">
                            Status: &nbsp;

                            <select name="cars" id="cars">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select>

                        </div>
                    </li>
                </ul>
            </div>
            <hr width="90%" />
            <div class="hints-div">

                <div class="hint-text">
                    12/12/2021
                </div>
                <div class="delete-div">
                    <a href=""><img src="bin.png" alt="delete" width="30" height="30"></a>

                </div>

            </div>
        </div>
    </div>
</body>

</html>