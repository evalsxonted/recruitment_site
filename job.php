<!DOCTYPE html>
<html>
  <head>
    <link
      href="https://fonts.googleapis.com/css2?family=Port+Lligat+Slab&display=swap"
      rel="stylesheet"
    />
    <script src="dialog.js"></script>
    <script>
      function getCVFile(val) {
        console.log(val);
      }
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
  </head>
  <body>
    <h1>Job</h1>
    <div class="info-layer">
      <h2>Web Programmer</h2>
      <h3 class="top-info">Location: Baghdad</h3>
      <h3 class="top-info">Salary Range: 1000-2000 USD</h3>
      <p>
        About the job decsription. Lorem ipsum dolor sit amet, consectetur
        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
        laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit
        amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing
        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
        ut aliquip ex ea commodo consequat.
      </p>
      <div class="bot-layer">
        <div class="hints">
          <div class="hint-text">Publisher Name</div>
          <div class="hint-text">22/2/2022</div>
        </div>
        <div class="button-div">
          <button onclick="Prompt.render('getCVFile')" >Apply</button>
        </div>
      </div>
      <div></div>
    </div>
    <div id="dialogoverlay"></div>
    <div id="dialogbox">
      <div>
        <div id="dialogboxhead"></div>
        <div id="dialogboxbody"></div>
        <div id="dialogboxfoot"></div>
      </div>
    </div>
  </body>
</html>
