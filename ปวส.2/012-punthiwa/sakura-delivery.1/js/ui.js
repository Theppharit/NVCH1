/* ===== ตัวช่วย UI ที่ใช้ร่วมกันหลายหน้า ===== */
const baht = (n) => "฿" + n.toLocaleString("th-TH");

const esc = (s) => String(s).replace(/[&<>"']/g, c => ({ "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;" }[c]));

function productCard(p) {
  return `
  <article class="card">
    <div class="card-thumb" style="background:${p.bg}" aria-hidden="true">
      ${p.tag ? `<span class="card-tag">${esc(p.tag)}</span>` : ""}${p.emoji}
    </div>
    <div class="card-body">
      <h3>${esc(p.name)}</h3>
      <p class="card-desc">${esc(p.desc)}</p>
      <div class="card-foot">
        <span class="price">${baht(p.price)}</span>
        <button class="btn btn-sm" data-add="${p.id}">เพิ่มลงตะกร้า</button>
      </div>
    </div>
  </article>`;
}

/* กดปุ่ม "เพิ่มลงตะกร้า" ที่ใดก็ได้ในหน้า */
document.addEventListener("click", (e) => {
  const btn = e.target.closest("[data-add]");
  if (!btn) return;
  const id = Number(btn.dataset.add);
  Cart.add(id);
  toast(`เพิ่ม "${MENU.find(m => m.id === id).name}" ลงตะกร้าแล้ว`);
});

let toastTimer;
function toast(msg) {
  let el = document.querySelector(".toast");
  if (!el) {
    el = document.createElement("div");
    el.className = "toast";
    el.setAttribute("role", "status");
    document.body.appendChild(el);
  }
  el.textContent = msg;
  el.classList.add("show");
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => el.classList.remove("show"), 2200);
}
