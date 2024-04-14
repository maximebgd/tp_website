// ------------------- Pour new_work.php -------------------
function afficherTexteAutre(select) {
  var saisieAutre = document.getElementById("saisieAutre");
  var autreInput = document.getElementById("autre");

  if (select.value === "autre") {
    saisieAutre.style.display = "block";
    autreInput.required = true;
  } else {
    saisieAutre.style.display = "none";
    autreInput.required = false;
  }
}

// ------------------- Pour la pagination -------------------
// Enregistrer la position de défilement lors du changement de page
function enregistrerPositionDeDefilement() {
  sessionStorage.setItem("scrollPosition", window.scrollY);
}

// Restaurer la position de défilement lorsque la nouvelle page est chargée
window.onload = function () {
  var scrollPosition = sessionStorage.getItem("scrollPosition");
  if (scrollPosition !== null) {
    window.scrollTo(0, scrollPosition);
    sessionStorage.removeItem("scrollPosition");
  }
};

// ------------------- Pour single_work.php -------------------
// TODO : rajouter le fait qu'on appelle ces fonctions que si on est dans single_work.php
function witchPageIsIt() {
  var pathArray = window.location.pathname.split("/");
  var page = pathArray[pathArray.length - 1];
  return page;
}

if (witchPageIsIt() == "single_work.php") {
  const copyBtn = document.querySelector("#copy_button");
  const textCopy = document.querySelector("#gitclone-text");

  copyBtn.addEventListener("click", () => {
    // Supprimer la classe spécifiée de l'élément
    copyBtn.classList.remove("bxs-copy");

    // Remplacer le contenu du bouton par le check
    copyBtn.innerHTML = "<i class='bx bx-check'></i>";
    copyBtn.style.fontSize = "30px";
    copyBtn.style.background = "#2DCDA7";
    copyBtn.style.color = "#fff";

    copyTextToClipboard(textCopy.innerHTML);
  });
}

function copyTextToClipboard(text) {
  // Créer un élément textarea temporaire pour y mettre le texte à copier
  var textArea = document.createElement("textarea");
  textArea.value = text;

  // Ajouter l'élément textarea au corps du document
  document.body.appendChild(textArea);

  // Sélectionner tout le texte dans l'élément textarea
  textArea.select();

  // Copier le texte dans le presse-papiers
  document.execCommand("copy");

  // Supprimer l'élément textarea temporaire
  document.body.removeChild(textArea);
}



// Fonction pour demander confirmation avant la supression de post/projet 
function confirmDelete(msg) {
  if (confirm(msg)) {
    // Si l'utilisateur clique sur OK, ajoutez "?delete_post=..." à l'URL
    return true;
  } else {
    // Si l'utilisateur clique sur Annuler, ne faites rien
    return false;
  }
}
