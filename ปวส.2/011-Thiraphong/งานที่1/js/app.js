/* Hangar Game Store - การทำงานของหน้าเว็บ */
const byId=id=>GAMES.find(g=>g.id===id);
const finalPrice=g=>Math.round(g.price*(1-g.discount/100));
const baht=n=>n===0?"เล่นฟรี":"฿"+n.toLocaleString("th-TH");
const thDate=d=>new Date(d+"T00:00:00").toLocaleDateString("th-TH",{day:"numeric",month:"short",year:"numeric"});

/* State with per-browser persistence */
const KEY="hangar-v1";
let saved={};
try{saved=JSON.parse(localStorage.getItem(KEY)||"{}")}catch(e){}
const S={
  cart:saved.cart||[], wish:saved.wish||[3,13], owned:saved.owned||[14,11],
  hero:0, tab:"new", genres:new Set(), maxPrice:1500, hideOwned:false, query:"", done:false
};
function persist(){try{localStorage.setItem(KEY,JSON.stringify({cart:S.cart,wish:S.wish,owned:S.owned}))}catch(e){}}

/* Capsule art: generated per game */
let capN=0;
function cap(g,showTitle=true){
  const [a,b]=g.colors, n=++capN, s=g.id*37;
  let art="";
  if(g.motif==="peaks"){
    art=`<polygon points="0,215 ${90+s%60},${70+s%30} 210,150 ${300+s%40},${50+s%25} 460,140 460,215" fill="${b}" opacity=".55"/>
         <polygon points="0,215 0,170 120,${110+s%20} 250,175 360,${120+s%30} 460,180 460,215" fill="${b}" opacity=".85"/>
         <circle cx="${330+s%80}" cy="${45+s%20}" r="18" fill="${b}"/>`;
  }else if(g.motif==="orbs"){
    art=`<circle cx="${340+s%60}" cy="${80+s%30}" r="70" fill="${b}" opacity=".9"/>
         <circle cx="${120+s%50}" cy="${60}" r="12" fill="${b}" opacity=".7"/>
         <circle cx="${220+s%40}" cy="${40+s%30}" r="5" fill="${b}"/>
         <circle cx="${340+s%60}" cy="${80+s%30}" r="104" fill="none" stroke="${b}" stroke-width="1.5" opacity=".5"/>`;
  }else if(g.motif==="bars"){
    art=Array.from({length:7},(_,i)=>`<rect x="${200+i*42}" y="-40" width="18" height="320" fill="${b}" opacity="${.25+i*.1}" transform="rotate(24 ${200+i*42} 100)"/>`).join("");
  }else if(g.motif==="grid"){
    let l="";for(let i=0;i<=10;i++){l+=`<line x1="${230}" y1="105" x2="${i*46}" y2="215" stroke="${b}" stroke-width="1.2" opacity=".6"/>`}
    for(let j=0;j<5;j++){const y=115+j*j*5+j*8;l+=`<line x1="0" y1="${y}" x2="460" y2="${y}" stroke="${b}" stroke-width="1.2" opacity=".5"/>`}
    art=`<rect x="0" y="105" width="460" height="110" fill="${b}" opacity=".08"/>${l}<circle cx="230" cy="95" r="${34+s%10}" fill="${b}" opacity=".9"/><rect x="0" y="100" width="460" height="6" fill="${a}"/>`;
  }else{
    art=[0,1,2].map(k=>`<path d="M0 ${120+k*28} Q 115 ${90+k*28+(s%20)} 230 ${120+k*28} T 460 ${120+k*28} V215 H0Z" fill="${b}" opacity="${.3+k*.25}"/>`).join("");
  }
  const t=showTitle?`<text x="22" y="194" font-family="Anuphan, sans-serif" font-weight="700" font-size="30" fill="#fff" opacity=".96">${g.title}</text>`:"";
  return `<span class="cap"><svg viewBox="0 0 460 215" preserveAspectRatio="xMidYMid slice" role="img" aria-label="${g.title}">
    <defs><linearGradient id="g${n}" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="${a}"/><stop offset="1" stop-color="${a}" stop-opacity=".82"/></linearGradient>
    <linearGradient id="s${n}" x1="0" y1="0" x2="0" y2="1"><stop offset=".55" stop-color="#000" stop-opacity="0"/><stop offset="1" stop-color="#000" stop-opacity=".45"/></linearGradient></defs>
    <rect width="460" height="215" fill="${a}"/><rect width="460" height="215" fill="url(#g${n})"/>${art}
    ${showTitle?`<rect width="460" height="215" fill="url(#s${n})"/>`:""}${t}</svg></span>`;
}
function reviewText(g){
  const r=g.rating;
  const label=r>=95?"ยอดเยี่ยมมาก":r>=85?"แง่บวกมาก":r>=70?"ส่วนใหญ่เป็นแง่บวก":"หลากหลาย";
  return `<span class="review">รีวิว: <b class="${r<70?"mixed":""}">${label}</b> · <span class="num">${r}%</span> จาก <span class="num">${g.reviews.toLocaleString("th-TH")}</span> รีวิว</span>`;
}
function priceBox(g){
  if(g.price===0) return `<span class="pricebox"><span class="now">เล่นฟรี</span></span>`;
  return g.discount?`<span class="pricebox"><span class="disc">-${g.discount}%</span><span><span class="was price">${baht(g.price)}</span><br><span class="now price">${baht(finalPrice(g))}</span></span></span>`
    :`<span class="pricebox"><span class="now price">${baht(g.price)}</span></span>`;
}
function buyButton(g,cls="primary"){
  if(S.owned.includes(g.id)) return `<button class="btn" data-play="${g.id}">อยู่ในคลังแล้ว</button>`;
  if(S.cart.includes(g.id)) return `<button class="btn" data-opencart>อยู่ในตะกร้า</button>`;
  return g.price===0?`<button class="btn ${cls}" data-free="${g.id}">รับฟรี</button>`:`<button class="btn ${cls}" data-cart="${g.id}">ใส่ตะกร้า</button>`;
}
const heart=on=>`<svg width="17" height="17" viewBox="0 0 18 18" fill="${on?"currentColor":"none"}" stroke="currentColor" stroke-width="1.7"><path d="M9 15.5s-6-3.6-6-8.2A3.3 3.3 0 0 1 9 5.4a3.3 3.3 0 0 1 6 1.9c0 4.6-6 8.2-6 8.2z"/></svg>`;
function wishBtn(g){const on=S.wish.includes(g.id);return `<button class="btn icon ${on?"on":""}" data-wish="${g.id}" aria-pressed="${on}" aria-label="${on?"นำออกจากรายการที่อยากได้":"เพิ่มในรายการที่อยากได้"}">${heart(on)}</button>`}

/* Views */
const main=document.getElementById("main");
function view(){const h=location.hash.slice(1);return ["wishlist","library"].includes(h)?h:"store"}
function render(){
  const v=view();
  document.querySelectorAll(".nav a").forEach(a=>{if(a.dataset.view===v)a.setAttribute("aria-current","page");else a.removeAttribute("aria-current")});
  document.getElementById("cartCount").textContent=S.cart.length;
  document.getElementById("wishCount").textContent=S.wish.length||"";
  document.getElementById("libCount").textContent=S.owned.length||"";
  if(v==="store") main.innerHTML=heroHTML()+specialsHTML()+browseHTML();
  if(v==="wishlist") main.innerHTML=wishlistHTML();
  if(v==="library") main.innerHTML=libraryHTML();
  if(!document.getElementById("drawer").hidden) renderCart();
}
function heroHTML(){
  const g=byId(FEATURED[S.hero]);
  return `<section aria-label="เกมแนะนำ">
    <div class="sec-head"><h2>แนะนำสำหรับคุณ</h2><p>คัดจากเกมที่ได้รีวิวดีในช่วงนี้</p></div>
    <div class="feat">
      <div class="feat-art">${cap(g,false)}<button class="open" data-open="${g.id}" aria-label="ดูรายละเอียด ${g.title}"></button></div>
      <div class="feat-info">
        <span class="eyebrow">${g.genres.join(" · ")}</span>
        <h1>${g.title}</h1>
        <p class="desc">${g.desc}</p>
        ${reviewText(g)}
        <div class="tags">${g.tags.map(t=>`<span class="tag">${t}</span>`).join("")}</div>
        <div class="buy">${priceBox(g)}<span style="flex:1"></span>${wishBtn(g)}${buyButton(g)}</div>
      </div>
    </div>
    <div class="feat-nav">
      <button class="btn icon arrow" data-hero="-1" aria-label="เกมก่อนหน้า">‹</button>
      <div class="thumbs">${FEATURED.map((id,i)=>`<button class="${i===S.hero?"on":""}" data-heroi="${i}" aria-label="${byId(id).title}">${cap(byId(id),false)}</button>`).join("")}</div>
      <button class="btn icon arrow" data-hero="1" aria-label="เกมถัดไป">›</button>
    </div>
  </section>`;
}
function specialsHTML(){
  const list=GAMES.filter(g=>g.discount>=30).sort((a,b)=>b.discount-a.discount);
  return `<section aria-label="ลดราคาพิเศษ">
    <div class="sec-head"><h2>ลดราคาพิเศษ</h2><p>ราคานี้ถึง 3 ธ.ค. 2569</p></div>
    <div class="shelf">${list.map(g=>`<div class="card" data-open="${g.id}" tabindex="0" role="button" aria-label="${g.title}">
      ${cap(g)}<span class="name">${g.title}</span>${priceBox(g)}</div>`).join("")}</div>
  </section>`;
}
function filtered(){
  let list=GAMES.slice();
  const q=S.query.trim().toLowerCase();
  if(q) list=list.filter(g=>(g.title+" "+g.dev+" "+g.genres.join(" ")+" "+g.tags.join(" ")).toLowerCase().includes(q));
  if(S.tab==="sale") list=list.filter(g=>g.discount>0);
  if(S.tab==="free") list=list.filter(g=>g.price===0);
  if(S.genres.size) list=list.filter(g=>g.genres.some(x=>S.genres.has(x)));
  list=list.filter(g=>finalPrice(g)<=S.maxPrice);
  if(S.hideOwned) list=list.filter(g=>!S.owned.includes(g.id));
  const sorts={new:(a,b)=>b.date.localeCompare(a.date),top:(a,b)=>b.reviews-a.reviews,sale:(a,b)=>b.discount-a.discount,free:(a,b)=>b.reviews-a.reviews};
  return list.sort(sorts[S.tab]);
}
function rowHTML(g,extra=""){
  return `<div class="row" data-open="${g.id}" tabindex="0" role="button" aria-label="${g.title}">
    ${cap(g,false)}
    <div class="info"><span class="title">${g.title}</span>
      <span class="meta">${g.dev} · ${thDate(g.date)}</span>
      ${reviewText(g)}
      <div class="tags">${g.genres.concat(g.tags.slice(0,2)).map(t=>`<span class="tag">${t}</span>`).join("")}</div>
    </div>
    <div class="side">${S.owned.includes(g.id)?`<span class="owned">อยู่ในคลัง</span>`:""}${priceBox(g)}${extra}</div>
  </div>`;
}
function browseHTML(){
  const list=filtered();
  const counts=Object.fromEntries(GENRES.map(x=>[x,GAMES.filter(g=>g.genres.includes(x)).length]));
  const tabs=[["new","มาใหม่"],["top","ขายดี"],["sale","กำลังลดราคา"],["free","เล่นฟรี"]];
  const active=S.genres.size||S.maxPrice<1500||S.hideOwned;
  return `<section id="browse" aria-label="เลือกดูเกม">
    <div class="sec-head"><h2>เลือกดูเกม</h2></div>
    <div class="browse">
      <details class="filters" id="filters" ${matchMedia("(min-width:901px)").matches?"open":""}>
        <summary>ตัวกรอง${active?` <span class="chip">ใช้งานอยู่</span>`:""}<span aria-hidden="true">▾</span></summary>
        <div class="fbody">
        <div class="fgroup"><h3>แนวเกม</h3>
          ${GENRES.map(x=>`<label class="check"><input type="checkbox" data-genre="${x}" ${S.genres.has(x)?"checked":""}>${x}<span class="num">${counts[x]}</span></label>`).join("")}
        </div>
        <div class="fgroup"><h3>ราคาไม่เกิน</h3>
          <input type="range" id="price" min="0" max="1500" step="50" value="${S.maxPrice}" aria-label="ราคาสูงสุด">
          <div class="range-out"><span>ฟรี</span><span class="num" id="priceOut">${S.maxPrice>=1500?"ทุกราคา":baht(S.maxPrice)}</span></div>
        </div>
        <div class="fgroup"><label class="check"><input type="checkbox" id="hideOwned" ${S.hideOwned?"checked":""}>ซ่อนเกมที่มีอยู่แล้ว</label></div>
        ${active?`<button class="link-btn" data-reset>ล้างตัวกรองทั้งหมด</button>`:""}
        </div>
      </details>
      <div style="min-width:0">
        <div class="tabs" role="tablist">${tabs.map(([k,l])=>`<button role="tab" aria-selected="${S.tab===k}" data-tab="${k}">${l}</button>`).join("")}</div>
        <div class="bar"><span><span class="num">${list.length}</span> เกม</span>
          ${S.query?`<button class="chip" data-clearq>ค้นหา “${S.query}” <span aria-hidden="true">✕</span><span class="sr" hidden>ล้างคำค้น</span></button>`:""}</div>
        <div class="list">${list.length?list.map(g=>rowHTML(g)).join(""):`<div class="empty-state"><h3>ไม่พบเกมที่ตรงกับตัวกรอง</h3>ลองเอาแนวเกมบางแนวออก หรือเพิ่มช่วงราคา<br><br><button class="btn" data-reset>ล้างตัวกรอง</button></div>`}</div>
      </div>
    </div>
  </section>`;
}
function wishlistHTML(){
  const list=S.wish.map(byId);
  const total=list.reduce((s,g)=>s+finalPrice(g),0);
  return `<section><div class="sec-head"><h2>รายการที่อยากได้</h2><p>${list.length?`<span class="num">${list.length}</span> เกม · รวม <span class="price">${baht(total)}</span>`:""}</p></div>
    <div class="list">${list.length?list.map(g=>rowHTML(g,`<span style="display:flex;gap:8px">${wishBtn(g)}${buyButton(g)}</span>`)).join("")
      :`<div class="empty-state"><h3>ยังไม่มีเกมในรายการ</h3>กดรูปหัวใจที่หน้าเกมเพื่อเก็บไว้ดูทีหลัง เราจะแสดงที่นี่เมื่อเกมลดราคา<br><br><a class="btn" href="#store">ไปที่ร้านค้า</a></div>`}</div></section>`;
}
function libraryHTML(){
  const list=S.owned.map(byId);
  return `<section><div class="sec-head"><h2>คลังเกม</h2><p><span class="num">${list.length}</span> เกมในบัญชีของคุณ</p></div>
    ${list.length?`<div class="lib">${list.map(g=>`<div class="card">${cap(g)}<div class="row2"><span class="name" style="padding:0">${g.title}</span><button class="btn primary" data-play="${g.id}">เล่น</button></div></div>`).join("")}</div>`
      :`<div class="empty-state"><h3>คลังเกมยังว่างอยู่</h3>เกมที่ซื้อหรือรับฟรีจะมาอยู่ที่นี่</div>`}</section>`;
}

/* Detail dialog */
const dlg=document.getElementById("dlg");
let dlgId=null;
function openGame(id){
  dlgId=id; const g=byId(id);
  dlg.innerHTML=`${cap(g,false).replace('class="cap"','class="cap" style="border-radius:0"')}
   <div class="dlg-body">
    <div class="dlg-head"><div><span class="eyebrow">${g.genres.join(" · ")}</span><h2 id="dlgTitle">${g.title}</h2></div>
      <button class="btn icon ghost" data-close aria-label="ปิด">✕</button></div>
    ${reviewText(g)}
    <p>${g.desc}</p>
    <div class="tags">${g.tags.map(t=>`<span class="tag">${t}</span>`).join("")}</div>
    <dl class="facts"><dt>ผู้พัฒนา</dt><dd>${g.dev}</dd><dt>วางจำหน่าย</dt><dd>${thDate(g.date)}</dd><dt>ระบบ</dt><dd>Windows · Steam Deck ใช้ได้</dd></dl>
    <div class="buybar"><span class="label">ซื้อ ${g.title}</span><span style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">${priceBox(g)}${wishBtn(g)}${buyButton(g)}</span></div>
   </div>`;
  if(!dlg.open) dlg.showModal();
}
dlg.addEventListener("click",e=>{if(e.target===dlg)dlg.close()});
dlg.addEventListener("close",()=>{dlgId=null});

/* Cart drawer */
const drawer=document.getElementById("drawer"),scrim=document.getElementById("scrim");
function openCart(){S.done=false;renderCart();drawer.hidden=false;scrim.hidden=false;if(dlg.open)dlg.close();drawer.querySelector("button")?.focus()}
function closeCart(){drawer.hidden=true;scrim.hidden=true;document.getElementById("cartBtn").focus()}
function renderCart(){
  if(S.done){
    drawer.innerHTML=`<header><h2>ตะกร้า</h2><button class="btn icon ghost" data-closecart aria-label="ปิดตะกร้า">✕</button></header>
     <div class="done"><svg width="44" height="44" viewBox="0 0 44 44"><circle cx="22" cy="22" r="21" fill="var(--sale-bg)"/><path d="M13 22.5l6 6 12-13" fill="none" stroke="var(--sale-fg)" stroke-width="3"/></svg>
     <h2 style="font-size:19px">สั่งซื้อเรียบร้อย</h2><p class="note" style="font-size:14px">เกมถูกเพิ่มเข้าคลังของคุณแล้ว</p>
     <a class="btn primary" href="#library" data-closecart>ไปที่คลังเกม</a></div>`;
    return;
  }
  const list=S.cart.map(byId);
  const full=list.reduce((s,g)=>s+g.price,0), pay=list.reduce((s,g)=>s+finalPrice(g),0);
  drawer.innerHTML=`<header><h2>ตะกร้า <span class="num" style="color:var(--muted);font-size:15px">(${list.length})</span></h2><button class="btn icon ghost" data-closecart aria-label="ปิดตะกร้า">✕</button></header>
   <div class="items">${list.length?list.map(g=>`<div class="citem">${cap(g,false)}<div style="min-width:0"><div class="t">${g.title}</div><button class="rm" data-rm="${g.id}">นำออก</button></div><div style="text-align:right">${g.discount?`<div class="was price">${baht(g.price)}</div>`:""}<div class="price">${baht(finalPrice(g))}</div></div></div>`).join("")
     :`<div class="empty-state" style="border:0"><h3>ตะกร้าว่าง</h3>เลือกเกมที่สนใจแล้วกด “ใส่ตะกร้า”</div>`}</div>
   ${list.length?`<footer>
     <div class="sum"><span>ราคาปกติ</span><span class="price">${baht(full)}</span></div>
     ${full-pay?`<div class="sum" style="color:var(--sale-fg)"><span>ส่วนลด</span><span class="price">−${baht(full-pay)}</span></div>`:""}
     <div class="sum total"><span>ยอดชำระ</span><span class="price">${baht(pay)}</span></div>
     <button class="btn primary" data-checkout style="width:100%;justify-content:center;height:44px">ชำระเงิน</button>
     <p class="note">ร้านตัวอย่าง: กดชำระเงินแล้วเกมจะเข้าคลังทันทีโดยไม่มีการตัดเงินจริง</p></footer>`:""}`;
}
scrim.addEventListener("click",closeCart);

/* Toast */
let tt;function toast(m){const t=document.getElementById("toast");t.textContent=m;t.hidden=false;clearTimeout(tt);tt=setTimeout(()=>t.hidden=true,2200)}

function refresh(){persist();render();if(dlgId)openGame(dlgId)}

/* Events */
document.addEventListener("click",e=>{
  const el=e.target.closest("[data-cart],[data-free],[data-wish],[data-rm],[data-checkout],[data-opencart],[data-closecart],[data-close],[data-play],[data-hero],[data-heroi],[data-tab],[data-reset],[data-clearq],[data-open]");
  if(!el) return;
  const d=el.dataset;
  if(d.cart){e.stopPropagation();const id=+d.cart;if(!S.cart.includes(id))S.cart.push(id);toast(`เพิ่ม ${byId(id).title} ลงตะกร้าแล้ว`);refresh();return}
  if(d.free){e.stopPropagation();const id=+d.free;S.owned.push(id);S.wish=S.wish.filter(x=>x!==id);toast(`เพิ่ม ${byId(id).title} เข้าคลังแล้ว`);refresh();return}
  if(d.wish){e.stopPropagation();const id=+d.wish;const on=S.wish.includes(id);S.wish=on?S.wish.filter(x=>x!==id):[...S.wish,id];toast(on?"นำออกจากรายการที่อยากได้แล้ว":"เพิ่มในรายการที่อยากได้แล้ว");refresh();return}
  if(d.rm){S.cart=S.cart.filter(x=>x!==+d.rm);refresh();return}
  if(d.checkout){S.owned.push(...S.cart.filter(x=>!S.owned.includes(x)));S.wish=S.wish.filter(x=>!S.cart.includes(x));S.cart=[];S.done=true;persist();render();renderCart();return}
  if("opencart" in d){e.stopPropagation();openCart();return}
  if("closecart" in d){closeCart();return}
  if("close" in d){dlg.close();return}
  if(d.play){e.stopPropagation();toast(`${byId(+d.play).title} อยู่ในคลังของคุณแล้ว`);return}
  if(d.hero){S.hero=(S.hero+ +d.hero+FEATURED.length)%FEATURED.length;render();return}
  if(d.heroi){S.hero=+d.heroi;render();return}
  if(d.tab){S.tab=d.tab;render();return}
  if("reset" in d){S.genres.clear();S.maxPrice=1500;S.hideOwned=false;render();return}
  if("clearq" in d){S.query="";q.value="";render();return}
  if(d.open){openGame(+d.open)}
});
document.addEventListener("keydown",e=>{
  if((e.key==="Enter"||e.key===" ")&&e.target.matches("[role=button][data-open]")){e.preventDefault();openGame(+e.target.dataset.open)}
  if(e.key==="Escape"&&!drawer.hidden)closeCart();
});
document.addEventListener("change",e=>{
  const t=e.target;
  if(t.dataset.genre){t.checked?S.genres.add(t.dataset.genre):S.genres.delete(t.dataset.genre);keepFilters()}
  if(t.id==="hideOwned"){S.hideOwned=t.checked;keepFilters()}
  if(t.id==="price"){S.maxPrice=+t.value;keepFilters()}
});
document.addEventListener("input",e=>{if(e.target.id==="price"){const v=+e.target.value;document.getElementById("priceOut").textContent=v>=1500?"ทุกราคา":baht(v)}});
function keepFilters(){const open=document.getElementById("filters")?.open;render();const f=document.getElementById("filters");if(f&&open)f.open=true}
document.getElementById("cartBtn").addEventListener("click",openCart);

/* Search with suggestions */
const q=document.getElementById("q"),sg=document.getElementById("suggest");
let sel=-1,hits=[];
function matches(s){s=s.trim().toLowerCase();return s?GAMES.filter(g=>(g.title+" "+g.dev+" "+g.genres.join(" ")+" "+g.tags.join(" ")).toLowerCase().includes(s)):[]}
function drawSuggest(){
  hits=matches(q.value).slice(0,5);
  if(!q.value.trim()){sg.hidden=true;return}
  sg.innerHTML=hits.length?hits.map((g,i)=>`<button data-sg="${g.id}" class="${i===sel?"on":""}">${cap(g,false)}<span class="t">${g.title}</span><span class="price" style="font-size:13px">${baht(finalPrice(g))}</span></button>`).join(""):`<div class="empty">ไม่พบเกมชื่อ “${q.value.replace(/</g,"&lt;")}”</div>`;
  sg.hidden=false;
}
q.addEventListener("input",()=>{sel=-1;drawSuggest()});
q.addEventListener("focus",drawSuggest);
q.addEventListener("keydown",e=>{
  if(e.key==="ArrowDown"){e.preventDefault();sel=Math.min(sel+1,hits.length-1);drawSuggest()}
  else if(e.key==="ArrowUp"){e.preventDefault();sel=Math.max(sel-1,-1);drawSuggest()}
  else if(e.key==="Escape"){sg.hidden=true}
  else if(e.key==="Enter"){
    e.preventDefault();sg.hidden=true;
    if(sel>=0&&hits[sel]){openGame(hits[sel].id);return}
    S.query=q.value.trim();S.tab="top";
    if(view()!=="store")location.hash="store";else render();
    requestAnimationFrame(()=>document.getElementById("browse")?.scrollIntoView({block:"start"}));
  }
});
sg.addEventListener("mousedown",e=>{const b=e.target.closest("[data-sg]");if(b){e.preventDefault();sg.hidden=true;openGame(+b.dataset.sg)}});
q.addEventListener("blur",()=>setTimeout(()=>sg.hidden=true,100));

window.addEventListener("hashchange",()=>{render();window.scrollTo(0,0)});
render();
