<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
  <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">

  <title>saigon computer</title>
</head>

<body>
<header class="header" id="header">
  <nav class="nav container">
    <a href="#" class="nav__logo">SAIGON COMPUTER</a>

    <div class="nav__menu" id="nav-menu">
      <ul class="nav__list">
        <li><a href="#home" class="nav__link">หน้าหลัก</a></li>
        <li><a href="#about" class="nav__link">เกี่ยวกับเรา</a></li>
        <li><a href="#models" class="nav__link"> สินค้า</a></li>
        <li><a href="#info" class="nav__link">รายละเอียด</a></li>
        <li><a href="#contact" class="nav__link">ติดต่อเรา</a></li>
 <li style="position: relative;">
<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
  <!-- แอดมิน -->
  <a href="admin_reply.php" class="nav__link">
    ข้อความลูกค้า
  </a>
<?php else: ?>
  <!-- user -->
  <a href="reply.php?clear=1" class="nav__link">
    ข้อความ
    <?php if (!empty($_SESSION['unread_reply'])): ?>
      <span class="msg-badge"><?= $_SESSION['unread_reply'] ?></span>
    <?php endif; ?>
  </a>
<?php endif; ?>
</li>



        <?php if (isset($_SESSION['user_name'])): ?>
          <li>
            <a href="profile.php" class="nav__link">
              <?php echo htmlspecialchars($_SESSION['user_name']); ?>
            </a>
            
          </li>
          <li><a href="logout.php" class="nav__link">Logout</a></li>
        <?php else: ?>
          <li><a href="login.html" class="nav__link">Login</a></li>
        <?php endif; ?>
      </ul>

      <div class="nav__close" id="nav-close">
        <i class="ri-close-large-line"></i>
      </div>
    </div>

    <div class="nav__toggle" id="nav-toggle">
      <i class="ri-menu-line"></i>
    </div>
  </nav>
  <style>
/* กันชื่อขึ้น 2 บรรทัด เฉพาะหน้า index */
.nav__link {
  white-space: nowrap;
}

/* เพิ่มพื้นที่ให้เมนูขวาบน */
.nav__list li a {
  padding: 0.5rem 1.2rem;
}
</style>

<style>
.msg-badge {
  position: absolute;
  top: 2px;
  right: 4px;
  background: red;
  color: #fff;
  font-size: 12px;
  padding: 2px 6px;
  border-radius: 50%;
  line-height: 1;
}
</style>


</header>

<main class="main">
<section class="home grid section" id="home">
  <img src="assets/img/10.png" alt="image" class="home__bg">
  <div class="home__gradient"></div>

  <div class="home__data">
    <h3 class="home__subtitle">CHOOSE YOUR COMPUTER</h3>
    <h1 class="home__title">computer</h1>
  </div>

  <div class="home__swiper swiper">
    <div class="swiper-wrapper">
      <article class="home__article swiper-slide">
        <img src="assets/img/1.png" alt="image" class="home__img">
      </article>
      <article class="home__article swiper-slide">
        <img src="assets/img/2.png" alt="image" class="home__img">
      </article>
      <article class="home__article swiper-slide">
        <img src="assets/img/3.png" alt="image" class="home__img">
      </article>
      <article class="home__article swiper-slide">
        <img src="assets/img/4.png" alt="image" class="home__img">
      </article>
    </div>
  </div>

  <div class="swiper-pagination"></div>

  <a href="#about" class="home__button">
    <span>GET STARTED</span>
    <i class="ri-arrow-down-s-line"></i>
  </a>
</section>

<section class="about section" id="about">
  <div class="about__container container grid">
    <div class="about__data">
      <h2 class="section__title about__title">
        DESIGNED FOR <br>
        <span>MAXIMUM</span> <br>
        PERFORMANCE
      </h2>

      <p class="about__description">
      คอมพิวเตอร์ประสิทธิภาพสูง คือหัวใจหลักในทุกเครื่องที่เราประกอบ ตั้งแต่ระบบงานออฟฟิศ ไปจนถึงเครื่องสำหรับเกมเมอร์ระดับโปร และเวิร์กสเตชันสำหรับสายครีเอเตอร์
      </p>

      <a href="detail.html" class="button button__ghost">
        VIEW DETAILS <i class="ri-arrow-right-s-line"></i>
      </a>
    </div>

    <div class="about__video">
      <div class="">
  <img src="assets/img/saigon.png" alt="Saigon Computer Logo" class="about__file">
</div>
    </div>
  </div>
</section>

<section class="models section" id="models">
  <h2 class="section__title">
    BUILT FOR <br>
    EVERY USER
  </h2>

  <div class="models__container container grid">
    <article class="models__card">
      <img src="assets/img/6.png" alt="image" class="models__img">
      <div class="models__gradient"></div>
      <div class="models__data">
        <h3 class="models__name">Office PC</h3>
        <span class="models__info">Stable & Efficient</span>
      </div>
    </article>

    <article class="models__card">
      <img src="assets/img/7.png" alt="image" class="models__img">
      <div class="models__gradient"></div>
      <div class="models__data">
        <h3 class="models__name">Gaming PC</h3>
        <span class="models__info">High FPS Performance</span>
      </div>
    </article>

    <article class="models__card">
      <img src="assets/img/8.png" alt="image" class="models__img">
      <div class="models__gradient"></div>
      <div class="models__data">
        <h3 class="models__name">Creator PC</h3>
        <span class="models__info">Rendering Power</span>
      </div>
    </article>
  </div>
</section>

<section class="info section" id="info">
  <span class="section__subtitle">CHOOSE YOUR PC</span>
  <h2 class="section__title info__title">
    HIGH <br>
    PERFORMANCE PC
  </h2>

  <div class="info__container container grid">
    <div class="info__content">
      <h1 class="info__number">RTX 5090</h1>
      <img src="assets/img/9.png" alt="image" class="info__img">
    </div>

    <div class="info__data">
      <div class="info__group">
        <h3>CPU PERFORMANCE</h3>
        <p>Intel / AMD High Performance</p>
      </div>

      <div class="info__group">
        <h3>STORAGE</h3>
        <p>NVMe SSD</p>
      </div>

      <div class="info__group">
        <h3>BOOT TIME</h3>
        <p>~10 Seconds</p>
      </div>
    </div>
  </div>
</section>

<section class="contact section" id="contact">
  <div class="contact__container container grid">
    <div class="contact__content">
      <h2 class="section__title contact__title">
      แจ้งปัญหา
      </h2>

     <form id="contactForm" class="contact__form grid">
  <div class="contact__inputs grid">

    <div class="contact__box">
      <label class="contact__label">ชื่อ</label>
      <input type="text" name="name" required class="contact__input">
    </div>

    <div class="contact__box">
      <label class="contact__label">ข้อความ</label>
      <textarea name="message" required class="contact__input"></textarea>
    </div>

    <div class="contact__box">
      <label class="contact__label">อีเมล</label>
      <input type="email" name="email" required class="contact__input">
    </div>

  </div>

  <button class="button contact__button">
    ส่งข้อความ
  </button>
</form>

    </div>

    <img src="assets/img/saigon.png" alt="Saigon Computer Logo" class="">
  </div>
</section>
</main>

<footer class="footer">
  <div class="footer__container container grid">
    <a href="#" class="footer__logo">SAIGON COMPUTER</a>
  </div>

  <span class="footer__copy">
    &#169; All Rights Reserved | Saigon Computer
  </span>
</footer>

<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
document.getElementById("contactForm").addEventListener("submit", function(e) {
  e.preventDefault();

  alert("ส่งข้อมูลเรียบร้อย เดี๋ยวเราติดต่อกลับครับ 🙏");
});
</script>

<script>
document.getElementById("contactForm").addEventListener("submit", function(e){
  e.preventDefault();

  fetch("send_message.php", {
    method: "POST",
    body: new FormData(this)
  })
  .then(res => res.json())
  .then(data => {
    alert("ส่งข้อความเรียบร้อย 🙏");
    this.reset();
  })
  .catch(err => {
    alert("ส่งไม่สำเร็จ ลองใหม่อีกครั้ง");
  });
});
</script>

</body>
</html>
