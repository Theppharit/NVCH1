/* ==========================================================
   news.js — เรนเดอร์การ์ดข่าวจาก data.js
   ใช้ได้ทั้งหน้าแรกและหน้าข่าว
     <div id="newsGrid" data-limit="3"></div>      จำกัดจำนวน (หน้าแรก)
     <div id="newsFilter"></div>                    แถบกรองหมวด (ถ้ามี)
   ========================================================== */
(function () {
  var grid = document.getElementById("newsGrid");
  if (!grid) return;

  var limit = parseInt(grid.dataset.limit || "0", 10);
  var icons = { "อัปเดต": "🛠️", "กิจกรรม": "🎁", "นักเตะ": "⭐", "ชุมชน": "💬" };
  var current = "ทั้งหมด";

  function fmt(d) {
    return new Date(d).toLocaleDateString("th-TH", { day: "numeric", month: "short", year: "numeric" });
  }

  function render() {
    var items = PL.news.filter(function (n) { return current === "ทั้งหมด" || n.cat === current; });
    if (limit) items = items.slice(0, limit);
    grid.innerHTML = items.map(function (n) {
      return '<article class="card news-card reveal">' +
        '<div class="news-thumb" style="background:linear-gradient(135deg,hsl(' + n.hue + ',70%,30%),hsl(' + (n.hue + 40) + ',70%,18%))">' +
        '<span class="badge">' + n.cat + "</span>" + (icons[n.cat] || "📰") + "</div>" +
        '<div class="news-body"><time>' + fmt(n.date) + "</time><h3>" + n.title + "</h3><p>" + n.excerpt + "</p></div></article>";
    }).join("");
    if (window.PLObserve) window.PLObserve();
  }

  var bar = document.getElementById("newsFilter");
  if (bar) {
    var cats = ["ทั้งหมด"].concat(PL.news.map(function (n) { return n.cat; }).filter(function (c, i, a) { return a.indexOf(c) === i; }));
    bar.innerHTML = cats.map(function (c, i) {
      return '<button class="chip' + (i === 0 ? " active" : "") + '" data-cat="' + c + '">' + c + "</button>";
    }).join("");
    bar.addEventListener("click", function (e) {
      var b = e.target.closest(".chip");
      if (!b) return;
      current = b.dataset.cat;
      bar.querySelectorAll(".chip").forEach(function (x) { x.classList.toggle("active", x === b); });
      render();
    });
  }

  render();
})();
