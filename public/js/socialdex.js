const form = document.forms['search'];
form.addEventListener('submit', function(event){
    if (event.currentTarget.elements[1].value === ''){
        event.preventDefault();
        console.log('Annullato');
    }
});