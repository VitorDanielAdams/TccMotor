const form = document.getElementById('form');
const bitola = document.getElementById('bitola');
const fios = document.getElementById('fios');
const espiras = document.getElementById('espiras');
const cliente = document.getElementById('cliente');

const text = document.getElementById("text-error");

function checkInputs() {

    text.innerText = " ";

    const bitolaValue = bitola.value.trim();
    const fiosValue = fios.value.trim();
    const espirasValue = espiras.value.trim();
    const clienteValue = cliente.value.trim();

    if (bitolaValue === '') {
        setErrorFor(bitola);
    } else {
        setSuccessFor(bitola);
    }

    if (fiosValue === '') {
        setErrorFor(fios);
    } else {
        setSuccessFor(fios);
    }

    if (espirasValue === '') {
        setErrorFor(espiras);
    } else {
        setSuccessFor(espiras);
    }

    if (clienteValue === '') {
        setErrorFor(cliente);
    } else {
        setSuccessFor(cliente);
    }

    if (bitolaValue !== '' && fiosValue !== '' && espirasValue !== '' && clienteValue !== '') {
        return true;
    } else {
        return false;
    }

}

function setErrorFor(input) {
    const inputControl = input.parentElement;

    inputControl.className = 'input error';

}

function setSuccessFor(input) {
    const inputControl = input.parentElement;

    inputControl.className = 'input';

}