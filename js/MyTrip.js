/* Get all elements with class="close" */

var closebtns = document.getElementsByClassName("close");
var i;

/* Loop through the elements, and hide the parent, when clicked on */
for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function() {
        this.parentElement.style.display = 'none';
    });





    var d = document;

// not using this at the moment but might do later for graceful degradation...
    function supports_html5_storage() {
        try {
            return 'localStorage' in window && window['localStorage'] !== null;
        } catch (e) {
            return false;
        }
    }

    d.addEventListener('DOMContentLoaded', function(){

        var savedContent = localStorage.getItem("notepadcontent");
        if(savedContent != null){
            d.getElementById("notepad").value = savedContent;
        }


        d.getElementById("notepad").onkeyup = function(){
            var data = d.getElementById("notepad").value;  localStorage.setItem("notepadcontent", data);
        }
    });}