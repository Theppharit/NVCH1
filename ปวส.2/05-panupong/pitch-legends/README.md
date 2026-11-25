# Pitch Legends — เว็บไซต์เกมฟุตบอลออนไลน์ (Static)

เว็บต้นแบบ HTML + CSS + JavaScript ล้วน ไม่ต้องติดตั้งอะไร
**วิธีเปิด:** ดับเบิลคลิก `index.html` ได้เลย

> ชื่อแบรนด์ ทีม และนักเตะทั้งหมดเป็นข้อมูลสมมติ ไม่ใช่งานของ EA/Garena

## โครงสร้างไฟล์

```
pitch-legends/
├── index.html              หน้าแรก
├── pages/
│   ├── news.html           ข่าวสาร (กรองตามหมวดได้)
│   ├── features.html       โหมดเกม / ฟีเจอร์
│   ├── rankings.html       อันดับนักเตะ + สโมสร (สลับแท็บได้)
│   └── download.html       ดาวน์โหลด + สเปคเครื่อง
└── assets/
    ├── css/
    │   ├── base.css        สี ตัวแปร header/footer ปุ่ม (ทุกหน้า)
    │   ├── home.css        เฉพาะหน้าแรก (hero, การ์ดนักเตะ)
    │   └── pages.css       หน้าย่อย (ข่าว, อันดับ, ดาวน์โหลด)
    ├── js/
    │   ├── layout.js       สร้าง header/footer กลาง (แก้เมนูที่นี่)
    │   ├── data.js         ข้อมูลทั้งหมด (ข่าว, โหมด, อันดับ)
    │   ├── main.js         เอฟเฟกต์ reveal + ตัวเลขนับขึ้น
    │   ├── news.js         เรนเดอร์การ์ดข่าว
    │   ├── modes.js        เรนเดอร์การ์ดโหมดเกม
    │   └── rankings.js     เรนเดอร์ตารางอันดับ
    └── img/
        └── logo.svg
```

## แก้ไขอย่างไร

| ต้องการ | แก้ที่ |
|---|---|
| เปลี่ยนสี / ฟอนต์ | `assets/css/base.css` (ตัวแปร `:root`) |
| เพิ่ม/ลบเมนู | `assets/js/layout.js` (อาร์เรย์ `links`) |
| แก้ข่าว โหมด อันดับ | `assets/js/data.js` |
| เพิ่มหน้าใหม่ | คัดลอกหน้าใน `pages/` แล้วตั้ง `data-page` + เพิ่มลิงก์ใน `layout.js` |

ทุกหน้าต้องมี `<body data-root="" data-page="...">`
(`data-root` = `""` สำหรับ `index.html`, `"../"` สำหรับไฟล์ใน `pages/`)
