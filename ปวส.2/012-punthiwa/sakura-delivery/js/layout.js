/* ===== Header / Footer ที่ใช้ซ้ำทุกหน้า (แก้ที่เดียว เปลี่ยนทั้งเว็บ) ===== */
(function () {
  const page = document.body.dataset.page;
  const links = [
    ["index.html", "หน้าแรก", "home"],
    ["menu.html", "เมนูอาหาร", "menu"],
    ["promotions.html", "โปรโมชั่น", "promotions"],
    ["about.html", "เกี่ยวกับเรา", "about"],
    ["contact.html", "ติดต่อ", "contact"]
  ];

  const header = document.getElementById("site-header");
  if (header) {
    header.outerHTML = `
    <div class="announce">ส่งฟรีเมื่อสั่งครบ ${baht(SHOP.freeDeliveryOver)} · เปิด ${SHOP.hours}</div>
    <header class="site-header">
      <div class="container header-inner">
        <a class="logo" href="index.html"><span class="logo-mark" aria-hidden="true"></span>${SHOP.name}</a>
        <nav class="main-nav" id="main-nav" aria-label="เมนูหลัก">
          ${links.map(([href, label, key]) =>
            `<a href="${href}" ${key === page ? 'aria-current="page"' : ""}>${label}</a>`).join("")}
        </nav>
        <a class="cart-btn" href="cart.html" aria-label="ตะกร้าสินค้า">
          🛒 <span class="cart-label">ตะกร้า</span><span class="cart-count" id="cart-count">0</span>
        </a>
        <button class="nav-toggle" id="nav-toggle" aria-label="เปิดเมนู" aria-expanded="false" aria-controls="main-nav">☰</button>
      </div>
    </header>`;
  }

  const footer = document.getElementById("site-footer");
  if (footer) {
    footer.outerHTML = `
    <footer class="site-footer">
      <div class="container">
        <div class="footer-grid">
          <div>
            <h4>${SHOP.name}</h4>
            <p>อาหารญี่ปุ่นทำสดใหม่ ส่งถึงบ้านคุณ</p>
          </div>
          <div>
            <h4>เมนู</h4>
            <ul>${CATEGORIES.slice(0, 5).map(c => `<li><a href="menu.html?cat=${c.id}">${c.name}</a></li>`).join("")}</ul>
          </div>
          <div>
            <h4>ลิงก์</h4>
            <ul>${links.map(([h, l]) => `<li><a href="${h}">${l}</a></li>`).join("")}</ul>
          </div>
          <div>
            <h4>ติดต่อ</h4>
            <ul>
              <li>โทร ${SHOP.phone}</li>
              <li>LINE ${SHOP.line}</li>
              <li>${SHOP.hours}</li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">© ${new Date().getFullYear()} ${SHOP.name}. เว็บไซต์ตัวอย่างสำหรับการออกแบบ</div>
      </div>
    </footer>`;
  }

  const updateCount = () => {
    const el = document.getElementById("cart-count");
    if (el) el.textContent = Cart.count();
  };
  updateCount();
  document.addEventListener("cart:change", updateCount);

  const toggle = document.getElementById("nav-toggle");
  const nav = document.getElementById("main-nav");
  if (toggle && nav) {
    toggle.addEventListener("click", () => {
      const open = nav.classList.toggle("open");
      toggle.setAttribute("aria-expanded", open);
    });
  }
})();
