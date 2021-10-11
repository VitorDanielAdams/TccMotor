const form = document.getElementById('form');
const cpf = document.getElementById('cpf');
const inputPassword = document.getElementById('password');
const text = document.getElementById("text-error");

text.innerText = " ";

function checkInputs() {

    const cpfValue = cpf.value.trim();
    const passwordValue = inputPassword.value.trim();

    if (cpfValue === '') {
        setErrorFor(cpf);
    } else {
        setSuccessFor(cpf);
    }

    if (passwordValue === '') {
        setErrorFor(inputPassword);
    } else {
        setSuccessFor(inputPassword);
    }

    if (cpfValue !== '' && passwordValue !== '') {
        return true;
    } else {
        return false;
    }

}

function setErrorFor(input) {
    const inputControl = input.parentElement;
    const span = inputControl.querySelector('span');

    if (span.className !== 'eye') {
        span.style.display = "flex";
    }

    inputControl.className = 'input error';
}

function setSuccessFor(input) {
    const inputControl = input.parentElement;
    const span = inputControl.querySelector('span');

    text.innerText = " ";

    if (span.className !== 'eye') {
        span.style.display = "none";
    }

    inputControl.className = 'input';

}

//--------------------------------------------------------------------------------------------//

// Mostrar senha

var state = false;

function toggle() {
    if (state) {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById('show').style.display = "inline-block";
        document.getElementById('hide').style.display = "none";
        state = false;
    } else {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById('hide').style.display = "inline-block";
        document.getElementById('show').style.display = "none";
        state = true;
    }
}