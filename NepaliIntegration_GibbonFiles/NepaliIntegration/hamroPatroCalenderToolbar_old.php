<?php
?>
<style>
#hamropatroDialog {
    overflow: hidden;
    margin: 0;
    padding: 0;
    border: 0;
    box-sizing: border-box;
    width: 820px;
    height: 880px;
    transform-origin: top left; /* Set the anchor point to the top-left corner */
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
    width: 150px;
    height: 50px;
}

/* Apply styles to the button */
#hamropatroDialogButtonDiv button {
    width: 100%;
    height: 100%;
    border: none;
    cursor: pointer;
    overflow: hidden;
    position: relative;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: box-shadow 0.3s ease, transform 0.3s ease; /* Add transitions for smooth effects */	
}

/* Apply a button-like shading effect on hover */
#hamropatroDialogButtonDiv button:hover {      
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    transform: scale(1.05); /* Add a slight scale effect on hover */
}

/* Apply styles to the button image */
#hamropatroDialogButtonDiv button img {
    width: 100%;
    height: auto;
    object-fit: cover; /* Maintain aspect ratio while covering the button */
}

#hamropatroDialogFloat {
    position: fixed; /* position must be set for z-index to work */
    z-index: 100; /* set lower z-index value */
    visibility:collapse;

    bottom:10px;
    right:10px;
    margin:0px;
    padding:0px;
    width: 820px;
    height: 880px;
}

#hamroPatroButtonFloat {
    position: fixed; /* position must be set for z-index to work */
    z-index: 100; /* set lower z-index value */

    bottom:10px;
    right:10px;
    margin:0px;
    padding:0px;
    width:150px;  		
    height: 50px;
}

</style>

<script>
function hamropatroCalenderToggle() {
  var x = document.getElementById("hamropatroDialogFloat");

  if (x.style.visibility == "visible") {
    x.style.visibility = "collapse";
  } else {
    x.style.visibility = "visible";
  }
} 
</script>

<div id="hamropatroDialogFloat">
    <div id="hamropatroDialog" >
        <iframe id="hamropatroIframe" src="https://www.hamropatro.com/widgets/calender-full.php" 
            frameborder="0" 
            scrolling="no" 
            marginwidth="0" 
            marginheight="0"
    
            allowtransparency="true"
            loading="lazy"
            >
        </iframe>
    </div>
</div>

<div id="hamroPatroButtonFloat">	
	<div id="hamropatroDialogButtonDiv">
		<button id="hamropatroDialogButton" onclick="hamropatroCalenderToggle()">
				<img src="https://www.hamropatro.com/images/hamropatro_logo_with_text.png">
		</button>		
	</div>
</div>
