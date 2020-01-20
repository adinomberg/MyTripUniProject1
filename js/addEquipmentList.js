// Initialize common used variables
const newELInput = document.ELForm[0];

/**
 * Creates a element with a new text node that is derived from the input value
 * and appends it to the Equipment list
 * @returns {boolean}
 */
function addToList() {
    if (newELInput.value) {
        var EList = document.getElementsByClassName('my-equipment-list')[0];
        var newItem = createNewItem(newELInput.value);
        EList.appendChild(newItem);

        clearInput();

    }
    return false; // Return false so the form won't be submitted automatically
}

/**
 * Creates a new list structure for the DOM and returns the element
 * deletes the example bullet
 * @param value
 * @returns {Element}
 */
function createNewItem(value) {

    var ul = document.createElement('UL');
    ul.setAttribute('id', 'myUL');
    document.body.appendChild(ul);

    var li = document.createElement('LI');
    var text=document.createTextNode(value);
    li.appendChild(text);
    document.getElementById("myUL").appendChild(li);

    document.getElementById("example").style.display="none";

    return ul;

}

/**
 * Clears the new equipment list input value
 */
function clearInput() {
    newELInput.value = null;
}

/**
 * deletes the existing list
 */
function clearList() {
    var div = document.getElementById('myUL');
    while(div.firstChild){
        div.removeChild(div.firstChild);
    }
    document.getElementById("example").style.display="inline";
}