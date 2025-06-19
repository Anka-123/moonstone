function toggleUserMenu() {
  const dropdown = document.getElementById("userDropdown");
if (dropdown.style.display === "block") {
  dropdown.style.display = "none";
} else {
  dropdown.style.display = "block";
}
}

// გარედან დაჭერისას მენიუს დახურვა
document.addEventListener("click", function(event) {
  const menu = document.getElementById("userDropdown");
  const trigger = document.querySelector(".circle-user");

  if (!trigger.contains(event.target)) {
    menu.style.display = "none";
  }
});
