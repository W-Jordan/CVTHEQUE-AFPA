select = document.querySelector("select")
listeInputs = document.querySelectorAll("input")

select.addEventListener("change", chargementInput)

// console.log(select.options[select.selectedIndex].text)

const requ = new XMLHttpRequest();
requ.onreadystatechange = function(event) {
    // XMLHttpRequest.DONE === 4
    if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
            liste = JSON.parse(this.responseText);
            // console.log(liste)
        }
    }
};
requ.open('GET', './recupereJSON.php', true);
requ.send(null);

function chargementInput(){
    index = (select.options[select.selectedIndex].value-1)
    listeInputs[0].value = liste.lesCV[index].nom
    listeInputs[1].value = liste.lesCV[index].prenom
    listeInputs[2].value = liste.lesCV[index].mail
    listeInputs[3].value = liste.lesCV[index].metier
    listeInputs[4].value = liste.lesCV[index].description
    listeInputs[5].value = liste.lesCV[index].telephone
}