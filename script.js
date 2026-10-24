function PobierzDane(){
    let nazwaUzytkownika=prompt('Podaj nazwę użytkownika')
    let haslo = prompt('Podaj hasło')
    let wyslijUzytkownik=document.querySelector('#uzytkownik')
    wyslijUzytkownik.value=nazwaUzytkownika
    let wyslijHaslo=document.querySelector('#haslo')
    wyslijHaslo.value=haslo
    document.querySelector('#logowanie').submit()
}
