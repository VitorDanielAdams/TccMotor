const form = document.getElementById('form');
const bitola = document.getElementById('bitolaP');
const fios = document.getElementById('fiosP');
const espiras = document.getElementById('espirasP');
const bitolaAux = document.getElementById('bitolaAux');
const fiosA = document.getElementById('fiosA');
const espirasA = document.getElementById('espirasA');
const img = document.getElementById('imagem');
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
    const imgValue = img.value.trim();
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

    if (imgValue === '') {
        setErrorFor(img);
    } else {
        setSuccessFor(img);
    }

    if (clienteValue === '') {
        setErrorFor(cliente);
    } else {
        setSuccessFor(cliente);
    }

    if (bitolaValue !== '' && fiosValue !== '' && espirasValue !== '' && bitolaAValue !== '' &&
        fiosAValue !== '' && espirasAValue !== '' && imgValue !== '' && clienteValue !== '') {
        return true;
    } else {
        return false;
    }

}

function setErrorFor(input) {
    const inputControl = input.parentElement;

    if (input === img) {
        inputControl.className = 'inputfile error';
    } else {
        inputControl.className = 'input error';
    }


}

function setSuccessFor(input) {
    const inputControl = input.parentElement;

    text.innerText = " ";
    if (input === img) {
        inputControl.className = 'inputfile';
    } else {
        inputControl.className = 'input';
    }

}