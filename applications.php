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
        .side-hints{
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

            <div class="hints-div">
                <div class="side-hints">
                    <div class="hint-text">
                        The publisher name
                    </div>
                    <div class="hint-text">
                        Post data: 12/12/2021
                    </div>
                </div>

                <div class="side-hints">
                    <div class="hint-text">
                        The publisher name
                    </div>
                    <div class="hint-text">
                        Post data: 12/12/2021
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>