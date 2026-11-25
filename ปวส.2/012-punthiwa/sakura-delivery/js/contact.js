/* ===== ฟอร์มติดต่อ (ตัวอย่าง: ยังไม่ส่งข้อมูลไปเซิร์ฟเวอร์) ===== */
document.getElementById("contact-form").addEventListener("submit", (e) => {
  e.preventDefault();
  const msg = document.getElementById("form-msg");
  msg.hidden = false;
  msg.textContent = "ขอบคุณที่ติดต่อ เราจะตอบกลับภายใน 1 วันทำการ";
  e.target.reset();
});
