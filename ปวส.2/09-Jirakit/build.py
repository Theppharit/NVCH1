import os
NAV=[('index','หน้าแรก'),('about','เกี่ยวกับเรา'),('SV','ธุรกิจและบริการ'),('partners','คู่ค้าของเรา'),('news','ข่าวสารและกิจกรรม'),('job','ร่วมงานกับเรา'),('contact','ติดต่อเรา')]
SV=[('services/food-center','บริการศูนย์อาหาร'),('services/school-catering','แคทเทอริ่งอาหารในสถานศึกษา'),('services/catering','บริการจัดเลี้ยง')]
def page(path,title,body,hero=False):
    p='../' if '/' in path else ''
    nav=''
    for k,l in NAV:
        if k=='SV':
            nav+='<div class="dd"><a href="#" tabindex="0">%s ▾</a><div>%s</div></div>'%(l,''.join('<a href="%s%s.html">%s</a>'%(p,a,b) for a,b in SV))
        else: nav+='<a href="%s%s.html"%s>%s</a>'%(p,k,' class="on"' if k==path else '',l)
    ft=''.join('<a href="%s%s.html">%s</a><br>'%(p,k,l) for k,l in NAV if k!='SV')
    html=f'''<!DOCTYPE html><html lang="th"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>{title} | ศูนย์อาหารวิทยาลัย</title><link rel="preconnect" href="https://fonts.googleapis.com"><link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{p}assets/css/style.css"></head><body>
<header class="hd"><div class="wrap"><a class="logo" href="{p}index.html">College<span>Food</span></a><button class="burger" aria-label="เมนู" aria-expanded="false">☰</button><nav class="nav">{nav}</nav></div></header>
<main>{body}</main>
<footer class="ft"><div class="wrap"><div class="g3"><div><h4>ศูนย์อาหารวิทยาลัย</h4>ศูนย์อาหารสะอาด ปลอดภัย ได้มาตรฐาน เพื่อนักศึกษาและบุคลากรทุกคน</div><div><h4>เมนู</h4>{ft}</div><div><h4>ติดต่อ</h4>วิทยาลัย [ชื่อวิทยาลัย]<br>[ที่อยู่] กรุงเทพฯ 10xxx<br>โทร 02-xxx-xxxx<br>อีเมล food@college.ac.th<br>Line @collegefood</div></div><small>© 2569 ศูนย์อาหารวิทยาลัย สงวนลิขสิทธิ์</small></div></footer>
<script src="{p}assets/js/main.js"></script></body></html>'''
    os.makedirs(os.path.dirname(path) or '.',exist_ok=True); open(path+'.html','w',encoding='utf-8').write(html)
def hd(t,s=''): return f'<div class="page-hd"><div class="wrap"><h1>{t}</h1><p>{s}</p></div></div>'
def split(t,txt,items,rev=False): return f'<section><div class="wrap split{" rev" if rev else ""}"><div class="ph">รูปภาพ</div><div><h2>{t}</h2><p class="lead">{txt}</p><ul class="tick">{"".join("<li>%s</li>"%i for i in items)}</ul></div></div></section>'
slides=[('ศูนย์อาหารคุณภาพ','สะอาด ปลอดภัย ได้มาตรฐาน'),('เมนูหลากหลาย','ตอบโจทย์ทุกความต้องการของนักศึกษา'),('บริการด้วยใจ','พร้อมดูแลคุณทุกมื้อ')]
home=f'''<section class="hero"><div>{''.join(f'<div class="slide"><div class="wrap"><h1>{a}</h1><p>{b}</p><a class="btn" href="about.html">เกี่ยวกับเรา</a> <a class="btn alt" href="contact.html">ติดต่อเรา</a></div></div>' for a,b in slides)}</div><div class="dots"></div></section>
<section><div class="wrap"><h2>ศูนย์อาหารที่คุณมั่นใจ</h2><p class="lead">ศูนย์รวมความอร่อยภายในวิทยาลัย รองรับร้านค้าหลากหลายสไตล์ ดูแลโดยทีมงานมืออาชีพ</p>
<div class="g3 std">{''.join(f'<div><div class="ic">{i}</div><h3>{t}</h3><p>{d}</p></div>' for i,t,d in [('🧼','มาตรฐานความสะอาด','ครัวและพื้นที่บริการถูกสุขอนามัย'),('🥬','มาตรฐานคุณภาพ','วัตถุดิบปลอดภัย ตรวจสอบย้อนกลับได้'),('🤝','มาตรฐานการบริการ','พนักงานยูนิฟอร์มและขั้นตอนเป็นระบบ')])}</div></div></section>
<section class="alt-bg"><div class="wrap"><h2>บริการของเรา</h2><div class="g3">{''.join(f'<a class="card" href="{h}.html"><div class="ph">รูปบริการ</div><div class="b"><h3>{t}</h3><p>{d}</p></div></a>' for (h,t),d in zip(SV,['บริหารศูนย์อาหารครบวงจร หลากหลายเมนู','อาหารสำหรับนักเรียน บุคลากร และห้องอาหารพนักงาน','จัดเลี้ยงสัมมนา งานกีฬา งานเลี้ยงต่างๆ']))}</div></div></section>
<section><div class="wrap"><h2>โปรโมชั่นสำหรับคุณ</h2><div class="g3">{''.join(f'<div class="card"><div class="ph">โปรโมชั่น</div><div class="b"><span class="promo-tag">Food Court Promotion</span><p>{d}</p></div></div>' for d in ['ซื้อบัตรศูนย์อาหาร 300 บาท รับฟรีเครื่องดื่ม','รีฟิลเครื่องดื่มไม่อั้น เฉพาะสาขาที่ร่วมรายการ','แก้วเปลี่ยนสี พร้อมเครื่องดื่ม ราคาพิเศษ 49.-'])}</div></div></section>
<section class="alt-bg"><div class="wrap"><h2>ข่าวสารและกิจกรรม</h2><div class="g3" data-news="3"></div></div></section>
<section><div class="wrap"><h2>คู่ค้าของเรา</h2><p class="lead">ได้รับความไว้วางใจจากหน่วยงานและสถานที่ชั้นนำ</p><div class="partners">{''.join('<div>โลโก้ %d</div>'%i for i in range(1,13))}</div></div></section>'''
page('index','หน้าแรก',home)
page('about','เกี่ยวกับเรา',hd('เกี่ยวกับเรา','ประสบการณ์ดูแลศูนย์อาหารในสถานศึกษา')+split('เรื่องราวของเรา','ใส่ประวัติ วิสัยทัศน์ และพันธกิจของศูนย์อาหารที่นี่',['ความสะอาดเป็นอันดับแรก','วัตถุดิบปลอดภัย','ราคาเป็นมิตรกับนักศึกษา']))
page('services/food-center','บริการศูนย์อาหาร',hd('บริการศูนย์อาหาร','บริหารจัดการแบบครบวงจร')+split('บริหารศูนย์อาหารครบวงจร','ดูแลร้านค้า ความสะอาด และระบบบัตรชำระเงิน',['คัดเลือกร้านค้าหลากหลาย','ระบบบัตรศูนย์อาหาร','ทีมทำความสะอาดประจำ']))
page('services/school-catering','แคทเทอริ่งอาหารในสถานศึกษา',hd('แคทเทอริ่งอาหารในสถานศึกษา','อาหารสำหรับนักเรียน บุคลากร และพนักงาน')+split('อาหารในสถานศึกษา','จัดอาหารตามหลักโภชนาการ',['อาหารกลางวันนักเรียน','อาหารอาจารย์และบุคลากร','ห้องอาหารพนักงาน']))
page('services/catering','บริการจัดเลี้ยง',hd('บริการจัดเลี้ยง','ทุกงานสำคัญของวิทยาลัย')+split('จัดเลี้ยงทุกรูปแบบ','บูธอาหาร บุฟเฟ่ต์ อาหารกล่อง และของว่าง',['ประชุมสัมมนา','งานกีฬา','งานเลี้ยงรับรอง']))
page('partners','คู่ค้าของเรา',hd('คู่ค้าของเรา')+'<section><div class="wrap"><div class="partners">'+''.join('<div>โลโก้ %d</div>'%i for i in range(1,29))+'</div></div></section>')
page('news','ข่าวสารและกิจกรรม',hd('ข่าวสารและกิจกรรม')+'<section><div class="wrap"><div class="g3" data-news></div></div></section>')
page('job','ร่วมงานกับเรา',hd('ร่วมงานกับเรา','ตำแหน่งที่เปิดรับ')+'<section><div class="wrap g3">'+''.join(f'<div class="card"><div class="b"><h3>{t}</h3><p>{d}</p><a class="btn" href="contact.html">สมัครงาน</a></div></div>' for t,d in [('พนักงานประจำศูนย์อาหาร','เต็มเวลา'),('แม่ครัว / ผู้ช่วยครัว','เต็มเวลา'),('ผู้จัดการศูนย์อาหาร','ประสบการณ์ 3 ปีขึ้นไป')])+'</div></section>')
page('contact','ติดต่อเรา',hd('ติดต่อเรา')+'<section><div class="wrap split"><div><h2>ส่งข้อความถึงเรา</h2><form data-demo><input placeholder="ชื่อ-นามสกุล" required><input type="email" placeholder="อีเมล" required><textarea rows="5" placeholder="ข้อความ" required></textarea><button class="btn">ส่งข้อความ</button></form></div><div class="ph">แผนที่</div></div></section>')
