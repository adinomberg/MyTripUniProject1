// a function that tells whether an element is in view after scrolling into it
function isScrolledIntoView(elem){
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

// a function that changes the opacity of an element once it has scrolled into view
function chnageOpacity(){
    var listOfPics = [$(".dest1"), $(".dest2"), $(".dest3"), $(".dest4"), $(".dest5"), $(".dest6"), $(".dest7"), $(".dest8")]
    var i;
    for (i = 0; i < listOfPics.length; i++) {
        listOfPics[i].each(function(){
            var img = $(listOfPics[i]);
            if (isScrolledIntoView(listOfPics[i])){
                img.css("opacity","1.0");
                img.css("transition", "all 0.8s ease-in 0s")
            }
            else{
                img.css("opacity","0.3");
                img.css("transition", "all 0.8s ease-out 0.5s")
            }
        });
    }
}

$(function(){
    chnageOpacity();
    $(window).scroll(chnageOpacity);
});