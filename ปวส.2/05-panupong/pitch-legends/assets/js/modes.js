/* ==========================================================
   modes.js — เรนเดอร์การ์ดโหมดเกมบนหน้าแรก (#modeGrid)
   ========================================================== */
(function () {
  var grid = document.getElementById("modeGrid");
  if (!grid) return;
  grid.innerHTML = PL.modes.map(function (m) {
    return '<div class="card mode-card reveal"><div class="icon">' + m.icon + "</div><h3>" + m.name + "</h3><p>" + m.desc + "</p></div>";
  }).join("");
  if (window.PLObserve) window.PLObserve();
})();
