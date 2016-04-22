function switchToInput (text, input) {
    var textElement = document.getElementById(text);
    var inputElement = document.getElementById(input);
    textElement.classList.add('pooff-hidden');
    inputElement.classList.remove('pooff-hidden');
}

function switchFromInput (input, text) {
    var textElement = document.getElementById(text);
    var inputElement = document.getElementById(input);
    textElement.classList.remove('pooff-hidden');
    inputElement.classList.add('pooff-hidden');
    textElement.innerHTML = inputElement.value;

    var form = text.slice(0, text.indexOf('-'));
    var formElement = document.getElementById(form);
    formElement.submit();
}

var pooffs = document.getElementsByClassName('pooff-text');
for (var i = 0; i < pooffs.length; i++) {
    let id = pooffs[i].id;
    var inputElement = document.getElementById(id + '-input');
    pooffs[i].addEventListener("dblclick", function(){
        console.log(id);
        switchToInput(id, id + '-input');
    });
    inputElement.addEventListener("keypress", function(event){
        if (event.keyCode == 13) {
            switchFromInput(id + '-input', id);
        }
    });
}
