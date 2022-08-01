const lan = document.querySelector("#lan-select");
let flag = document.querySelector(".flag-lan-img");
lan.addEventListener("change", (e) => {
  switch (e.target.value) {
    case "rus":
      flag.src =
        "http://localhost/wordpress/wp-content/uploads/2022/07/russianflag.png";
      break;
    case "eng":
      flag.src =
        "http://localhost/wordpress/wp-content/uploads/2022/07/englishflag.png";
      break;
    case "spa":
      flag.src =
        "http://localhost/wordpress/wp-content/uploads/2022/07/spanishflag.png";
      break;
    default:
      flag.src =
        "http://localhost/wordpress/wp-content/uploads/2022/07/russianflag.png";
  }
});
