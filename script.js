function qs(s) { return document.querySelector(s) }

function PobierzDane(){
    let nazwaUzytkownika=prompt('Podaj nazwę użytkownika')
    let haslo = prompt('Podaj hasło')
    let wyslijUzytkownik=document.querySelector('#uzytkownik')
    wyslijUzytkownik.value=nazwaUzytkownika
    let wyslijHaslo=document.querySelector('#haslo')
    wyslijHaslo.value=haslo
    document.querySelector('#logowanie').submit()
}

const LINK = qs('link')
const SPAN_MOTYW = qs('#motyw')
const LOGO = qs('#logo_img')

if (localStorage.getItem('motyw') === 'light') {
    LINK.href = 'light.css'
    SPAN_MOTYW.innerHTML = 'Przełącz motyw (na ciemny)'
    LOGO.src = "assets/img/logo_black.svg"
}

function przelaczMotyw() {
    let stan = qs('#przycisk_motywu').checked

    if (stan) {
        LINK.href = 'light.css'
        localStorage.setItem('motyw', 'light')
        SPAN_MOTYW.innerHTML = 'Przełącz motyw (na ciemny)'
        LOGO.src = "assets/img/logo_black.svg"
    }
    else {
        LINK.href = 'dark.css'
        localStorage.setItem('motyw', 'dark')
        SPAN_MOTYW.innerHTML = 'Przełącz motyw (na jasny)'
        LOGO.src = "assets/img/logo_white.svg"
    }
}

const SPAN_CZCIONKA = qs('#wartosc_czcionka')
const CZCIONKA = qs('#czcionka')


CZCIONKA.onchange = function() {
    document.body.style.fontSize = CZCIONKA.value + '%'
    SPAN_CZCIONKA.innerHTML = CZCIONKA.value + '%'
}