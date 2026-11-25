/* ==========================================================
   rankings.js — ตารางอันดับนักเตะ / สโมสร
     <tbody id="rankBody" data-limit="5"></tbody>   (ใส่ limit ถ้าต้องการพรีวิว)
     <div id="rankTabs"></div>                       แท็บสลับ (ถ้ามี)
   ========================================================== */
(function () {
  var body = document.getElementById("rankBody");
  if (!body) return;

  var head = document.getElementById("rankHead");
  var limit = parseInt(body.dataset.limit || "0", 10);
  var tab = "players";

  function medal(i) {
    return "rank-no" + (i === 0 ? " top1" : i === 1 ? " top2" : i === 2 ? " top3" : "");
  }

  function render() {
    var rows;
    if (tab === "players") {
      head.innerHTML = "<tr><th>#</th><th>นักเตะ</th><th>สโมสร</th><th>ตำแหน่ง</th><th>OVR</th><th>แต้ม</th></tr>";
      rows = PL.players.map(function (p, i) {
        return '<tr><td class="' + medal(i) + '">' + (i + 1) + "</td><td>" + p.nat + " " + p.name + "</td><td>" + p.club +
          '</td><td><span class="pos-pill">' + p.pos + '</span></td><td><span class="ovr-pill">' + p.ovr + "</span></td><td>" + p.pts.toLocaleString() + "</td></tr>";
      });
    } else {
      head.innerHTML = "<tr><th>#</th><th>สโมสร</th><th>เมือง</th><th>ชนะ</th><th>เสมอ</th><th>แพ้</th><th>แต้ม</th></tr>";
      rows = PL.clubs.map(function (c, i) {
        return '<tr><td class="' + medal(i) + '">' + (i + 1) + "</td><td>" + c.name + "</td><td>" + c.city +
          "</td><td>" + c.w + "</td><td>" + c.d + "</td><td>" + c.l + '</td><td><span class="ovr-pill">' + c.pts + "</span></td></tr>";
      });
    }
    body.innerHTML = (limit ? rows.slice(0, limit) : rows).join("");
  }

  var tabs = document.getElementById("rankTabs");
  if (tabs) {
    tabs.innerHTML =
      '<button class="chip active" data-tab="players">นักเตะยอดเยี่ยม</button>' +
      '<button class="chip" data-tab="clubs">สโมสรยอดเยี่ยม</button>';
    tabs.addEventListener("click", function (e) {
      var b = e.target.closest(".chip");
      if (!b) return;
      tab = b.dataset.tab;
      tabs.querySelectorAll(".chip").forEach(function (x) { x.classList.toggle("active", x === b); });
      render();
    });
  }

  render();
})();
