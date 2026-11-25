// สร้างเนื้อหาหน้าเว็บจากข้อมูลใน data.js
(function () {
  const $ = (s, el = document) => el.querySelector(s);
  const baht = (n) => "฿" + n.toLocaleString("th-TH");
  const sold = (n) => (n >= 1000 ? (n / 1000).toFixed(1) + "K" : n);

  // ---------- แบนเนอร์หลัก ----------
  const track = $("#heroTrack"), dots = $("#heroDots");
  track.innerHTML = BANNERS.map((b) =>
    `<div class="slide" style="background-image:linear-gradient(110deg,${b.from},${b.to})"><h2>${b.title}</h2><p>${b.text}</p><a class="btn" href="#products">${b.cta}</a></div>`).join("");
  dots.innerHTML = BANNERS.map((_, i) => `<button aria-label="ไปสไลด์ที่ ${i + 1}"></button>`).join("");
  let cur = 0, timer;
  function go(i) {
    cur = (i + BANNERS.length) % BANNERS.length;
    track.style.transform = `translateX(-${cur * 100}%)`;
    [...dots.children].forEach((d, k) => d.setAttribute("aria-current", k === cur));
  }
  const auto = () => { clearInterval(timer); if (!matchMedia("(prefers-reduced-motion: reduce)").matches) timer = setInterval(() => go(cur + 1), 5000); };
  $(".hero-arrow.prev").onclick = () => { go(cur - 1); auto(); };
  $(".hero-arrow.next").onclick = () => { go(cur + 1); auto(); };
  dots.onclick = (e) => { const i = [...dots.children].indexOf(e.target); if (i > -1) { go(i); auto(); } };
  go(0); auto();

  // ---------- หมวดหมู่ ----------
  $("#cats").innerHTML = CATEGORIES.map((c) => `<a class="cat" href="#products" data-cat="${c.id}"><i>${c.icon}</i>${c.label}</a>`).join("");

  // ---------- ไลฟ์สด ----------
  $("#liveTrack").innerHTML = LIVES.map((l) =>
    `<a class="live-card" href="#"><div class="pic" style="background-image:linear-gradient(160deg,hsl(${l.hue} 75% 58%),hsl(${(l.hue + 40) % 360} 70% 40%))"><i class="tag">LIVE</i><i class="viewers">${l.viewers} คนกำลังดู</i>${l.icon}</div><div class="name">${l.title}</div></a>`).join("");

  // ---------- สินค้า ----------
  let activeCat = "all", query = "";
  const cart = new Set(), wish = new Set();
  const tabsWrap = $('[data-tabs="products"]');
  tabsWrap.setAttribute("role", "tablist");
  tabsWrap.innerHTML = CATEGORIES.map((c, i) => `<button role="tab" data-cat="${c.id}" aria-selected="${i === 0}">${c.label}</button>`).join("");

  function picStyle(p) {
    return p.image ? `background-image:url('${p.image}')`
      : `background-color:hsl(${p.hue} 60% 92%)`;
  }
  function renderProducts() {
    const list = PRODUCTS.filter((p) => (activeCat === "all" || p.cat === activeCat) && (!query || p.name.includes(query) || p.shop.toLowerCase().includes(query.toLowerCase())));
    $("#productGrid").innerHTML = list.map((p) => {
      const off = Math.round((1 - p.sale / p.price) * 100);
      return `<article class="product"><div class="pic" style="${picStyle(p)}"><i class="badge">-${off}%</i>
        <button class="wish" data-wish="${p.id}" aria-pressed="${wish.has(p.id)}" aria-label="บันทึกสินค้า">${wish.has(p.id) ? "♥" : "♡"}</button>${p.image ? "" : p.icon}</div>
        <div class="shop">${p.shop}</div><a class="name" href="#">${p.name}</a>
        <div class="price"><b>${baht(p.sale)}</b><s>${baht(p.price)}</s></div><div class="meta">ขายแล้ว ${sold(p.sold)} ชิ้น</div>
        <button class="add" data-add="${p.id}">ใส่ตะกร้า</button></article>`;
    }).join("");
    $("#empty").hidden = list.length > 0;
  }
  function setCat(id) {
    activeCat = id;
    tabsWrap.querySelectorAll("button").forEach((b) => b.setAttribute("aria-selected", b.dataset.cat === id));
    renderProducts();
  }
  tabsWrap.addEventListener("click", (e) => { const b = e.target.closest("button"); if (b) setCat(b.dataset.cat); });
  $("#cats").addEventListener("click", (e) => { const a = e.target.closest("[data-cat]"); if (a) setCat(a.dataset.cat); });

  let toastTimer;
  const toast = (msg) => { const t = $("#toast"); t.textContent = msg; t.classList.add("show"); clearTimeout(toastTimer); toastTimer = setTimeout(() => t.classList.remove("show"), 1800); };
  let count = 0;
  $("#productGrid").addEventListener("click", (e) => {
    const add = e.target.closest("[data-add]"), w = e.target.closest("[data-wish]");
    if (add) { count++; $("#cartCount").textContent = count; toast("เพิ่มลงตะกร้าแล้ว"); }
    if (w) { const id = +w.dataset.wish; wish.has(id) ? wish.delete(id) : wish.add(id); renderProducts(); }
  });
  $("#cartBtn").onclick = () => toast(count ? `ในตะกร้ามี ${count} ชิ้น` : "ตะกร้ายังว่างอยู่ เลือกสินค้าแล้วกด “ใส่ตะกร้า”");

  // ---------- ค้นหา ----------
  $("#searchForm").addEventListener("submit", (e) => { e.preventDefault(); $("#products").scrollIntoView(); });
  $("#searchInput").addEventListener("input", (e) => { query = e.target.value.trim(); renderProducts(); });

  // ---------- ปุ่มเลื่อนซ้าย/ขวา ----------
  document.querySelectorAll(".slider").forEach((s) => {
    const t = $(".track", s);
    s.addEventListener("click", (e) => {
      const b = e.target.closest(".arrow"); if (!b) return;
      t.scrollBy({ left: (b.classList.contains("next") ? 1 : -1) * t.clientWidth, behavior: "smooth" });
    });
  });

  renderProducts();
})();
