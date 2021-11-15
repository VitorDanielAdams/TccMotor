const form = document.getElementById('form');
const bitola = document.getElementById('bitolaP');
const fios = document.getElementById('fiosP');
const espiras = document.getElementById('espirasP');
const bitolaAux = document.getElementById('bitolaAux');
const fiosA = document.getElementById('fiosA');
const espirasA = document.getElementById('espirasA');
const cliente = document.getElementById('cliente');

const text = document.getElementById("text-error");

function checkInputs() {

    text.innerText = " ";

    const bitolaValue = bitola.value.trim();
    const fiosValue = fios.value.trim();
    const espirasValue = espiras.value.trim();
    const bitolaAValue = bitolaAux.value.trim();
    const fiosAValue = fiosA.value.trim();
    const espirasAValue = espirasA.value.trim();
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

    if (bitolaAValue === '') {
        setErrorFor(bitolaAux);
    } else {
        setSuccessFor(bitolaAux);
    }

    if (fiosAValue === '') {
        setErrorFor(fiosA);
    } else {
        setSuccessFor(fiosA);
    }

    if (espirasAValue === '') {
        setErrorFor(espirasA);
    } else {
        setSuccessFor(espirasA);
    }

    if (clienteValue === '') {
        setErrorFor(cliente);
    } else {
        setSuccessFor(cliente);
    }

    if (bitolaValue !== '' && fiosValue !== '' && espirasValue !== '' && bitolaAValue !== '' &&
        fiosAValue !== '' && espirasAValue !== '' && clienteValue !== '') {
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