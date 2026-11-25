/* ===== ตะกร้าสินค้า (เก็บใน localStorage) ===== */
const Cart = (() => {
  const KEY = "sakura-cart-v1";

  const read = () => {
    try { return JSON.parse(localStorage.getItem(KEY)) || []; }
    catch { return []; }
  };
  const write = (items) => {
    try { localStorage.setItem(KEY, JSON.stringify(items)); } catch {}
    document.dispatchEvent(new CustomEvent("cart:change"));
  };

  return {
    items: read,
    count: () => read().reduce((n, i) => n + i.qty, 0),
    subtotal: () => read().reduce((s, i) => {
      const p = MENU.find(m => m.id === i.id);
      return s + (p ? p.price * i.qty : 0);
    }, 0),
    add(id, qty = 1) {
      const items = read();
      const row = items.find(i => i.id === id);
      row ? (row.qty += qty) : items.push({ id, qty });
      write(items);
    },
    setQty(id, qty) {
      let items = read();
      items = qty <= 0 ? items.filter(i => i.id !== id)
                       : items.map(i => i.id === id ? { ...i, qty } : i);
      write(items);
    },
    remove(id) { write(read().filter(i => i.id !== id)); },
    clear() { write([]); }
  };
})();
