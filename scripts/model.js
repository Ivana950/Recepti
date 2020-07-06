//Model Crl
const Model = (function () {
  async function searchRecipe(q) {
    return await axios.get(
      `https://forkify-api.herokuapp.com/api/search?q=${q}`
    );
  }

  // //Search by ID
  async function searchById(id) {
    const res = await axios.get(
      `https://forkify-api.herokuapp.com/api/get?rId=${id}`
    );
    return await res;
  }

  function updateFavoritePage(movieID, cb) {
    searchById(movieID).then((item) => {
      cb(item.data.recipe);
    });
  }

  return {
    searchRecipe,
    searchById,
    updateFavoritePage,
  };
})();
