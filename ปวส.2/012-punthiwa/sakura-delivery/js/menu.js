/* ===== หน้าเมนู: กรองหมวด ค้นหา เรียงราคา ===== */
(function () {
  const params = new URLSearchParams(location.search);
  const state = { cat: params.get("cat") || "all", q: "", sort: "default" };

  const chips = document.getElementById("chips");
  const grid = document.getElementById("menu-grid");
  const search = document.getElementById("search");
  const sort = document.getElementById("sort");

  const renderChips = () => {
    const all = [{ id: "all", name: "ทั้งหมด" }, ...CATEGORIES];
    chips.innerHTML = all.map(c =>
      `<button class="chip" data-cat="${c.id}" aria-pressed="${state.cat === c.id}">${c.name}</button>`).join("");
  };

  const renderGrid = () => {
    let list = MENU.filter(p =>
      (state.cat === "all" || p.cat === state.cat) &&
      (p.name + p.desc).toLowerCase().includes(state.q.toLowerCase()));
    if (state.sort === "asc") list.sort((a, b) => a.price - b.price);
    if (state.sort === "desc") list.sort((a, b) => b.price - a.price);
    grid.innerHTML = list.length ? list.map(productCard).join("")
      : `<p class="empty">ไม่พบเมนูที่ค้นหา ลองเปลี่ยนคำค้นหรือเลือกหมวดอื่น</p>`;
  };

  chips.addEventListener("click", (e) => {
    const b = e.target.closest("[data-cat]");
    if (!b) return;
    state.cat = b.dataset.cat;
    renderChips(); renderGrid();
  });
  search.addEventListener("input", () => { state.q = search.value.trim(); renderGrid(); });
  sort.addEventListener("change", () => { state.sort = sort.value; renderGrid(); });

  renderChips(); renderGrid();
})();
