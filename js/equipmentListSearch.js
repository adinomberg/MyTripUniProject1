/**
 * changes the equipment list-
 * makes the display bigger, hides the three dots and adds the hidden items
 * */

function change(el) {

    if (el.style.height == ''){
        el.style.height = '300px';
        el.children[3].style.display="none";
        el.children[4].style.display="inline";
    }

    else{
        el.style.height = '';
        el.children[3].style.display="inline";
        el.children[4].style.display="none";
    }

}