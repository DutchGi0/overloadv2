let topBtn = document.getElementById("topbtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        topBtn.style.display = "block";
    } else {
        topBtn.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

function BackFunction() {
    window.history.back();
}

//<div id="countdown">
//                     <div class="countdown-item">
//                         <h3 id="days"></h3>
//                         <p>Days</p>
//                     </div>
//                     <div class="countdown-item">
//                         <h4 id="hours"></h4>
//                         <p>Hours</p>
//                     </div>
//                     <div class="countdown-item">
//                         <h5 id="minutes"></h5>
//                         <p>Minutes</p>
//                     </div>
//                     <div class="countdown-item">
//                         <p id="seconds"></p>
//                         <p>Seconds</p>
//                     </div>
//                 </div>