/* ==========================================================
   layout.js — สร้าง header / footer กลางให้ทุกหน้า
   แก้เมนูหรือ footer ที่ไฟล์นี้ไฟล์เดียว ทุกหน้าจะเปลี่ยนตาม
   ทุกหน้าต้องมี <body data-root="" data-page="home">
     data-root : "" (หน้าแรก) หรือ "../" (หน้าในโฟลเดอร์ pages/)
     data-page : home | news | features | rankings | download
   ========================================================== */
(function () {
  var root = document.body.dataset.root || "";
  var page = document.body.dataset.page || "";

  var links = [
    ["home", "index.html", "หน้าแรก"],
    ["news", "pages/news.html", "ข่าวสาร"],
    ["features", "pages/features.html", "โหมดเกม"],
    ["rankings", "pages/rankings.html", "อันดับ"],
    ["download", "pages/download.html", "ดาวน์โหลด"]
  ];

  var navHtml = links.map(function (l) {
    var cls = l[0] === page ? ' class="active"' : "";
    return '<a href="' + root + l[1] + '"' + cls + ">" + l[2] + "</a>";
  }).join("");

  var header =
    '<header class="site-header"><div class="container header-inner">' +
    '<a class="brand" href="' + root + 'index.html">' +
    '<img src="' + root + 'assets/img/logo.svg" alt="" width="36" height="36">' +
    '<span>PITCH<b>LEGENDS</b></span></a>' +
    '<nav class="nav" id="nav">' + navHtml + "</nav>" +
    '<a class="btn btn-primary btn-sm" href="' + root + 'pages/download.html">เล่นฟรี</a>' +
    '<button class="nav-toggle" id="navToggle" aria-label="เมนู">☰</button>' +
    "</div></header>";

  var footer =
    '<footer class="site-footer"><div class="container">' +
    '<div class="footer-grid">' +
    "<div><div class='brand'><img src='" + root + "assets/img/logo.svg' alt='' width='36' height='36'><span>PITCH<b>LEGENDS</b></span></div>" +
    '<p class="footer-note">เว็บไซต์ต้นแบบ (static) สำหรับเกมฟุตบอลออนไลน์ ชื่อ ทีม และนักเตะทั้งหมดเป็นข้อมูลสมมติ</p></div>' +
    "<div><h4>เมนู</h4><ul>" +
    links.map(function (l) { return '<li><a href="' + root + l[1] + '">' + l[2] + "</a></li>"; }).join("") +
    "</ul></div>" +
    "<div><h4>ช่วยเหลือ</h4><ul><li>คำถามที่พบบ่อย</li><li>ติดต่อฝ่ายสนับสนุน</li><li>เงื่อนไขการใช้งาน</li><li>นโยบายความเป็นส่วนตัว</li></ul></div>" +
    "</div>" +
    '<div class="footer-bottom"><span>© 2026 Pitch Legends (Demo Project)</span><span>Made with HTML · CSS · JS</span></div>' +
    "</div></footer>";

  document.body.insertAdjacentHTML("afterbegin", header);
  document.body.insertAdjacentHTML("beforeend", footer);

  document.getElementById("navToggle").addEventListener("click", function () {
    document.getElementById("nav").classList.toggle("open");
  });
})();
