const form = document.forms['login'];
 form.addEventListener('submit',CheckValues);

 function CheckValues(event){
    let OK = true;
    const labels = form.querySelectorAll('label');
    for (const label of labels) {
        const input = label.querySelector('input');
        if (input.value === ''){
            OK = false;
            label.classList.remove('normal');
            label.classList.add('error');
            input.placeholder = 'ATTENZIONE, INSERIRE UN VALORE IN QUESTO CAMPO';
        }
        if (!OK){
            event.preventDefault();
        }
    }
 }