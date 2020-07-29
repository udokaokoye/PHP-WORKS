
var viewbtn = document.getElementById('view-btn');
var regbtn = document.getElementById('reg-btn');
var registerdiv = document.getElementById('register');
var viewdiv = document.getElementById('view');
var filterbtn = document.getElementById('filter-btn');
var filterdiv = document.getElementById('filter');

if (filterbtn) {
    
    
    filterbtn.addEventListener('click', function () {
    filterdiv.classList.remove('hide');
    filterbtn.classList.add('student-nav-active');
    viewdiv.classList.add('hide');
    registerdiv.classList.add('hide');
    regbtn.classList.remove('student-nav-active');
    viewbtn.classList.remove('student-nav-active');
});
}


if (regbtn) {
    

    regbtn.addEventListener('click', function () {
        filterbtn.classList.remove('student-nav-active');
        filterdiv.classList.add('hide');
    viewdiv.classList.add('hide');
    registerdiv.classList.remove('hide');
    regbtn.classList.add('student-nav-active');
    viewbtn.classList.remove('student-nav-active');
});
}
if (viewbtn) {
    viewbtn.addEventListener('click', function () {
        filterbtn.classList.remove('student-nav-active');
        filterdiv.classList.add('hide');
    viewdiv.classList.remove('hide');
    registerdiv.classList.add('hide');
    regbtn.classList.remove('student-nav-active');
    viewbtn.classList.add('student-nav-active');
});
}

var menubar = document.getElementById('menu');
var sidebar = document.getElementById('side-nav');

menubar.addEventListener('click', function () {
    $(sidebar).toggleClass("show");
});


var drop_btn_message = document.getElementById("drop-message");
    var message_ul = document.getElementById("message-ul");

    drop_btn_message.addEventListener('click', function() {
        message_ul.style.display = "block";
    })

    	




