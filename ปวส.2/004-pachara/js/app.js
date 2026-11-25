'use strict';

const ARCADIA_BASE = 'https://cdn.jsdelivr.net/gh/JeffreyHamilton6399/arcadia@main/games/';
const ARCADIA_REPO = 'https://github.com/JeffreyHamilton6399/arcadia';
const ICONS = {
  controller: 'https://rekhasvg.com/wp-content/uploads/free-icons/gaming/game-controller.png',
  joystick: 'https://rekhasvg.com/wp-content/uploads/free-icons/gaming/arcade-joystick.png',
  handheld: 'https://rekhasvg.com/wp-content/uploads/free-icons/gaming/handheld-console.png',
  headset: 'https://rekhasvg.com/wp-content/uploads/free-icons/gaming/gaming-headset.png',
  trophy: 'https://rekhasvg.com/wp-content/uploads/free-icons/gaming/trophy-cup.png',
  heart: 'https://rekhasvg.com/wp-content/uploads/free-icons/gaming/extra-life-heart.png'
};

const games = [
  {id:'snake-local',title:'Snake Classic',desc:'บังคับงูเก็บอาหารให้ยาวขึ้น อย่าชนกำแพงหรือตัวเอง',cat:'classic',catLabel:'คลาสสิก',kind:'local',icon:'joystick',emoji:'🐍',c1:'#244f44',c2:'#122d32',game:'snake',featured:1},
  {id:'2048-local',title:'2048 Puzzle',desc:'เลื่อนตัวเลขที่เหมือนกันให้รวมกันจนถึง 2048',cat:'puzzle',catLabel:'ปริศนา',kind:'local',icon:'handheld',emoji:'🔢',c1:'#84612e',c2:'#392d31',game:'2048',featured:2},
  {id:'memory-local',title:'Memory Match',desc:'เปิดไพ่ทีละคู่ จับคู่รูปภาพให้ครบทุกใบ',cat:'casual',catLabel:'เล่นเพลิน',kind:'local',icon:'trophy',emoji:'🧠',c1:'#543c79',c2:'#252b50',game:'memory',featured:3},
  {id:'ttt-local',title:'Tic Tac Toe',desc:'วาง X และ O ให้เรียงครบสามช่องก่อนคู่แข่ง',cat:'puzzle',catLabel:'ปริศนา',kind:'local',icon:'controller',emoji:'❌',c1:'#285d72',c2:'#1b2947',game:'ttt',featured:4},
  {id:'flappy-local',title:'Flappy Flyer',desc:'แตะเพื่อบินลอดช่องว่าง เก็บคะแนนให้ได้มากที่สุด',cat:'arcade',catLabel:'อาร์เคด',kind:'local',icon:'heart',emoji:'🐤',c1:'#377ca1',c2:'#1f385e',game:'flappy',featured:5},
  {id:'whack-local',title:'Whack-a-Mole',desc:'ตีตัวตุ่นที่โผล่ขึ้นมาให้ได้มากที่สุดใน 30 วินาที',cat:'arcade',catLabel:'อาร์เคด',kind:'local',icon:'joystick',emoji:'🔨',c1:'#7d542b',c2:'#392a28',game:'whack',featured:6},
  {id:'tetris',title:'Block Stack',desc:'เรียงบล็อกที่ตกลงมาให้เต็มแถวเพื่อทำคะแนน',cat:'classic',catLabel:'คลาสสิก',kind:'external',icon:'handheld',emoji:'🧱',src:'tetris',featured:7},
  {id:'pacman',title:'Maze Chomp',desc:'เก็บจุดในเขาวงกตและหลบเหล่าผีที่ไล่ตาม',cat:'classic',catLabel:'คลาสสิก',kind:'external',icon:'joystick',emoji:'👾',src:'pacman',featured:8},
  {id:'minesweeper',title:'Minesweeper',desc:'เปิดช่องอย่างระมัดระวังและปักธงตำแหน่งระเบิด',cat:'puzzle',catLabel:'ปริศนา',kind:'external',icon:'controller',emoji:'💣',src:'minesweeper',featured:9},
  {id:'breakout',title:'Breakout',desc:'เด้งลูกบอลทำลายอิฐให้หมดก่อนบอลตกพื้น',cat:'arcade',catLabel:'อาร์เคด',kind:'external',icon:'controller',emoji:'🧱',src:'breakout',featured:10},
  {id:'pong',title:'Pong',desc:'ขยับไม้รับลูกบอล แข่งกับคู่ต่อสู้ให้ถึงเจ็ดแต้ม',cat:'classic',catLabel:'คลาสสิก',kind:'external',icon:'headset',emoji:'🏓',src:'pong',featured:11},
  {id:'sudoku',title:'Sudoku',desc:'เติมตัวเลข 1–9 ให้ไม่ซ้ำในแถว คอลัมน์ และช่องย่อย',cat:'puzzle',catLabel:'ปริศนา',kind:'external',icon:'trophy',emoji:'🔢',src:'sudoku',featured:12},
  {id:'wordle',title:'Word Hunt',desc:'เดาคำศัพท์ห้าตัวอักษรภายในจำนวนครั้งที่กำหนด',cat:'puzzle',catLabel:'ปริศนา',kind:'external',icon:'headset',emoji:'🔤',src:'wordle',featured:13},
  {id:'connect4',title:'Connect Four',desc:'วางหมากให้เรียงครบสี่ตัวก่อนอีกฝ่าย',cat:'puzzle',catLabel:'ปริศนา',kind:'external',icon:'trophy',emoji:'🔴',src:'connect4',featured:14},
  {id:'doodlejump',title:'Doodle Jump',desc:'กระโดดขึ้นไปเรื่อย ๆ อย่าพลาดตกจากแท่น',cat:'arcade',catLabel:'อาร์เคด',kind:'external',icon:'heart',emoji:'🚀',src:'doodlejump',featured:15},
  {id:'geometrydash',title:'Geometry Dash',desc:'กระโดดข้ามสิ่งกีดขวางตามจังหวะดนตรี',cat:'action',catLabel:'แอ็กชัน',kind:'external',icon:'joystick',emoji:'⚡',src:'geometrydash',featured:16},
  {id:'slope',title:'Neon Slope',desc:'ควบคุมลูกบอลบนทางลาดนีออนที่เร็วขึ้นเรื่อย ๆ',cat:'action',catLabel:'แอ็กชัน',kind:'external',icon:'controller',emoji:'🔵',src:'slope',featured:17},
  {id:'polytrack',title:'PolyTrack',desc:'เกมขับรถแข่งมุมมองด้านบน ท้าทายเวลาในสนาม',cat:'racing',catLabel:'แข่งรถ',kind:'external',icon:'handheld',emoji:'🏎️',src:'polytrack',featured:18}
];

const grid = document.getElementById('gameGrid');
const searchInput = document.getElementById('searchInput');
const filterStatus = document.getElementById('filterStatus');
const emptyState = document.getElementById('emptyState');
const modal = document.getElementById('gameModal');
const gameStage = document.getElementById('gameStage');
const modalTitle = document.getElementById('modalTitle');
const modalKicker = document.getElementById('modalKicker');
const modalSource = document.getElementById('modalSource');
const gameHelp = document.getElementById('gameHelp');
let activeCategory = 'all';
let cleanupCurrentGame = null;
let currentGame = null;
let favorites = readFavorites();

function readFavorites(){
  try { return new Set(JSON.parse(localStorage.getItem('playnest:favorites') || '[]')); }
  catch { return new Set(); }
}
function saveFavorites(){
  try { localStorage.setItem('playnest:favorites', JSON.stringify([...favorites])); }
  catch { /* localStorage may be disabled; favorites still work for this session */ }
}
function safeText(s){return String(s).replace(/[&<>"']/g, ch => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[ch]));}

function visibleGames(){
  const q = searchInput.value.trim().toLocaleLowerCase('th');
  let list = games.filter(g => {
    const matchesCategory = activeCategory === 'all' || (activeCategory === 'favorites' ? favorites.has(g.id) : g.cat === activeCategory);
    const haystack = `${g.title} ${g.desc} ${g.catLabel} ${g.kind}`.toLocaleLowerCase('th');
    return matchesCategory && (!q || haystack.includes(q));
  });
  const sort = document.getElementById('sortSelect').value;
  if (sort === 'az') list.sort((a,b) => a.title.localeCompare(b.title));
  else if (sort === 'local') list.sort((a,b) => (a.kind === b.kind ? a.featured-b.featured : a.kind === 'local' ? -1 : 1));
  else if (sort === 'external') list.sort((a,b) => (a.kind === b.kind ? a.featured-b.featured : a.kind === 'external' ? -1 : 1));
  else list.sort((a,b) => a.featured-b.featured);
  return list;
}
function renderGames(){
  const list = visibleGames();
  grid.innerHTML = list.map(g => {
    const badge = g.kind === 'local' ? 'เล่นในเว็บนี้' : 'OPEN SOURCE';
    return `<article class="game-card" tabindex="0" role="button" data-game="${g.id}" aria-label="เล่น ${safeText(g.title)}">
      <div class="game-cover" style="--c1:${g.c1 || '#34465d'};--c2:${g.c2 || '#1c263b'}">
        <span class="cover-label">${badge}</span>
        <button class="favorite ${favorites.has(g.id) ? 'is-fav' : ''}" type="button" data-fav="${g.id}" aria-label="${favorites.has(g.id) ? 'นำออกจาก' : 'เพิ่มใน'}รายการโปรด">${favorites.has(g.id) ? '♥' : '♡'}</button>
        <img src="${ICONS[g.icon]}" alt="" loading="lazy" onerror="this.style.display='none';this.nextElementSibling.style.display='block'">
        <span class="cover-emoji" aria-hidden="true">${g.emoji}</span>
      </div>
      <div class="game-info">
        <div class="game-title-row"><span class="game-title">${safeText(g.title)}</span>${g.kind === 'external' ? '<span class="source-tag">MIT</span>' : ''}</div>
        <p class="game-desc">${safeText(g.desc)}</p>
        <div class="game-bottom"><span class="game-category">${g.catLabel}</span><span class="play-label">เล่นเลย ↗</span></div>
      </div>
    </article>`;
  }).join('');
  document.getElementById('gameCount').textContent = games.length;
  filterStatus.textContent = `แสดง ${list.length} จาก ${games.length} เกม${activeCategory !== 'all' ? ' · กรองตามหมวดหมู่' : ''}${searchInput.value.trim() ? ' · ผลการค้นหา' : ''}`;
  emptyState.hidden = list.length !== 0;
  grid.hidden = list.length === 0;
}

function setCategory(category){
  activeCategory = category;
  document.querySelectorAll('.quick-chip').forEach(btn => btn.classList.toggle('active', btn.dataset.category === category));
  renderGames();
}
document.querySelectorAll('.quick-chip').forEach(btn => btn.addEventListener('click', () => setCategory(btn.dataset.category)));
searchInput.addEventListener('input', renderGames);
document.getElementById('sortSelect').addEventListener('change', renderGames);
document.getElementById('searchForm').addEventListener('submit', e => {e.preventDefault(); document.getElementById('games').scrollIntoView({behavior:'smooth'});});
document.getElementById('clearFilters').addEventListener('click', () => {searchInput.value='';document.getElementById('sortSelect').value='featured';setCategory('all');});
document.addEventListener('keydown', e => {
  if (e.key === '/' && !['INPUT','TEXTAREA','SELECT'].includes(document.activeElement.tagName) && !modal.classList.contains('open')) { e.preventDefault(); searchInput.focus(); }
  if (e.key === 'Escape' && modal.classList.contains('open')) closeGame();
});

grid.addEventListener('click', e => {
  const fav = e.target.closest('[data-fav]');
  if (fav) {
    e.stopPropagation();
    const id = fav.dataset.fav;
    favorites.has(id) ? favorites.delete(id) : favorites.add(id);
    saveFavorites(); renderGames(); return;
  }
  const card = e.target.closest('[data-game]');
  if (card) openGame(games.find(g => g.id === card.dataset.game));
});
grid.addEventListener('keydown', e => {
  if ((e.key === 'Enter' || e.key === ' ') && e.target.matches('[data-game]')) { e.preventDefault(); openGame(games.find(g => g.id === e.target.dataset.game)); }
});

document.getElementById('closeModal').addEventListener('click', closeGame);
document.querySelector('.modal-backdrop').addEventListener('click', closeGame);
document.getElementById('fullscreenBtn').addEventListener('click', async () => {
  try { if (!document.fullscreenElement) await gameStage.requestFullscreen(); else await document.exitFullscreen(); }
  catch { gameHelp.textContent = 'เบราว์เซอร์นี้ไม่รองรับโหมดเต็มหน้าจอ'; }
});
function openGame(game){
  if (!game) return;
  closeGame(false);
  currentGame = game;
  modalTitle.textContent = game.title;
  modalKicker.textContent = game.kind === 'local' ? 'PLAYNEST MINI GAME' : 'OPEN SOURCE HTML5 GAME';
  modalSource.href = game.kind === 'external' ? ARCADIA_REPO : '#about';
  modalSource.textContent = game.kind === 'external' ? 'ดูโค้ด MIT ↗' : 'เกี่ยวกับเกม ↗';
  gameHelp.textContent = game.kind === 'external' ? 'เกมจาก Arcadia · ต้องเชื่อมต่ออินเทอร์เน็ตเพื่อโหลดเกม' : 'เกมนี้ทำงานในเว็บได้ทันที';
  modal.classList.add('open');
  modal.setAttribute('aria-hidden','false');
  document.body.style.overflow = 'hidden';
  if (game.kind === 'external') {
    const url = `${ARCADIA_BASE}${encodeURIComponent(game.src)}/index.html`;
    gameStage.innerHTML = `<iframe title="${safeText(game.title)}" src="${url}" allow="fullscreen; gamepad; autoplay" allowfullscreen loading="eager" sandbox="allow-scripts allow-same-origin allow-pointer-lock allow-forms allow-modals"></iframe><div class="external-fallback">เกมไม่แสดง? <a href="${url}" target="_blank" rel="noopener noreferrer">เปิดเกมในแท็บใหม่ ↗</a></div>`;
  } else {
    const stop = LOCAL_GAMES[game.game](gameStage);
    cleanupCurrentGame = typeof stop === 'function' ? stop : null;
  }
  document.getElementById('closeModal').focus();
}
function closeGame(resetModal=true){
  if (cleanupCurrentGame) { try { cleanupCurrentGame(); } catch(err) { console.warn('Game cleanup issue', err); } }
  cleanupCurrentGame = null;
  if (gameStage) gameStage.innerHTML = '';
  if (resetModal) {
    modal.classList.remove('open');
    modal.setAttribute('aria-hidden','true');
    document.body.style.overflow = '';
    currentGame = null;
  }
}

const LOCAL_GAMES = {
  snake(root){
    root.innerHTML = `<div class="mini-game"><div class="score" id="snakeScore">คะแนน 0</div><canvas class="mini-canvas" id="snakeCanvas" width="320" height="320"></canvas><div class="hint">ใช้ปุ่มลูกศร / WASD หรือปุ่มด้านล่าง เพื่อบังคับทิศทาง</div><div class="dpad"><span></span><button data-dir="0,-1">▲</button><span></span><button data-dir="-1,0">◀</button><button data-dir="0,1">▼</button><button data-dir="1,0">▶</button></div><button class="mini-btn" id="snakeRestart">เริ่มใหม่</button></div>`;
    const canvas=root.querySelector('canvas'), ctx=canvas.getContext('2d'), scoreEl=root.querySelector('#snakeScore');
    const N=16, Z=20; let snake,dir,next,food,score,dead,timer;
    function placeFood(){do{food=[Math.floor(Math.random()*N),Math.floor(Math.random()*N)];}while(snake.some(p=>p[0]===food[0]&&p[1]===food[1]));}
    function init(){snake=[[7,8],[6,8],[5,8]];dir=[1,0];next=[1,0];score=0;dead=false;scoreEl.textContent='คะแนน 0';placeFood();draw();clearInterval(timer);timer=setInterval(tick,115);}
    function draw(){ctx.fillStyle='#0d1624';ctx.fillRect(0,0,320,320);ctx.strokeStyle='#ffffff0b';for(let i=1;i<N;i++){ctx.beginPath();ctx.moveTo(i*Z,0);ctx.lineTo(i*Z,320);ctx.moveTo(0,i*Z);ctx.lineTo(320,i*Z);ctx.stroke();}ctx.fillStyle='#ff8e74';ctx.beginPath();ctx.arc(food[0]*Z+10,food[1]*Z+10,7,0,Math.PI*2);ctx.fill();snake.forEach((p,i)=>{ctx.fillStyle=i?'#81d58f':'#d0f679';ctx.fillRect(p[0]*Z+1,p[1]*Z+1,18,18);});if(dead){ctx.fillStyle='#000b';ctx.fillRect(0,0,320,320);ctx.fillStyle='#fff';ctx.font='bold 18px sans-serif';ctx.textAlign='center';ctx.fillText('จบเกม — กดเริ่มใหม่',160,164);}}
    function tick(){if(!dead){dir=next;const head=[snake[0][0]+dir[0],snake[0][1]+dir[1]];if(head[0]<0||head[1]<0||head[0]>=N||head[1]>=N||snake.some(p=>p[0]===head[0]&&p[1]===head[1]))dead=true;else{snake.unshift(head);if(head[0]===food[0]&&head[1]===food[1]){score++;scoreEl.textContent=`คะแนน ${score}`;placeFood();}else snake.pop();}}draw();}
    function turn(x,y){if(x!==-dir[0]||y!==-dir[1])next=[x,y];}
    const key=e=>{const m={ArrowUp:[0,-1],w:[0,-1],ArrowDown:[0,1],s:[0,1],ArrowLeft:[-1,0],a:[-1,0],ArrowRight:[1,0],d:[1,0]};if(m[e.key]){e.preventDefault();turn(...m[e.key]);}};
    root.addEventListener('click', e=>{const d=e.target.closest('[data-dir]');if(d)turn(...d.dataset.dir.split(',').map(Number));if(e.target.id==='snakeRestart')init();});document.addEventListener('keydown',key);init();return()=>{clearInterval(timer);document.removeEventListener('keydown',key);};
  },
  '2048'(root){
    root.innerHTML=`<div class="mini-game"><div class="score" id="s2048">คะแนน 0</div><div class="tile-board" id="board2048"></div><div class="hint">ใช้ปุ่มลูกศร หรือปัดบนกระดานเพื่อเลื่อนตัวเลข</div><button class="mini-btn" id="restart2048">เริ่มใหม่</button></div>`;
    const board=root.querySelector('#board2048'), scoreEl=root.querySelector('#s2048');let cells,score,x0=0,y0=0;
    function add(){const empty=[];cells.forEach((v,i)=>{if(!v)empty.push(i);});if(empty.length)cells[empty[Math.random()*empty.length|0]]=Math.random()<.9?2:4;}
    function init(){cells=Array(16).fill(0);score=0;add();add();draw();}
    function draw(){board.innerHTML=cells.map(v=>`<div data-v="${v}">${v||''}</div>`).join('');scoreEl.textContent=`คะแนน ${score}`;}
    function compact(a){a=a.filter(Boolean);for(let i=0;i<a.length-1;i++){if(a[i]===a[i+1]){a[i]*=2;score+=a[i];a.splice(i+1,1);}}while(a.length<4)a.push(0);return a;}
    function move(dx,dy){const old=cells.join(',');for(let k=0;k<4;k++){const idx=[0,1,2,3].map(j=>dx?(dx>0?k*4+3-j:k*4+j):(dy>0?(3-j)*4+k:j*4+k));const line=compact(idx.map(i=>cells[i]));idx.forEach((i,j)=>cells[i]=line[j]);}if(cells.join(',')!==old){add();draw();}}
    const key=e=>{const d={ArrowLeft:[-1,0],ArrowRight:[1,0],ArrowUp:[0,-1],ArrowDown:[0,1]}[e.key];if(d){e.preventDefault();move(...d);}};
    board.addEventListener('touchstart',e=>{x0=e.touches[0].clientX;y0=e.touches[0].clientY;},{passive:true});board.addEventListener('touchend',e=>{const dx=e.changedTouches[0].clientX-x0,dy=e.changedTouches[0].clientY-y0;if(Math.max(Math.abs(dx),Math.abs(dy))>22)Math.abs(dx)>Math.abs(dy)?move(Math.sign(dx),0):move(0,Math.sign(dy));},{passive:true});root.querySelector('#restart2048').addEventListener('click',init);document.addEventListener('keydown',key);init();return()=>document.removeEventListener('keydown',key);
  },
  memory(root){
    root.innerHTML=`<div class="mini-game"><div class="score" id="memoryScore">เปิดไป 0 ครั้ง</div><div class="mini-board memory" id="memoryBoard"></div><div class="hint">เปิดไพ่ครั้งละสองใบ แล้วจำตำแหน่งภาพที่เหมือนกัน</div><button class="mini-btn" id="memoryRestart">เริ่มใหม่</button></div>`;
    const board=root.querySelector('#memoryBoard'),scoreEl=root.querySelector('#memoryScore');let moves=0,matches=0,open=[],locked=false,timer;
    function init(){clearTimeout(timer);moves=0;matches=0;open=[];locked=false;const faces='🐶🐱🦊🐼🐸🐵🦁🐯'.split('');const deck=[...faces,...faces].sort(()=>Math.random()-.5);board.innerHTML='';deck.forEach((face,i)=>{const b=document.createElement('button');b.textContent='?';b.dataset.face=face;b.setAttribute('aria-label','ไพ่ใบที่ '+(i+1));b.addEventListener('click',()=>flip(b));board.appendChild(b);});scoreEl.textContent='เปิดไป 0 ครั้ง';}
    function flip(b){if(locked||b.classList.contains('revealed'))return;b.textContent=b.dataset.face;b.classList.add('revealed');open.push(b);if(open.length===2){moves++;scoreEl.textContent=`เปิดไป ${moves} ครั้ง`;locked=true;timer=setTimeout(()=>{if(open[0].dataset.face===open[1].dataset.face){matches++;}else open.forEach(x=>{x.textContent='?';x.classList.remove('revealed');});open=[];locked=false;if(matches===8)scoreEl.textContent=`ชนะแล้ว! ใช้ ${moves} ครั้ง`;},620);}}
    root.querySelector('#memoryRestart').addEventListener('click',init);init();return()=>clearTimeout(timer);
  },
  ttt(root){
    root.innerHTML=`<div class="mini-game"><div class="score" id="tttStatus">คุณคือ X · เริ่มก่อน</div><div class="mini-board ttt" id="tttBoard"></div><div class="hint">เล่นกับบอท · คุณใช้ X บอทใช้ O</div><button class="mini-btn" id="tttRestart">เริ่มใหม่</button></div>`;
    const board=root.querySelector('#tttBoard'),status=root.querySelector('#tttStatus');let cells,over;
    const wins=[[0,1,2],[3,4,5],[6,7,8],[0,3,6],[1,4,7],[2,5,8],[0,4,8],[2,4,6]];
    function result(b){for(const [a,c,d] of wins)if(b[a]&&b[a]===b[c]&&b[a]===b[d])return b[a];return b.every(Boolean)?'T':null;}
    function ai(){let best=-Infinity,bestMove=-1;cells.forEach((v,i)=>{if(!v){cells[i]='O';const score=minimax(cells,false);cells[i]='';if(score>best){best=score;bestMove=i;}}});if(bestMove>=0)cells[bestMove]='O';}
    function minimax(b,maximizing){const r=result(b);if(r==='O')return 1;if(r==='X')return -1;if(r==='T')return 0;let best=maximizing?-Infinity:Infinity;b.forEach((v,i)=>{if(!v){b[i]=maximizing?'O':'X';const s=minimax(b,!maximizing);b[i]='';best=maximizing?Math.max(best,s):Math.min(best,s);}});return best;}
    function click(i){if(over||cells[i])return;cells[i]='X';let r=result(cells);if(!r){ai();r=result(cells);}if(r){over=true;status.textContent=r==='T'?'เสมอกัน!':r==='X'?'คุณชนะ!':'บอทชนะ!';}else status.textContent='บอทคิดอยู่...';draw();}
    function draw(){board.innerHTML='';cells.forEach((v,i)=>{const b=document.createElement('button');b.textContent=v==='X'?'✕':v==='O'?'◯':'';b.addEventListener('click',()=>click(i));board.appendChild(b);});}
    function init(){cells=Array(9).fill('');over=false;status.textContent='คุณคือ X · เริ่มก่อน';draw();}
    root.querySelector('#tttRestart').addEventListener('click',init);init();
  },
  flappy(root){
    root.innerHTML=`<div class="mini-game"><div class="score" id="flappyScore">คะแนน 0</div><canvas class="mini-canvas" id="flappyCanvas" width="320" height="420"></canvas><div class="hint">แตะ / คลิก / กด Space เพื่อบินหลบเสา</div><button class="mini-btn" id="flappyRestart">เริ่มใหม่</button></div>`;
    const canvas=root.querySelector('canvas'),ctx=canvas.getContext('2d'),scoreEl=root.querySelector('#flappyScore');let y,vy,pipes,score,dead,frames,timer;
    function init(){y=190;vy=0;pipes=[];score=0;dead=false;frames=0;scoreEl.textContent='คะแนน 0';clearInterval(timer);timer=setInterval(tick,1000/60);draw();}
    function flap(){if(dead){init();return;}vy=-6.1;}
    function tick(){if(!dead){frames++;vy+=.34;y+=vy;if(frames%92===1)pipes.push({x:320,gap:90+Math.random()*160,passed:false});pipes.forEach(p=>p.x-=2.1);if(pipes[0]&&pipes[0].x<-50)pipes.shift();pipes.forEach(p=>{if(!p.passed&&p.x+42<80){p.passed=true;score++;scoreEl.textContent=`คะแนน ${score}`;}if(80+12>p.x&&80-12<p.x+42&&(y-12<p.gap||y+12>p.gap+115))dead=true;});if(y<0||y>405)dead=true;}draw();}
    function draw(){ctx.fillStyle='#58b8e5';ctx.fillRect(0,0,320,420);ctx.fillStyle='#9be46c';ctx.fillRect(0,370,320,50);ctx.fillStyle='#287f57';pipes.forEach(p=>{ctx.fillRect(p.x,0,42,p.gap);ctx.fillRect(p.x,p.gap+115,42,420);});ctx.fillStyle='#ffd967';ctx.beginPath();ctx.arc(80,y,12,0,Math.PI*2);ctx.fill();ctx.fillStyle='#28344c';ctx.beginPath();ctx.arc(84,y-3,2,0,Math.PI*2);ctx.fill();if(dead){ctx.fillStyle='#0009';ctx.fillRect(0,0,320,420);ctx.fillStyle='#fff';ctx.textAlign='center';ctx.font='bold 20px sans-serif';ctx.fillText('จบเกม',160,196);ctx.font='12px sans-serif';ctx.fillText('กดเริ่มใหม่เพื่อเล่นอีกครั้ง',160,220);}}
    const key=e=>{if(e.code==='Space'){e.preventDefault();flap();}};canvas.addEventListener('pointerdown',flap);root.querySelector('#flappyRestart').addEventListener('click',init);document.addEventListener('keydown',key);init();return()=>{clearInterval(timer);document.removeEventListener('keydown',key);};
  },
  whack(root){
    root.innerHTML=`<div class="mini-game"><div class="score" id="whackScore">เวลา 30 · คะแนน 0</div><div class="whack-grid" id="whackGrid"></div><div class="hint">แตะตัวตุ่นเมื่อโผล่ขึ้นมาให้ทันเวลา</div><button class="mini-btn" id="whackRestart">เริ่มใหม่</button></div>`;
    const grid=root.querySelector('#whackGrid'),scoreEl=root.querySelector('#whackScore');let score=0,time=30,current=-1,moveTimer,clockTimer;
    function init(){clearInterval(moveTimer);clearInterval(clockTimer);score=0;time=30;current=-1;grid.innerHTML='';for(let i=0;i<9;i++){const b=document.createElement('button');b.textContent='';b.addEventListener('click',()=>{if(i===current&&time>0){score++;current=-1;draw();update();}});grid.appendChild(b);}update();moveTimer=setInterval(()=>{current=Math.floor(Math.random()*9);draw();},650);clockTimer=setInterval(()=>{time--;update();if(time<=0){clearInterval(moveTimer);clearInterval(clockTimer);current=-1;draw();scoreEl.textContent=`หมดเวลา · คะแนน ${score}`;}},1000);}
    function draw(){[...grid.children].forEach((b,i)=>b.textContent=i===current?'🐹':'');}function update(){scoreEl.textContent=`เวลา ${time} · คะแนน ${score}`;}
    root.querySelector('#whackRestart').addEventListener('click',init);init();return()=>{clearInterval(moveTimer);clearInterval(clockTimer);};
  }
};

renderGames();
