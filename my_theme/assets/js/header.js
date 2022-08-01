const categories = document.querySelectorAll(".mega-menu-item");
const arrows = document.querySelectorAll(".mega-indicator");
//Opening the first submenu.
let firstSubMenu = categories[0];
const arrowFirstSubMenu = firstSubMenu.childNodes[0].childNodes[1];
const childNode = firstSubMenu.childNodes[2];
childNode.style.display = "block";
arrowFirstSubMenu.style.transform = "rotate(90deg)";
arrowFirstSubMenu.style.marginTop = "-3px";
//Moving by default arrow to the left.
arrows.forEach((arrow) => {
  arrow.style.float = "left";
  arrow.style.fontSize = "30px";
  arrow.style.marginLeft = "-15px";
});
categories.forEach((category) => {
  category.addEventListener("click", (e) => {
    // Searching arrows by nodes of category.
    const childNodes = category.childNodes[2];
    const arrow = category.childNodes[0].childNodes[1];
    childNodes.style.display == "block"
      ? ((childNodes.style.display = "none"),
        (arrow.style.transform = "rotate(0deg)"))
      : ((childNodes.style.display = "block"),
        (childNodes.style.opacity = "1"),
        (arrow.style.transform = "rotate(90deg)"),
        (arrow.style.marginTop = "-3px"));
  });
});
