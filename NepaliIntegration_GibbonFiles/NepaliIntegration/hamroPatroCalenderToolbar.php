<?php

session_start();
if (isset($_POST["toggleBS"]))
{    
    $_SESSION['bsToggled'] = !($_SESSION['bsToggled']);
}

?>
<head>
<style>
    #hamropatroDialog {
        overflow: hidden;
        margin: 0;
        padding: 0;
        border: 0;
        box-sizing: border-box;
        width: 820px;
        height: 880px;
        transform-origin: top left;
    }

    #hamropatroIframe {
        overflow: hidden;
        margin: 0;
        padding: 0;
        border: 0;
        box-sizing: border-box;
        width: 820px;
        height: 880px;
    }

    #hamropatroDialogButtonDiv {
        float: right;
        width: 40px;
        height: 40px;
    }

    #hamropatroDialogButtonDiv button {
        width: 100%;
        height: 100%;
        border: none;
        cursor: pointer;
        overflow: hidden;
        position: relative;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    #hamropatroDialogButtonDiv button:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transform: scale(1.05);
    }

    #hamropatroDialogButtonDiv button img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    #hamropatroDialogFloat {
        position: fixed;
        z-index: 100;
        visibility: collapse;
        bottom: -30px;
        right: 50px;
        margin: 0px;
        padding: 0px;
        width: 820px;
        height: 880px;
    }

    #hamroPatroButtonFloat {
        position: fixed;
        z-index: 100;       
        bottom: 130px;
        right: 0px;
        margin: 0px;
        padding: 0px;
        width: 50px;
        height: 50px;
    }

    #npPageTransformDialog {
        overflow: hidden;
        margin: 0;
        padding: 0;
        border: 0;
        box-sizing: border-box;
        width: 820px;
        height: 880px;
        transform-origin: top left;
    }

    #npPageTransformDialogFloat {
        position: fixed;
        z-index: 100;
        visibility: collapse;
        bottom: 27px;
        right: 70px;
        margin: 0px;
        padding: 0px;
        width: 160px;
        height: 150px;
    }

    #npPageTransformDialogBackground {
        border-radius: 10px 10px 10px 10px;
        border: 2px solid #b3b3b3;        
        background: #e6e6e6;
        padding: 10px;
        width: 160px;
        height: 150px;
        text-align: center;
    }

    #npPageTransformDialogFrame {
        overflow: hidden;
        margin: 0;
        padding: 0;
        border: 0;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
    } 

    #npPageTransformDialog button {
        border-color: #adb1b8 #a2a6ac #8d9096;
        border-style: solid;
        border-width: 1px;
        border-radius: 3px;
  
        box-sizing: border-box;

        white-space: nowrap;

        color: #0f1111;
        cursor: pointer;
        display: inline-block;
        font-family: "Amazon Ember", Arial, sans-serif;
        font-size: 14px;
        height: 29px;
        font-size: 13px;
        outline: 0;
        overflow: hidden;
        padding: 0 7px;
        text-align: center;
        text-decoration: none;
        text-overflow: ellipsis;

        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
        /* box-shadow: rgba(255, 255, 255, .6) 0 1px 0 inset; */
        transition: box-shadow 0.7s ease, transform 0.7s ease;
    }

    #npPageTransformDialog button:active {
        background-image: linear-gradient(#f7f8fab0, #e7e9ecb0);
        border-bottom-color: #a2a6ace5;
    }   
</style>

<script>
    function npCalendarSettingsToggle(toggleElementName) {
        var x = document.getElementById(toggleElementName);

        if (x.style.visibility == "visible") {
            x.style.visibility = "collapse";
        } else {
            x.style.visibility = "visible";
        }
    }
</script>
</head>
<body>
<div id="hamropatroDialogFloat">
    <div id="hamropatroDialog">
        <iframe id="hamropatroIframe" src="https://www.hamropatro.com/widgets/calender-full.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" allowtransparency="true" loading="lazy">
        </iframe>
    </div>
</div>

<div id="npPageTransformDialogFloat">
    <div id="npPageTransformDialog">
        <div id="npPageTransformDialogFrame">
            <div id="npPageTransformDialogBackground">
                <p style="font-size: 11.3px; float: left;">Page Settings:</p>
                <form action="" method="post">
                    <button id="timetableBsToggle" name="toggleBS" value="toggleBS">
                        Toggle BS Timetable
                    </button>
                </form>
            </div>
        </div>  
    </div>
</div>

<div id="hamroPatroButtonFloat">
    <div id="hamropatroDialogButtonDiv">
        <button id="npPageTransformButton" onclick="npCalendarSettingsToggle('npPageTransformDialogFloat')">
            <img src="NepaliIntegration/settings_icon.png">
        </button>
        <button id="hamropatroDialogButton" onclick="npCalendarSettingsToggle('hamropatroDialogFloat')">
            <img src="https://www.hamropatro.com/images/hamropatro.png">
        </button>
    </div>
</div>
</body>

<?php

