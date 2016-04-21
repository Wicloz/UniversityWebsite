function makeInput (form, field, type) {
    var elid = form + '_' + field;
    var old_element = document.getElementById(elid);
    var new_element = document.createElement('input');

    new_element.id = old_element.id;
    new_element.type = type;
    new_element.classList.add(type);
    new_element.value = old_element.innerHTML;

    new_element.onkeydown = function(event){
        if (event.keyCode == 13) {
            revertInput(form, field, type);
        }
    };

    old_element.parentNode.replaceChild(new_element, old_element);
}

function revertInput (form, field, type) {
    var elid = form + '_' + field;
    var old_element = document.getElementById(elid);
    var new_element = document.createElement('span');

    if (old_element.value) {
        var formElement = document.getElementById(form);
        var hidden = document.getElementById(elid + '_hidden');

        if (!hidden) {
            hidden = document.createElement('input');
            formElement.appendChild(hidden);
            hidden.id = elid + '_hidden';
            hidden.type = 'hidden';
            hidden.name = field;
        }
        hidden.value = old_element.value;

        new_element.id = old_element.id;
        new_element.innerHTML = old_element.value;
        new_element.ondblclick = function(){makeInput(form, field, type);};

        old_element.parentNode.replaceChild(new_element, old_element);

        formElement.submit();
    }
}
