//View Ctrl
const View = (function () {
  const domElements = {
    form: document.getElementById("form"),
    recipeInput: document.getElementById("naziv-recepta"),
    container: document.querySelector(".container"),
    favorite: document.getElementById("favorite"),
  };

  function cleanInput() {
    domElements.recipeInput.value = "";
  }

  function cleanContainer() {
    const card = document.querySelectorAll(".card");
    [...card].forEach((el) => domElements.container.removeChild(el));
  }

  const loadinfoID = () => document.querySelector(".poster").dataset.id;

  return {
    domElements,
    cleanInput,
    cleanContainer,
    loadinfoID,
  };
})();
