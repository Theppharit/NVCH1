// เมนูมือถือ
const burger=document.querySelector('.burger'),nav=document.querySelector('.nav');
burger?.addEventListener('click',()=>{const o=nav.classList.toggle('open');burger.setAttribute('aria-expanded',o)});
// สไลด์ Hero
const slides=document.querySelectorAll('.slide'),dots=document.querySelector('.dots');
if(slides.length){let i=0,t;
 slides.forEach((_,n)=>{const b=document.createElement('button');b.ariaLabel='สไลด์ '+(n+1);b.onclick=()=>{go(n);}
  ;dots.append(b)});
 function go(n){i=n;slides.forEach((s,k)=>s.classList.toggle('on',k===n));[...dots.children].forEach((d,k)=>d.classList.toggle('on',k===n));clearInterval(t);
  if(!matchMedia('(prefers-reduced-motion:reduce)').matches)t=setInterval(()=>go((i+1)%slides.length),5000)}
 go(0)}
// ข่าวสาร (ข้อมูลจำลอง — ภายหลังเปลี่ยนเป็น fetch จาก API/JSON ได้)
const NEWS=[
 {d:'2569-01-15',t:'เปิดภาคเรียนใหม่ พร้อมเมนูสุขภาพ',s:'ศูนย์อาหารเพิ่มเมนูใหม่ลดหวาน มัน เค็ม สำหรับนักศึกษา'},
 {d:'2569-01-08',t:'ผ่านการตรวจมาตรฐานสุขาภิบาลอาหาร',s:'ผ่านเกณฑ์ Clean Food Good Taste ประจำปี'},
 {d:'2568-12-20',t:'กิจกรรมวันเด็ก แจกของรางวัลที่ศูนย์อาหาร',s:'ร่วมสนุกกับกิจกรรมและเกมตลอดทั้งวัน'}];
document.querySelectorAll('[data-news]').forEach(el=>{const n=+el.dataset.news||NEWS.length;
 el.innerHTML=NEWS.slice(0,n).map(x=>`<article class="card"><div class="ph">รูปข่าว</div><div class="b"><span class="promo-tag">${x.d}</span><h3>${x.t}</h3><p>${x.s}</p></div></article>`).join('')});
// ฟอร์มติดต่อ (สาธิต)
document.querySelectorAll('form[data-demo]').forEach(f=>f.addEventListener('submit',e=>{e.preventDefault();f.innerHTML='<p><b>ส่งข้อความเรียบร้อยแล้ว</b> เราจะติดต่อกลับโดยเร็ว</p>'}));
