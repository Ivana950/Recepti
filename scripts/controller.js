//Controller
const Ctrl = (function (model, view) {
  //Get DOM Object from View Ctrl
  const domElements = view.domElements;

  //Events

  domElements.form.addEventListener("submit", getInput);
  domElements.container.addEventListener("click", ShowList);
  domElements.container.addEventListener("click", goBack);

  // function for insert API results in DOM
  function showRecipes(recipe) {
    if (recipe.title !== undefined) {
      let div = document.createElement("div");
      div.classList = "card";
      let html = `
    <div class="recipe-img">
      <img src="${recipe.image_url}" id="posterInfo" data-id=${recipe.recipe_id} />
    </div>
  
    <h4 class="title-h" >${recipe.title}</h4>
    <div class="rate-date">
      <div class="date">
      <i class="fas fa-user"></i>
        <p class="date-num">${recipe.publisher}</p>
      </div>
    </div>
  
    `;
      div.innerHTML = html;

      domElements.icons === true
        ? (document.icons.style.display = "block")
        : false;

      domElements.container.insertAdjacentElement("beforeend", div);
    }
  }

  let saveInput;

  function getInput(e) {
    e.preventDefault();

    view.cleanContainer();
    saveInput = domElements.recipeInput.value;

    let recipes = model.searchRecipe(saveInput);

    recipes.then((recipe) => {
      const recipeArr = recipe.data.recipes;
      recipeArr.forEach((item) => showRecipes(item));
    });
  }

  function cardInfo(arr) {
    let id = sessionStorage.getItem("recipeId");

    // let id = view.loadinfoID();

    model.searchById(id).then((item) => {
      const recipe = item.data.recipe;

      const ingredients = item.data.recipe.ingredients.join(",");
      const output = `
      <div class="container-info">
      <div class='child-info'>
          <div class="info-card">
          <div class="poster" data-id=${recipe.recipe_id}><img src="${
        recipe.image_url
      }" /></div>

          <div class="info-recipe">
            <div class="info-heading">
              <h2>${recipe.title}</h2>
              <a href="#" id="favorite"><img src="#" class=${addClassFav(
                arr,
                id
              )}></a>
            </div>
              <ul>
                <li>Title: ${recipe.title}</li>
                <li>Publisher: ${recipe.publisher}</li>
               
                <li>Ingredients: ${ingredients} </li>
                
                <li><a href="#" id="nazad">Nazad</a></li>
              </ul>
            </div>
           
          </div>
         
          <div>
      </div>
      `;
      domElements.container.insertAdjacentHTML("afterbegin", output);
    });
  }

  //event for container
  function ShowList(e) {
    if (e.target.dataset.id) {
      sessionStorage.setItem("recipeId", e.target.dataset.id);
    }
  }

  //add class to favorite's content
  function addClassFav(arr, id) {
    clasName = "";
    arr.indexOf(id) > -1 ? (clasName = "liked") : (clasName = "unliked");
    return clasName;
  }

  function updateFavorite(id) {
    model.updateFavoritePage(id, showRecipes);
  }

  //Go back btn
  function goBack(e) {
    if (e.target.id === "nazad") {
      //reload the page

      document.querySelector(".container-info").remove();
    } else {
      return false;
    }
  }

  return {
    cardInfo,
    updateFavorite,
    showRecipes,
    addClassFav,
  };
})(Model, View);
