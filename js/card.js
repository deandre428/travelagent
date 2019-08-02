function checkForm(form) {
    var shouldReturn = false;
    document.getElementById("AmericanExpress").style.display = "none";
    document.getElementById("VISA").style.display = "none";
    document.getElementById("MasterCard").style.display = "none";
    if (form.cardNumber.value[0] == 5) { // name entered
        document.getElementById("MasterCard").style.display = "block";
    }
    if (form.cardNumber.value[0] == 3) { // name entered
        document.getElementById("AmericanExpress").style.display = "block";
    }
    if (form.cardNumber.value[0] == 4) { // name entered
        document.getElementById("VISA").style.display = "block";
    }
    return shouldReturn; // passed all the checks: OK to submit... FOR NOW YOU HEATHEAN!
}

function colorize(elementName, color) {
    document.getElementById(elementName).style.color = color;
}

function hide(elementName) {
    document.getElementById(elementName).style.display = none;
}

function unHide(elementName) {
    document.getElementById(elementName).style.display = block;
}