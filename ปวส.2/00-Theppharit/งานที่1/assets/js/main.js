// ===== ตั้งค่าข้อมูลหลักของเว็บ แก้ที่นี่ที่เดียว =====
const SITE = {
    name: 'โรงเรียน/มหาวิทยาลัยตัวอย่าง', en: 'Sample Institute',
    menu: [['index.html', 'หน้าแรก'], ['about.html', 'เกี่ยวกับเรา'], ['academics.html', 'หลักสูตร/คณะ'], ['admissions.html', 'รับสมัคร'], ['news.html', 'ข่าวสาร'], ['contact.html', 'ติดต่อเรา']]
};

const page = location.pathname.split('/').pop() || 'index.html';
document.getElementById('site-header').innerHTML = `
<div class="topbar"><div class="container"><span>📞 02-000-0000</span>
<span><a href="#">นักศึกษา</a><a href="#">บุคลากร</a><a href="#">TH | EN</a></span></div></div>
<header class="header"><div class="container">
<a class="logo" href="index.html">${SITE.name}<small>${SITE.en}</small></a>
<button class="menu-btn" aria-label="เมนู">☰</button>
<nav class="nav">${SITE.menu.map(([u, t]) => `<a href="${u}" class="${u === page ? 'active' : ''}">${t}</a>`).join('')}</nav>
</div></header>`;
document.getElementById('site-footer').innerHTML = `
<footer class="footer"><div class="container"><div class="cols">
<div><h4>${SITE.name}</h4><p>123 ถนนตัวอย่าง เขต/อำเภอ จังหวัด 10000<br>อีเมล: info@example.ac.th</p></div>
<div><h4>เมนู</h4>${SITE.menu.map(([u, t]) => `<a href="${u}">${t}</a>`).join('')}</div>
<div><h4>ติดตามเรา</h4><a href="#">Facebook</a><a href="#">YouTube</a><a href="#">Line OA</a></div>
</div><p class="copy">© ${new Date().getFullYear()} ${SITE.name}. สงวนลิขสิทธิ์</p></div></footer>`;

document.querySelector('.menu-btn').onclick = () => document.querySelector('.nav').classList.toggle('open');

// ===== สไลด์แบนเนอร์ (ทำงานเฉพาะหน้าที่มี .hero) =====
const slides = document.querySelectorAll('.slide');
if (slides.length) {
    const dots = document.querySelector('.dots'); let i = 0;
    slides.forEach((_, n) => { const b = document.createElement('button'); b.onclick = () => go(n); dots.appendChild(b) });
    function go(n) {
        i = n; slides.forEach((s, k) => s.classList.toggle('on', k === n));
        dots.querySelectorAll('button').forEach((b, k) => b.classList.toggle('on', k === n))
    }
    go(0); setInterval(() => go((i + 1) % slides.length), 5000);
}
