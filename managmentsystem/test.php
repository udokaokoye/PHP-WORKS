<?php
include "header.php";
include "footer.php";
session_start();
?>

<h2>Animated Modal with Header and Footer</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModall" class="modall">

    <!-- Modal content -->
    <div class="modall-content">
        <span class="close">&times;</span>
        <div class="modall-body">
            <p>Some text in the Modal Body</p>
            <p>Some other text...</p>
        </div>
    </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModall");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>