/* ===== ข้อมูลเมนู (แก้ไขที่ไฟล์นี้ไฟล์เดียว) ===== */
const SHOP = {
  name: "ซากุระ เดลิเวอรี่",
  phone: "02-123-4567",
  line: "@sakuradelivery",
  email: "hello@sakura-delivery.example",
  hours: "ทุกวัน 10:00 – 21:30 น.",
  address: "123 ถนนตัวอย่าง ตำบลปากช่อง อำเภอปากช่อง จังหวัดนครราชสีมา 30130",
  deliveryFee: 30,
  freeDeliveryOver: 399
};

const CATEGORIES = [
  { id: "sushi",   name: "ซูชิ",        emoji: "🍣" },
  { id: "sashimi", name: "ซาชิมิ",      emoji: "🐟" },
  { id: "ramen",   name: "ราเมน",       emoji: "🍜" },
  { id: "don",     name: "ข้าวหน้า",     emoji: "🍚" },
  { id: "fried",   name: "ของทอด",      emoji: "🍤" },
  { id: "set",     name: "ชุดเซ็ต",      emoji: "🍱" },
  { id: "drink",   name: "เครื่องดื่ม",   emoji: "🍵" }
];

const MENU = [
  { id: 1,  cat: "sushi",   name: "ซูชิแซลมอน (2 คำ)",     price: 79,  emoji: "🍣", bg: "#fde8e4", desc: "แซลมอนสดวางบนข้าวซูชิ เสิร์ฟพร้อมวาซาบิ", tag: "ขายดี" },
  { id: 2,  cat: "sushi",   name: "ซูชิหน้าต่างๆ รวม 8 ชิ้น", price: 249, emoji: "🍣", bg: "#fdeede", desc: "ปลาแซลมอน ทูน่า กุ้ง และไข่หวาน" },
  { id: 3,  cat: "sushi",   name: "แคลิฟอร์เนียโรล",        price: 159, emoji: "🍙", bg: "#e8f2ec", desc: "ปูอัด อะโวคาโด แตงกวา โรยงาขาว" },
  { id: 4,  cat: "sashimi", name: "ซาชิมิแซลมอน 8 ชิ้น",    price: 229, emoji: "🐟", bg: "#fde8e4", desc: "แซลมอนนอร์เวย์หั่นหนา เสิร์ฟพร้อมโชยุ" },
  { id: 5,  cat: "sashimi", name: "ซาชิมิรวม 12 ชิ้น",       price: 389, emoji: "🐟", bg: "#e6eefa", desc: "แซลมอน ทูน่า และปลาหน้าเนื้อตามฤดูกาล", tag: "แนะนำ" },
  { id: 6,  cat: "ramen",   name: "ทงคตสึราเมน",           price: 169, emoji: "🍜", bg: "#fdeede", desc: "น้ำซุปกระดูกหมูเคี่ยว 12 ชั่วโมง หมูชาชู ไข่ต้ม" },
  { id: 7,  cat: "ramen",   name: "มิโสะราเมน",            price: 159, emoji: "🍜", bg: "#f6efe0", desc: "ซุปมิโสะเข้มข้น เส้นหนึบ ข้าวโพด และต้นหอม" },
  { id: 8,  cat: "ramen",   name: "โชยุราเมนไก่",          price: 149, emoji: "🍜", bg: "#e8f2ec", desc: "ซุปไก่ใส รสโชยุกลมกล่อม" },
  { id: 9,  cat: "don",     name: "ข้าวหน้าเนื้อ (กิวด้ง)",   price: 139, emoji: "🍚", bg: "#fdeede", desc: "เนื้อสไลซ์ผัดหอมใหญ่ซอสหวาน ไข่ออนเซ็น" },
  { id: 10, cat: "don",     name: "ข้าวหน้าไก่เทริยากิ",     price: 119, emoji: "🍗", bg: "#f6efe0", desc: "ไก่ย่างซอสเทริยากิ เสิร์ฟบนข้าวญี่ปุ่น", tag: "ขายดี" },
  { id: 11, cat: "don",     name: "คัตสึด้ง",               price: 129, emoji: "🍚", bg: "#e6eefa", desc: "หมูทอดกรอบราดไข่และซอสหวาน" },
  { id: 12, cat: "fried",   name: "กุ้งเทมปุระ 5 ตัว",       price: 149, emoji: "🍤", bg: "#fdeede", desc: "ทอดกรอบใหม่ๆ เสิร์ฟพร้อมซอสเท็นสึยุ" },
  { id: 13, cat: "fried",   name: "คาราอาเกะ (ไก่ทอด)",     price: 99,  emoji: "🍗", bg: "#f6efe0", desc: "ไก่ทอดหมักซีอิ๊วญี่ปุ่นและขิง" },
  { id: 14, cat: "fried",   name: "เกี๊ยวซ่าทอด 6 ชิ้น",     price: 89,  emoji: "🥟", bg: "#e8f2ec", desc: "ไส้หมูและกะหล่ำปลี กรอบนอกนุ่มใน" },
  { id: 15, cat: "set",     name: "เบนโตะแซลมอนเทริยากิ",   price: 259, emoji: "🍱", bg: "#fde8e4", desc: "แซลมอนย่าง ข้าว สลัด ไข่ม้วน และซุปมิโสะ", tag: "เซ็ต" },
  { id: 16, cat: "set",     name: "เซ็ตครอบครัว 4 ที่",      price: 799, emoji: "🍱", bg: "#fdeede", desc: "ซูชิรวม ข้าวหน้า 2 ที่ เทมปุระ และเกี๊ยวซ่า", tag: "คุ้มสุด" },
  { id: 17, cat: "drink",   name: "ชาเขียวเย็น",            price: 45,  emoji: "🍵", bg: "#e8f2ec", desc: "ชาเขียวญี่ปุ่นไม่ใส่น้ำตาล" },
  { id: 18, cat: "drink",   name: "รามูเนะ",                price: 55,  emoji: "🥤", bg: "#e6eefa", desc: "โซดารสดั้งเดิมแบบญี่ปุ่น" }
];

const PROMOS = [
  { emoji: "🚚", title: "ส่งฟรีเมื่อสั่งครบ 399 บาท", text: "ในระยะ 5 กม. จากร้าน ไม่ต้องใช้โค้ด", code: null },
  { emoji: "🍱", title: "ลด 10% ออเดอร์แรก",         text: "ใส่โค้ดตอนชำระเงิน ใช้ได้ครั้งเดียวต่อบัญชี", code: "WELCOME10" },
  { emoji: "🍜", title: "ราเมน 2 ชาม ลด 40 บาท",     text: "เฉพาะเมนูหมวดราเมน ทุกวันจันทร์–พฤหัสบดี", code: "RAMEN2" }
];
