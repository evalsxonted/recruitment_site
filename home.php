<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Port+Lligat+Slab&display=swap" rel="stylesheet" />
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
        justify-content: space-evenly;
        /*main*/
        width: 100%;

    }

    .left-layer {
        margin-top: 40px;
        margin-left: 10px;
        margin-right: 20px;
        height: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
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
                <button>Your Applications</button>
            </div>
            <div class="buttons-spacer">
            </div>
            <div class="button-div">
                <button>Your Requests</button>
            </div>
            <div class="buttons-spacer">
            </div>
        </div>
        <div class="middle-layer">
            <div class="left-layer">
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
                        <div class="hint-text">
                            The publisher name
                        </div>
                        <div class="hint-text">
                            12/12/2021
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-layer">
                <p class="search-label">
                    Search:
                </p>
                <table class="textfield-input-div">
                    <tr>
                        <td>
                            Job Name:
                        </td>
                        <td>
                            <input type="text" id="email" name="email" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Province:
                        </td>
                        <td>
                            <input type="text" id="email" name="email" />
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
                            <input type="text" id="email" name="email" />
                        </td>
                    </tr>
                </table>
                <div class="bot-buttons-layer">
                    <div class="button-div">
                        <button class="bot-button">Reset</button>
                    </div>
                    <div class="buttons-spacer">
                    </div>
                    <div class="button-div">
                        <button class="bot-button">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    ?>
</body>

</html>