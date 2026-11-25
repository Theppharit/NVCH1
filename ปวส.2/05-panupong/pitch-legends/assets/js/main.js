/* ==========================================================
   main.js — เอฟเฟกต์ทั่วไป: reveal ตอนเลื่อน, ตัวเลขนับขึ้น
   ========================================================== */
(function () {
  // Reveal on scroll
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) { e.target.classList.add("in"); io.unobserve(e.target); }
    });
  }, { threshold: 0.12 });

  function observeAll() {
    document.querySelectorAll(".reveal:not(.in)").forEach(function (el) { io.observe(el); });
  }
  window.PLObserve = observeAll; // ให้สคริปต์อื่นเรียกหลังเรนเดอร์การ์ด
  observeAll();

  // Count-up numbers: <span data-count="5" data-suffix="M+">
  document.querySelectorAll("[data-count]").forEach(function (el) {
    var target = parseFloat(el.dataset.count);
    var suffix = el.dataset.suffix || "";
    var isFloat = String(target).indexOf(".") > -1;
    var start = null;
    function tick(ts) {
      if (!start) start = ts;
      var p = Math.min((ts - start) / 1400, 1);
      var v = target * (1 - Math.pow(1 - p, 3));
      el.textContent = (isFloat ? v.toFixed(1) : Math.round(v)) + suffix;
      if (p < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  });
})();
