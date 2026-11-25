/* ===== หน้าแรก ===== */
document.getElementById("home-categories").innerHTML = CATEGORIES.map(c =>
  `<a class="cat-tile" href="menu.html?cat=${c.id}"><span aria-hidden="true">${c.emoji}</span>${c.name}</a>`).join("");

document.getElementById("home-popular").innerHTML =
  MENU.filter(p => p.tag === "ขายดี" || p.tag === "แนะนำ" || p.tag === "คุ้มสุด").slice(0, 4).map(productCard).join("");
