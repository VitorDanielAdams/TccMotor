const form = document.getElementById('form');
const sistema = document.getElementById('sistema');
const potencia = document.getElementById('potencia');
const voltagem = document.getElementById('voltagem');
const amperagem = document.getElementById('amperagem');
const bitola = document.getElementById('bitola');
const fios = document.getElementById('fios');
const espiras = document.getElementById('espiras');
const marca = document.getElementById('marca');
const rpm = document.getElementById('rpm');
const rotacao = document.getElementById('rotacao');
const ligacao = document.getElementById('ligacao');
const camada = document.getElementById('camada');
const cliente = document.getElementById('cliente');

const text = document.getElementById("text-error");

function checkInputs() {

    text.innerText = " ";

    const sistemaValue = sistema.value.trim();
    const potenciaValue = potencia.value.trim();
    const voltagemValue = voltagem.value.trim();
    const amperagemValue = amperagem.value.trim();
    const bitolaValue = bitola.value.trim();
    const fiosValue = fios.value.trim();
    const espirasValue = espiras.value.trim();
    const marcaValue = marca.value.trim();
    const rpmValue = rpm.value.trim();
    const rotacaoValue = rotacao.value.trim();
    const ligacaoValue = ligacao.value.trim();
    const camadaValue = camada.value.trim();
    const clienteValue = cliente.value.trim();

    if (sistemaValue === 'hide') {
        setErrorFor(sistema);
    } else {
        setSuccessFor(sistema);
    }

    if (potenciaValue === '') {
        setErrorFor(potencia);
    } else {
        setSuccessFor(potencia);
    }

    if (voltagemValue === '') {
        setErrorFor(voltagem);
    } else {
        setSuccessFor(voltagem);
    }

    if (amperagemValue === '') {
        setErrorFor(amperagem);
    } else {
        setSuccessFor(amperagem);
    }

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

    if (marcaValue === '') {
        setErrorFor(marca);
    } else {
        setSuccessFor(marca);
    }

    if (rpmValue === '') {
        setErrorFor(rpm);
    } else {
        setSuccessFor(rpm);
    }

    if (rotacaoValue === 'hide') {
        setErrorFor(rotacao);
    } else {
        setSuccessFor(rotacao);
    }

    if (ligacaoValue === 'hide') {
        setErrorFor(ligacao);
    } else {
        setSuccessFor(ligacao);
    }

    if (camadaValue === 'hide') {
        setErrorFor(camada);
    } else {
        setSuccessFor(camada);
    }

    if (clienteValue === '') {
        setErrorFor(cliente);
    } else {
        setSuccessFor(cliente);
    }

    if (sistemaValue !== 'hide' && potenciaValue !== '' && voltagemValue !== '' &&
        amperagemValue !== '' && bitolaValue !== '' && fiosValue !== '' &&
        espirasValue !== '' && marcaValue !== '' && rpmValue !== '' &&
        rotacaoValue !== 'hide' && ligacaoValue !== 'hide' && camadaValue !== 'hide' &&
        clienteValue !== '') {
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