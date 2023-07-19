const form = document.forms['signin'];
form.addEventListener('submit',checknullvalues);
reset();
const desc = {
    nome: "Inserire il Proprio Nome All'interno",
    cognome: "Inserire il Proprio Cognome All'interno",
    email: "Inserire La Email All'interno",
    telefono: "Inserire il Telefono All'interno",
    username: "Inserire Lo Username All'interno",
    password: "Inserire La Password All'interno, assicurarsi che la password contiene almeno 8 caratteri, un carattere maiuscolo, minuscolo, un carattere speciale ed un numero"
};
console.log(desc.nome);
function checknullvalues(event){
    const labels = document.querySelectorAll('label');
    reset();
    let OK = true;
    for (const label of labels) {
        const input = label.querySelector('input') 
        if (input.value === '') {
            OK = false;
            input.placeholder = 'ATTENZIONE INSERIRE QUESTO CAMPO';
            label.classList.add('error');
            label.classList.remove('normal');
        } 
        if(input.name === 'password' && input.value !== '') {
            const regex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            if(!(regex.test(input.value))){
                OK =  false;
                console.log('Invalid password');
                const errore = document.createElement('div');
                errore.id = 'Errore';
                errore.innerHTML = 'ATTENZIONE LA PASSWORD NON RISPETTA I REQUISITI';
                document.getElementById('Content').appendChild(errore);
            }
        }
    }

    if (!OK) {
        event.preventDefault();
    }
}

function reset(labels_p = document.querySelectorAll('label')){
    const Errore = document.getElementById('Errore');
    if (Errore) {
        Errore.parentElement.removeChild(Errore);
    }
    for (const label of labels_p) {
        label.classList.add('normal');
        label.classList.remove('error');
        const input = label.querySelector('input');
        input.addEventListener('focus', changeDesc);
        input.addEventListener('blur', blurDesc);
        input.placeholder = 'Inserire: ' + input.name.toUpperCase();
    }
}

function changeDesc(event){
    const input = event.currentTarget;
    const div = document.querySelector('#info_box');
    const div_child = document.createElement('div');
    div_child.innerHTML = desc[input.name];
    div.appendChild(div_child);
    div.classList.remove('vanish');
}
function blurDesc(event){
    const div = document.querySelector('#info_box');
    div.innerHTML = '';
    div.classList.add('vanish');
}