
$(document).ready(function(){ // this function shows the login form while clicking on it
    var arrow = $(".arrow-up");
    var form = $(".login-form");
    var loginBut = $(".but_login");
    var status = false; // set status var to make the form appear every time you click
    $(".but_login").click(function(event){ // when you click on login button
        event.preventDefault();
        if(status == false){ // if the form isn't shown
            arrow.fadeIn();
            form.fadeIn(); // fade form in
            loginBut.focus(); // put focus on form button
            status = true;
        } else{ // if the form is shown
            arrow.fadeOut();
            form.fadeOut(); // fade form out on click
            loginBut.blur(); // remove the focus from button
            status = false;
        }
    })
})
