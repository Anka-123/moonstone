function addToCart(name, price, imgElement) {
  // წამოვიღოთ კალათი ლოკალიდან ან ცარიელი თუ არ არსებობს
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  // ვეძებთ პროდუქტს კალათაში სახელით
  const existingItem = cart.find(item => item.name === name);
  if (existingItem) {
    // თუ არის, რაოდენობას ვზრდით 1-ით
    existingItem.quantity += 1;
  } else {
    // თუ არა, ვამატებთ ახალ პროდუქტს რაოდენობით 1
    cart.push({ name, price, quantity: 1 });
  }

  // კალათის შენახვა ლოკალში სტრიქონად
  localStorage.setItem("cart", JSON.stringify(cart));

  const originalSrc = "img/shopping-cart-add_3916604.png";
  const addedSrc = "img/shopping-cart-check_3916609.png";

  // სურათის შეცვლა და კლასის დამატება ანიმაციისთვის
  imgElement.src = addedSrc;
  imgElement.classList.add("added");

  // 3 წამში ვუბრუნებთ პირვანდელ მდგომარეობას
  setTimeout(() => {
    imgElement.src = originalSrc;
    imgElement.classList.remove("added");
  }, 3000);

  // შეტყობინების ელემენტის პოვნა პროდუქტის ბლოკში
  const productDiv = imgElement.closest(".product");
  const messageBox = productDiv.querySelector(".cart-message");

  // შეტყობინების ტექსტის ჩაწერა და ჩვენება
  messageBox.innerHTML = `${name} დაემატა კალათაში <a href="cart.php">კალათის ნახვა</a>`;
  messageBox.style.display = "block";

  // 3 წამში შეტყობინების დამალვა
  setTimeout(() => {
    messageBox.style.display = "none";
  }, 3000);
}
