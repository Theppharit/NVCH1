const $ = (s, r = document) => r.querySelector(s);
const $$ = (s, r = document) => [...r.querySelectorAll(s)];
document.documentElement.classList.add('js');

// เมนูมือถือ
const menuBtn = $('.menu-btn'), nav = $('#nav');
menuBtn.addEventListener('click', () => {
  menuBtn.setAttribute('aria-expanded', nav.classList.toggle('open'));
});

// เมนูย่อย "ห้องเรียนครูวิท"
const sub = $('.has-sub'), subBtn = $('.sub-btn');
const closeSub = () => { sub.classList.remove('open'); subBtn.setAttribute('aria-expanded', 'false'); };
subBtn.addEventListener('click', e => {
  e.stopPropagation();
  subBtn.setAttribute('aria-expanded', sub.classList.toggle('open'));
});
document.addEventListener('click', closeSub);
document.addEventListener('keydown', e => e.key === 'Escape' && closeSub());

// คลิกส่วนของหน้าเว็บเพื่อดูคำอธิบาย
const parts = $$('.part');
parts.forEach(p => p.addEventListener('click', () => {
  parts.forEach(x => x.setAttribute('aria-pressed', x === p));
  $$('.info').forEach(i => i.classList.toggle('on', i.id === 'info-' + p.dataset.part));
}));
$('#info-header').classList.add('on');

// ไฮไลต์หัวข้อในสารบัญตามตำแหน่งที่เลื่อนอ่าน
const links = $$('.toc a');
const io = new IntersectionObserver(entries => entries.forEach(e => {
  if (e.isIntersecting) links.forEach(a => a.classList.toggle('on', a.hash === '#' + e.target.id));
}), { rootMargin: '-20% 0px -70% 0px' });
$$('main section, #anatomy').forEach(s => io.observe(s));
