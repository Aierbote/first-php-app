let products = [];

window.onload = () => {

  const getProducts = async (id) => {
    try {
      const response = await fetch(
        "https://mockend.up.railway.app/api/products"
      );
      const data = await response.json();
      products = data;
    } catch (error) {
      console.error("WARNING:", error);
    }
  };

  // const getImages = async (id) => {
  //   try {
  //     const response = await fetch(
  //       "https://mockend.up.railway.app/api/images"
  //     );
  //     const data = await response.json();
  //     return data;
  //   } catch (error) {
  //     console.error("WARNING:", error);
  //   }
  // };

  const grid = document.querySelector("main.gridStyle");
  const loading = grid.innerHTML = "Loading...";
  getProducts()
    .then(() => {
      grid.innerHTML = "";
      products.forEach((product) => {
        grid.innerHTML += `
        <div class="cardStyle">
          <figure>
            <img src="${product.thumbnail}" alt="${product.title}" />
          </figure>
          <h3>${product.title}</h3>
          <p>${product.description}</p>

        <div class="priceShelf">
          <p>
            <b>Price: ${product.price}€</b>
          </p>
          <p>
            <b>In stock: ${product.qty}</b>
          </p>
          <button>
            <a href="/products/${product.id}">Product details</a>
          </button>
          <button onclick="notImplemented()">Add To Cart</button>
        </div>
      `;
      });
    });
}