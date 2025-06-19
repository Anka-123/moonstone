function displayCart() {
  // ლოკალური მეხსიერებიდან წამოიღე კალათა ან ცარიელი მასივი
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  // კალათის კონტეინერის მოძებნა
  let cartDiv = document.getElementById("cartItems");

  // ჯამური თანხა
  let total = 0;

  // გასუფთავება ძველი HTML-ის
  cartDiv.innerHTML = "";

  // კალათის თითოეული ნივთის ჩვენება
  cart.forEach((item, index) => {
    const itemTotal = item.price * item.quantity;
    total += itemTotal;

    // თითოეული ნივთის HTML დამატება
    cartDiv.innerHTML += `
      <div class="item">
        <strong>${item.name}</strong> — ${item.price} ₾ × 
        <input type="number" min="1" value="${item.quantity}" onchange="updateQuantity(${index}, this.value)">
        = ${itemTotal.toFixed(2)} ₾
        <button onclick="removeItem(${index})">წაშლა</button>
      </div>
    `;
  });

  // საერთო თანხის ჩვენება
  document.getElementById("totalPrice").textContent = total.toFixed(2);
}

function updateQuantity(index, value) {
  // კალათის წამოღება
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  // მოცემულ ინდექსზე რაოდენობის განახლება
  cart[index].quantity = parseInt(value);

  // უკან შენახვა
  localStorage.setItem("cart", JSON.stringify(cart));

  // კალათის ხელახალი ჩვენება
  displayCart();
}

function removeItem(index) {
  // კალათის წამოღება
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  // ინდექსით ნივთის წაშლა
  cart.splice(index, 1);

  // შენახვა და განახლება
  localStorage.setItem("cart", JSON.stringify(cart));
  displayCart();
}

function handlePayment(event) {
  // გადახდისას კალათის გასუფთავება
  localStorage.removeItem("cart");

  // დაბრუნება true — ფორმა გაგრძელდეს
  return true;
}

// გვერდის ჩატვირთვისას კალათის ჩვენება
window.onload = displayCart;
