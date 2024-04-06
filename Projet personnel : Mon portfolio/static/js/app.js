function afficherTexteAutre(select) {
    var saisieAutre = document.getElementById("saisieAutre");
    var autreInput = document.getElementById("autre");

    if (select.value === "autre") {
        saisieAutre.style.display = "block";
        autreInput.required = true;
        console.log("dans autre");
    } else {
        saisieAutre.style.display = "none";
        autreInput.required = false;
        console.log("sinon");
    }
}

// Pour single_work.php
function copyToClipboard() {
    /* Sélectionne le texte à copier */
    var text = document.getElementById("gitclone-text");

    /* Crée un élément textarea temporaire pour copier le texte */
    var tempInput = document.createElement("textarea");
    tempInput.value = text.innerText;
    document.body.appendChild(tempInput);

    /* Sélectionne tout le texte dans l'élément textarea temporaire */
    tempInput.select();
    tempInput.setSelectionRange(
      0,
      99999
    ); /* Pour les navigateurs mobiles */

    /* Copie le texte dans le presse-papiers */
    document.execCommand("copy");

    /* Supprime l'élément textarea temporaire */
    document.body.removeChild(tempInput);

    /* Affiche un message de confirmation */
}



