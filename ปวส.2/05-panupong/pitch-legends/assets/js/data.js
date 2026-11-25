/* ==========================================================
   data.js — ข้อมูลจำลองของเว็บทั้งหมด (ข่าว, โหมดเกม, อันดับ)
   แก้เนื้อหาที่ไฟล์นี้ แล้วทุกหน้าจะอัปเดตเอง
   ทุกชื่อทีม/นักเตะเป็นข้อมูลสมมติ
   ========================================================== */
window.PL = {
  news: [
    { id: 1, cat: "อัปเดต", title: "แพตช์ 3.0: ระบบเลี้ยงบอลใหม่ และสนามธีมกลางคืน", date: "2026-11-20", hue: 150, excerpt: "ปรับสมดุลการเลี้ยงบอลและเพิ่มสนามใหม่ 4 แห่ง พร้อมแสงไฟแบบเรียลไทม์" },
    { id: 2, cat: "กิจกรรม", title: "Season Cup 2026: ชิงเงินรางวัลรวม 1,000,000 เหรียญ", date: "2026-11-18", hue: 45, excerpt: "เปิดรับสมัครทีมแล้ววันนี้ แข่งรอบคัดเลือกออนไลน์ตลอดสุดสัปดาห์" },
    { id: 3, cat: "นักเตะ", title: "เปิดตัวการ์ด Legend Edition ชุดใหม่ 12 ใบ", date: "2026-11-15", hue: 280, excerpt: "การ์ดพิเศษที่รวมสุดยอดตำนานสมมติ พร้อมสกิลเฉพาะตัว" },
    { id: 4, cat: "อัปเดต", title: "ปรับปรุงเซิร์ฟเวอร์: ปิง 30% ต่ำลงทั่วภูมิภาคเอเชีย", date: "2026-11-12", hue: 190, excerpt: "ย้ายโครงสร้างเครือข่ายใหม่ ลดอาการแล็กในช่วงเวลาพีก" },
    { id: 5, cat: "กิจกรรม", title: "Daily Login: รับแพ็กนักเตะฟรีทุกวันตลอดเดือน", date: "2026-11-10", hue: 20, excerpt: "ล็อกอินครบ 7 วัน รับการ์ดระดับทองการันตี" },
    { id: 6, cat: "ชุมชน", title: "สรุปผลแข่ง Community League รอบ 8 ทีมสุดท้าย", date: "2026-11-07", hue: 330, excerpt: "ชมไฮไลต์ประตูสวยและการเซฟสุดมันส์จากสนามประลอง" }
  ],

  modes: [
    { icon: "⚽", name: "Quick Match", desc: "จับคู่ผู้เล่นทั่วโลกได้ภายใน 10 วินาที แข่งสนุกแบบไม่ต้องรอ" },
    { icon: "🏆", name: "Ranked League", desc: "ไต่ดีวิชั่นจากบรอนซ์ถึงเลเจนด์ ลุ้นรางวัลจบซีซั่นสุดพิเศษ" },
    { icon: "🧠", name: "Manager Mode", desc: "บริหารสโมสร ซื้อขายนักเตะ วางแท็กติก และพัฒนาอะคาเดมี" },
    { icon: "🤝", name: "Co-op Squad", desc: "รวมทีมเพื่อน 3 ต่อ 3 ควบคุมผู้เล่นคนละตำแหน่งแบบเรียลไทม์" },
    { icon: "🎯", name: "Skill Challenge", desc: "ฝึกเลี้ยง ยิง จ่าย ผ่านด่านท้าทายรายวัน รับของรางวัลทุกวัน" },
    { icon: "🌐", name: "Tournament", desc: "สร้างหรือเข้าร่วมทัวร์นาเมนต์ออนไลน์ แบบสายน็อกเอาต์" }
  ],

  highlights: [
    { num: "5M+", label: "ผู้เล่นทั่วโลก" },
    { num: "300+", label: "การ์ดนักเตะ" },
    { num: "24", label: "สโมสรจำลอง" },
    { num: "99.9%", label: "เซิร์ฟเวอร์ออนไลน์" }
  ],

  players: [
    { name: "Rafael Montero", club: "Aurora United", pos: "ST", ovr: 98, nat: "🇪🇸", pts: 18420 },
    { name: "Kai Tanaka", club: "Sakura Dragons", pos: "CAM", ovr: 97, nat: "🇯🇵", pts: 17985 },
    { name: "Noah Whitfield", club: "Northbridge FC", pos: "CB", ovr: 96, nat: "🏴", pts: 17210 },
    { name: "Arthit Saengchai", club: "Bangkok Thunder", pos: "RW", ovr: 95, nat: "🇹🇭", pts: 16840 },
    { name: "Mateo Ferreira", club: "Porto Azul", pos: "CM", ovr: 95, nat: "🇧🇷", pts: 16502 },
    { name: "Liam Okafor", club: "Lagos Lions", pos: "LW", ovr: 94, nat: "🇳🇬", pts: 15977 },
    { name: "Elias Brandt", club: "Rhein Athletic", pos: "GK", ovr: 94, nat: "🇩🇪", pts: 15430 },
    { name: "Jin-woo Park", club: "Seoul Phoenix", pos: "CDM", ovr: 93, nat: "🇰🇷", pts: 14966 }
  ],

  clubs: [
    { name: "Aurora United", city: "มาดริด", w: 28, d: 5, l: 3, pts: 89 },
    { name: "Sakura Dragons", city: "โตเกียว", w: 26, d: 6, l: 4, pts: 84 },
    { name: "Bangkok Thunder", city: "กรุงเทพฯ", w: 25, d: 6, l: 5, pts: 81 },
    { name: "Northbridge FC", city: "แมนเชสเตอร์", w: 24, d: 7, l: 5, pts: 79 },
    { name: "Porto Azul", city: "ปอร์โต", w: 22, d: 9, l: 5, pts: 75 },
    { name: "Seoul Phoenix", city: "โซล", w: 21, d: 8, l: 7, pts: 71 },
    { name: "Rhein Athletic", city: "โคโลญ", w: 20, d: 8, l: 8, pts: 68 },
    { name: "Lagos Lions", city: "ลากอส", w: 18, d: 10, l: 8, pts: 64 }
  ]
};
