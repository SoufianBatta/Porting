const tooglebtn = document.querySelector('#navbar .buttonMenu');
const tooglebtn_img = document.querySelector('#navbar .buttonMenu img');
const dropdown = document.querySelector('#menuOverlay');

tooglebtn.onclick = function(){
    dropdown.classList.toggle('open');
    const isOpen = dropdown.classList.contains('open');
    tooglebtn_img.src = isOpen ? 'http://127.0.0.1:8000/Images/close.png' : 'http://127.0.0.1:8000/Images/open.png';
}
