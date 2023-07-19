const filechange = document.querySelector('input[type=file]');
console.log(filechange);
filechange.addEventListener('change', ChangeProfilePic);

function ChangeProfilePic(event){
    const data = new FormData();
    const file = event.currentTarget.files[0];
    data.append('Propic',file);
    fetch("http://127.0.0.1:8000/HomePage/ChangeAvatar",{
        method:'post',
        body: data
    }).then(onPropicResponse);
}

function onPropicResponse(response){
    if(response.ok){
        response.json().then(onPropicJSON);
    }
    else{
        console.error("Errore durante il caricamento dell'immagine");
    }
}

function onPropicJSON(data){
    console.log(data);
    if (data['Avatar']=== 'Cambiato') {
        console.log('Okay Campione');
        window.location.reload();
    }
}