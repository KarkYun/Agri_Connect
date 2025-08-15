const cartIcon = document.querySelector('#cart-icon');
const cart = document.querySelector('.cart');
const cartClose = document.querySelector('#cart-close');

cartIcon.addEventListener('click', () => {
    cart.classList.add('active');
});
cartClose.addEventListener('click', () => {
    cart.classList.remove('active');
});

const addCartButtons = document.querySelectorAll(".add-cart-btn");
addCartButtons.forEach(button => {
    button.addEventListener("click", event => {
        const productCard = event.target.closest(".product-card");
        addToCart(productCard);
    });
});

const cartContent = document.querySelector(".cart-content");
 const addToCart = productCard => {
    const productImgSrc = productCard.querySelector("img").src;
    const productTitle = productCard.querySelector(".product-title").textContent;
    const productPrice = productCard.querySelector(".price").textContent;

    const cartItems = cartContent.querySelectorAll(".cart-product-title");
    for (let item of cartItems){
        if (item.textContent === productTitle) {
            alert("This item is already in the cart.");
            return;
        }
    }

    const cartBox = document.createElement("div");
    cartBox.classList.add("cart-box");
    cartBox.innerHTML = `
    <img src="${productImgSrc}" alt="to">
    <div class="cart-detail">
        <h2 class="cart-product-title">${productTitle}</h2>
        <span class="cart-price">${productPrice}</span>
        <div class="cart-quantity">
          <button id="decrement">-</button>
          <span class="number">1</span>
          <button id="increment">+</button>
        </div> 
      </div>
      <i class="ri-delete-bin-line cart-remove"></i>
        `;

        cartContent.appendChild(cartBox);

        cartBox.querySelector(".cart-remove").addEventListener("click", () => {
          cartBox.remove();

          updateCartCount(-1);

          updateTotalPrice();
        });
        

        cartBox.querySelector(".cart-quantity").addEventListener("click", event => {
          const numberElement = cartBox.querySelector(".number");
          const decrementButton = cartBox.querySelector("#decrement");
          let quantity = numberElement.textContent;

          if(event.target.id === "decrement" && quantity > 1){
            quantity--;
            if (quantity === 1){
              decrementButton.style.color = "#999";
            }
             
          } else if (event.target.id === "increment"){
            quantity++;
            decrementButton.style.color = "#333";
          }
            numberElement.textContent = quantity;

            updateTotalPrice();
        });
         
        updateCartCount(1);
        
        updateTotalPrice();

     };
     


     const updateTotalPrice = () => {
      const totalPriceElement = document.querySelector(".total-price");
      const cartBoxes = cartContent.querySelectorAll(".cart-box");
      let total = 0;
      cartBoxes.forEach(cartBox => {
        const priceElement = cartBox.querySelector(".cart-price");
        const quantityElement = cartBox.querySelector(".number");
        const price = priceElement.textContent.replace("GHc", "");
        const quantity = quantityElement.textContent;
        total += price * quantity;
      });
      totalPriceElement.textContent = `GHc ${total}`;
     };

     let cartItemCount = 0;
     const updateCartCount = change => {
      const cartItemCountBadge = document.querySelector(".cart-item-count");
      cartItemCount += change;
      if (cartItemCount > 0){
        cartItemCountBadge.style.visibility = "visible";
        cartItemCountBadge.textContent = cartItemCount;
      } else{
        cartItemCountBadge.style.visibility = "hidden";
        cartItemCountBadge.textContent = "";
      }
      
     };

     const buyNowButton = document.querySelector(".btn-buy");
     buyNowButton.addEventListener("click", () => {
       const cartBoxes = cartContent.querySelectorAll(".cart-box");
       if (cartBoxes.length === 0){
         alert("Your cart is empty. Please add items to your cart before buying.");
         return;
       }

       cartBoxes.forEach(cartBox => cartBox.remove());
        cartItemCount = 0;
        updateCartCount(0);
        updateTotalPrice();

        alert("Thanks for your purchase!, Please Check Out");
       
       });
      