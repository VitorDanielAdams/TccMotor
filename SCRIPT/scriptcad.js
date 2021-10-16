const form = document.getElementById('form');
const codigo = document.getElementById('codigo');
const nome = document.getElementById('nome');
const cpf = document.getElementById('cpf');
const telefone = document.getElementById('telefone');
const inputPassword = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
const cargo = document.getElementById('cargo');
const text = document.getElementById("text-error");


function checkInputs() {

    text.innerText = " ";

    const codigoValue = codigo.value.trim();
    const nomeValue = nome.value.trim();
    const cpfValue = cpf.value.trim();
    const telefoneValue = telefone.value.trim();
    const passwordValue = inputPassword.value.trim();
    const confirmPasswordValue = confirmPassword.value.trim();
    const cargoValue = cargo.value.trim();

    if (codigoValue === '') {
        setErrorFor(codigo);
    } else if (codigoValue.length > 10) {
        setErrorFor(codigo);
    } else {
        setSuccessFor(codigo);
    }

    if (nomeValue === '') {
        setErrorFor(nome);
    } else {
        setSuccessFor(nome);
    }

    if (cpfValue === '') {
        setErrorFor(cpf);
    } else if (!isCpf(cpfValue)) {
        setErrorFor(cpf);
    } else {
        setSuccessFor(cpf);
    }

    if (telefoneValue === '') {
        setErrorFor(telefone);
    } else {
        setSuccessFor(telefone);
    }

    if (passwordValue === '') {
        setErrorFor(inputPassword);
    } else if (passwordValue.length < 8) {
        text.innerText = "Senha muito curta";
        setErrorFor(inputPassword);
    } else {
        setSuccessFor(inputPassword);
    }

    if (confirmPasswordValue === '') {
        setErrorFor(confirmPassword);
    } else if (passwordValue !== confirmPasswordValue) {
        text.innerText = "As senhas não correspondem";
        setErrorFor(confirmPassword);
    } else {
        setSuccessFor(confirmPassword);
    }

    if (cargoValue === 'hide') {
        setErrorFor(cargo);
    } else {
        setSuccessFor(cargo);
    }

    if (codigoValue !== '' && nomeValue !== '' && cpfValue !== '' && isCpf &&
        telefoneValue !== '' && passwordValue !== '' && passwordValue.length >= 8 && confirmPasswordValue !== '' &&
        passwordValue === confirmPasswordValue && cargoValue !== 'hide') {
        return true;
    } else {
        return false;
    }

}

function setErrorFor(input) {
    const inputControl = input.parentElement;
    const span = inputControl.querySelector('span');

    span.style.display = "flex";

    inputControl.className = 'input error';
}

function setSuccessFor(input) {
    const inputControl = input.parentElement;
    const span = inputControl.querySelector('span');

    text.innerText = " ";

    span.style.display = "none";

    inputControl.className = 'input';

}

function isCpf(cpf) {
    return /^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/.test(cpf);
}