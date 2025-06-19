function toggleMenu() {
  const nav = document.getElementById("main-nav");
  const button = document.getElementById("menuButton");

  nav.classList.toggle("active");

  if (nav.classList.contains("active")) {
    button.innerHTML = "მენიუ &#x21e7;";
  } else {
    button.innerHTML = "მენიუ &#8681;";

  }
}
