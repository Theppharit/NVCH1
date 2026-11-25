# ซากุระ เดลิเวอรี่ – เว็บไซต์ร้านอาหารญี่ปุ่น (HTML / CSS / JS)

เปิด `index.html` ในเบราว์เซอร์ได้ทันที ไม่ต้องติดตั้งอะไร

## โครงสร้างไฟล์
```
sakura-delivery/
├── index.html          หน้าแรก
├── menu.html           เมนูอาหาร (กรองหมวด/ค้นหา/เรียงราคา)
├── promotions.html     โปรโมชั่น
├── about.html          เกี่ยวกับเรา
├── contact.html        ติดต่อ
├── cart.html           ตะกร้าสินค้า
├── css/
│   ├── base.css        สี ฟอนต์ รีเซ็ต
│   ├── layout.css      container, header, footer, grid
│   ├── components.css  ปุ่ม การ์ด ฟอร์ม toast
│   └── pages.css       สไตล์เฉพาะแต่ละหน้า
├── js/
│   ├── data.js         ข้อมูลร้าน เมนู โปรโมชั่น (แก้ที่นี่)
│   ├── cart.js         ระบบตะกร้า (localStorage)
│   ├── ui.js           การ์ดสินค้า, toast, ตัวช่วย
│   ├── layout.js       header/footer ที่ใช้ร่วมกัน
│   └── home.js / menu.js / cart-page.js / contact.js   สคริปต์เฉพาะหน้า
└── assets/
    ├── images/         รูปอาหาร
    └── icons/          ไอคอน
```

## วิธีแก้ไขที่พบบ่อย
- เปลี่ยนชื่อร้าน เบอร์โทร ค่าส่ง: `js/data.js` (ตัวแปร `SHOP`)
- เพิ่ม/แก้เมนูและราคา: `js/data.js` (`MENU`)
- เปลี่ยนสีหลัก: `css/base.css` (ตัวแปรใน `:root`)
- เพิ่มลิงก์ในเมนูบน: `js/layout.js` (ตัวแปร `links`)
