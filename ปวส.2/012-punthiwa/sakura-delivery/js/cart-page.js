/* ===== หน้าตะกร้า ===== */
(function () {
  const list = document.getElementById("cart-list");
  const summary = document.getElementById("summary");

  function render() {
    const items = Cart.items();
    if (!items.length) {
      list.innerHTML = `<div class="empty"><p>ตะกร้ายังว่างอยู่</p><a class="btn" href="menu.html">เลือกเมนู</a></div>`;
      summary.hidden = true;
      return;
    }
    summary.hidden = false;
    list.innerHTML = items.map(i => {
      const p = MENU.find(m => m.id === i.id);
      if (!p) return "";
      return `
      <div class="cart-row">
        <div class="cart-emoji" style="background:${p.bg}" aria-hidden="true">${p.emoji}</div>
        <div><h3>${esc(p.name)}</h3><small>${baht(p.price)} / ที่</small><br>
          <button class="link-btn" data-remove="${p.id}">ลบออก</button></div>
        <div class="qty">
          <button data-dec="${p.id}" aria-label="ลดจำนวน">−</button>
          <span>${i.qty}</span>
          <button data-inc="${p.id}" aria-label="เพิ่มจำนวน">+</button>
        </div>
        <strong>${baht(p.price * i.qty)}</strong>
      </div>`;
    }).join("");

    const sub = Cart.subtotal();
    const fee = sub >= SHOP.freeDeliveryOver ? 0 : SHOP.deliveryFee;
    const need = SHOP.freeDeliveryOver - sub;
    document.getElementById("sum-sub").textContent = baht(sub);
    document.getElementById("sum-fee").textContent = fee ? baht(fee) : "ฟรี";
    document.getElementById("sum-total").textContent = baht(sub + fee);
    document.getElementById("free-hint").textContent =
      need > 0 ? `สั่งเพิ่มอีก ${baht(need)} เพื่อรับส่งฟรี` : "คุณได้รับสิทธิ์ส่งฟรี";
  }

  list.addEventListener("click", (e) => {
    const t = e.target;
    const qty = (id) => Cart.items().find(i => i.id === id).qty;
    if (t.dataset.inc) Cart.setQty(+t.dataset.inc, qty(+t.dataset.inc) + 1);
    if (t.dataset.dec) Cart.setQty(+t.dataset.dec, qty(+t.dataset.dec) - 1);
    if (t.dataset.remove) Cart.remove(+t.dataset.remove);
  });

  document.getElementById("checkout").addEventListener("click", () => {
    Cart.clear();
    toast("ส่งคำสั่งซื้อแล้ว (ตัวอย่าง: ยังไม่ได้เชื่อมระบบชำระเงิน)");
  });

  document.addEventListener("cart:change", render);
  render();
})();
