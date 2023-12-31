const X_IMG = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/1083533/x.png';
const O_IMG = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/1083533/circle.png';
var token = null;
getPokemon();
let Pokemon_id = null;
function getPokemon(){
    const choosen = Math.floor(Math.random() * 699) + 1;
    console.log(choosen);
    fetch("http://127.0.0.1:8000/api/GetPokemon/"+choosen).then(onResponse);
}

function onResponse(result){
    if(result.ok){
        result.json().then(onJson);
    }
    else{
        console.error('Errore nella generazione del Pokemon');
    }
}

function onJson(result){
    console.log(result);
    if (result['NotFound']) {
        window.location.reload();
    }
    else{
        const pokemon = result['Pokemon'];
        Pokemon_id = pokemon.id;
        const div = document.createElement('div');
        const img = document.createElement('img');
        img.src = pokemon.img;
        div.appendChild(img);
        const div_2 = document.createElement('div');
        const name = document.createElement('span');
        name.innerHTML = pokemon.Name;
        const type1 = document.createElement('span');
        type1.innerHTML = pokemon.Type1;
        type1.id = pokemon.Type1;
        div_2.appendChild(name);
        div_2.appendChild(type1);
        if(pokemon.Type2){
            const type2 = document.createElement('span');
            type2.innerHTML = pokemon.Type2;
            type2.id = pokemon.Type2;
            div_2.appendChild(type2);
        }
        const Pokemon = document.querySelector('#Pokemon');
        const data = new FormData();
        data.append('Pokemon', Pokemon_id);
        data.append('_token', result.Token);
        fetch("http://127.0.0.1:8000/api/RegistraIncontro", {method: 'post', body: data}).then(onResponseincontro);
        Pokemon.appendChild(div);
        Pokemon.appendChild(div_2);
    }
}

function onResponseincontro(resp){
    if(!resp.ok){
        console.error("Attenzione Pokemon Non Registrato");
    }
    else{
        resp.json().then(ontext);
    }
}
function ontext(body){
    console.log(body);
    token = body.Token;
}

//FUNCTIONS
function PutX(event) {
     assingSpace(event.currentTarget, 'X');
    if (checkWinner() !== null)
    {
        DisplayResult();
    }else{
        PutO();
    }
}

function PutO(){
    if (freeboxes.length > 0) {
        const index = Math.floor(Math.random() * freeboxes.length)
        const choosenbox = freeboxes[index];
        assingSpace(choosenbox, 'O');
    }
    if (checkWinner() !== null || freeboxes.length === 0)
    {
        DisplayResult();
    }
}

function assingSpace(space,owner){
    const image = document.createElement('img');
    image.src = owner === 'X'? X_IMG : O_IMG;
    space.appendChild(image);
    space.removeEventListener('click', PutX);
    space.classList.remove('notchosen');

    takenboxes[space.id] = owner;
    const indextoremove = freeboxes.indexOf(space);
    freeboxes.splice(indextoremove,1);

}
//ADDING LISTENERS TO ALL BOXES
const allboxes = document.querySelectorAll('#grid div');
const freeboxes = [];
const takenboxes = {};
for (const box of allboxes) {
    box.addEventListener('click', PutX);
    freeboxes.push(box);
}
function checkbox(box1,box2,box3)
{
    if(takenboxes[box1] !== undefined && takenboxes[box1] === takenboxes[box2] && takenboxes[box1] === takenboxes[box3])
    {
       return takenboxes[box1];
    }
    return null;
}

function checkWinner()
{
    let rowwinner = checkbox('one','two','three') || checkbox('four','five','six') || checkbox('seven','eight','nine');
    let columnwinner = checkbox('one','four','seven') || checkbox('two','five','eight') || checkbox('three','six','nine');
    let diagonalwinner = checkbox('one','five','nine') || checkbox('three','seven','five');
    return rowwinner || columnwinner || diagonalwinner;
}

function DisplayResult(){
    
    const boxes = document.querySelectorAll('#grid div');
    for (const box of boxes) {
        box.removeEventListener('click',PutX);
        box.classList.remove('notchosen');
    }
    const div = document.createElement('div');
    div.id = 'finish';
    const span = document.createElement('span');
    const final = checkWinner();
    if (final === 'X'){
        span.innerHTML = "Complimenti hai catturato il Pokemon! ora potrai vedere tutti i suoi dati nel SocialDex";
        const data = new FormData();
        data.append('Pokemon', Pokemon_id);
        data.append('_token', token);
        fetch("http://127.0.0.1:8000/api/CatturaPokemon", {method: 'post', body: data}).then(onResponseincontro);
    }
    else if(final === 'O' || freeboxes.length === 0) {
        span.innerHTML = "Bella Sfida! la prossima volta potrai diventare il Vincitore!";
    }
    const button = document.createElement('button');
    button.innerHTML = 'Cattura un Altro Pokemon';
    button.type = 'button';
    button.addEventListener('click', Restart);
    div.appendChild(span);
    div.appendChild(button);
    const result = document.querySelector('#Result');
    result.innerHTML = "";
    result.appendChild(div);
}
function Restart(){
    window.location.reload();
}
//GAME