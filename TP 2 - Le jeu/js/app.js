var checkboxes = document.querySelectorAll('input[type="checkbox"]');

checkboxes.forEach(function (checkbox) {
  if (checkbox.checked) {
    console.log("La checkbox " + checkbox.value + " est cochée.");
  } else {
    console.log("Aucune case n'est coché ! ");
  }
});
