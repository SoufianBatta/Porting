const form = document.forms['signin'];
form.addEventListener('submit',checknullvalues);
resetLabels();

function checknullvalues(event){
    const labels = document.querySelectorAll('label');
    resetLabels();
    let OK = true;
    for (const label of labels) {
        const input = label.querySelector('input') 
        if (input.value === '') {
            OK = false;
            input.placeholder = 'ATTENZIONE INSERIRE QUESTO CAMPO';
            label.classList.add('error');
            label.classList.remove('normal');
        } 
    }
    if (!OK) {
        event.preventDefault();
    }
}

function resetLabels(labels_p = document.querySelectorAll('label')){
    for (const label of labels_p) {
        label.classList.add('normal');
        label.classList.remove('error');
        const input = label.querySelector('input');
        input.placeholder = 'Inserire: ' + input.name.toUpperCase();
    }
}