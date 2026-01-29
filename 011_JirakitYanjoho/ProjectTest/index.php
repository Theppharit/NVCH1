<?php
session_start();
?>

<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== FAVICON ===============-->
      <link rel="shortcut icon" href="assets/img/book-2-line.png" type="image/x-icon">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">

      <!--=============== SWIPER CSS ===============-->
      <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/styles.css">

      <title>NaKi.com</title>
   </head>
   <body>
      <!--==================== HEADER ====================-->
      <header class="header" id="header">
         <nav class="nav container">
              <a href="#" class="nav__logo">NaKi</a>

              <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
                  <li>
                     <a href="#home" class="nav__link">Home </a>
                  </li>

                  <li>
                     <a href="#about" class="nav__link">About</a>
                  </li>

                  <li>
                     <a href="#models" class="nav__link">Models</a>
                  </li>

                  <li>
                     <a href="#info" class="nav__link">Information</a>
                  </li>

                  <li>
                     <a href="#contact" class="nav__link">Contact</a>
                  </li>
                  
               <li>
  <?php if (isset($_SESSION['user_name'])): ?>
    <!-- ชื่อผู้ใช้ -->
    <a href="profile.php" class="nav__link">
      <?php echo htmlspecialchars($_SESSION['user_name']); ?>
    </a>
  </li>

  <li>
    <!-- Logout แยก -->
    <a href="logout.php" class="nav__link">Logout</a>
  </li>
  <?php else: ?>
    <li>
      <a href="login.html" class="nav__link">Login</a>
    </li>
  <?php endif; ?>



               </ul>

               <!-- Close button -->
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-large-line"></i>
                </div>
              </div>

              <!-- Toggle button -->
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line"></i>
               </div>
         </nav>
      </header>

      <!--==================== MAIN ====================-->
      <main class="main">
         <!--==================== HOME ====================-->
         <section class="home grid section" id="home">
            <img src="assets/img/dxd.jpg" alt="image" class="home__bg">
            <div class="home__gradient"></div>

            <div class="home__data">
               <h3 class="home__subtitle">THE MANGA BY NaKi</h3>
               <h1 class="home__title">NaKi</h1>
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
               <span>START</span>
               <i class="ri-arrow-down-s-line"></i>
            </a>
         </section>

         <!--==================== ABOUT ====================-->
         <section class="about section" id="about">
            <div class="about__container container grid">
               <div class="about__data">
                  <h2 class="section__title about__title">
                     คุณสามารถซื้อMangaนี้ได้! <br>
                     <span>ลิขสิทธิ์แท้จาก NaKi</span> <br>
                     สั่งซื้อเลย!
                  </h2>

                  <p class="about__description">
                     <h3>มังงะเรื่องนี้ดีแนะนำเลยครับสำหรับผู้เริ่มต้นที่จะเข้าวงการAnimeหรือManga</h3>
                  </p>

                  <a href="#" class="button button__ghost">
                     DETAILS <i class="ri-arrow-right-s-line"></i>
                  </a>
               </div>

               <div class="about__video">
                   <video src="assets/img/wifiKUN.mp4" autoplay loop muted class="about__file"></video>
               </div>
            </div>
         </section>

         <!--==================== MODELS ====================-->
         <section class="models section" id="models">
            <h2 class="section__title">
               มังงะที่ขายดีช่วงนี้ <br> 
               สั่งซื้อเลย
            </h2>

            <div class="models__container container grid">
               <article class="models__card">
                  <img src="assets/img/05.png" alt="image" class="models__img">
                  <div class="models__gradient"></div>

                  <div class="models__data">
                     <h3 class="models__name">Light Novel Volume 5</h3>
                     <span class="models__info">148฿</span>
                  </div>
               </article>

               <article class="models__card">
                  <img src="assets/img/06.png" alt="image" class="models__img">
                  <div class="models__gradient"></div>

                  <div class="models__data">
                     <h3 class="models__name">Light Novel Volume 6</h3>
                     <span class="models__info">148฿</span>
                  </div>
               </article>

               <article class="models__card">
                  <img src="assets/img/07.png" alt="image" class="models__img">
                  <div class="models__gradient"></div>

                  <div class="models__data">
                     <h3 class="models__name">Light Novel Volume 7</h3>
                     <span class="models__info">148฿</span>
                  </div>
               </article>
            </div>
         </section>

         <!--==================== INFORMATION ====================-->
         <section class="info section" id="info">
            <span class="section__subtitle">MANGA</span>
            <h2 class="section__title info__title">
               High School DxD
            </h2>

            <div class="info__container container grid">
               <div class="info__content">
                   <img src="assets/img/ds.jpg" alt="image" class="info__img">
               </div>

               <div class="info__data">
                   <div class="info__group">
                     <h3>Ichiei Ishibumi</h3>
                     <p>ผู้แต่ง</p>
                   </div>

                   <div class="info__group">
                     <h3>Miyama-Zero</h3>
                     <p>ผู้วาด</p>
                   </div>

                   <div class="info__group">
                     <h3>Fujimi Shobo</h3>
                     <p>สำนักพิมพ์</p>
                   </div>
               </div>              
            </div>
         </section>

         <!--==================== CONTACT ====================-->
         <section class="contact section" id="contact">
            <div class="contact__container container grid">
               <div class="contact__content">
                  <h2 class="section__title contact__title">
                     SUBSCRIBE TO GET <br> 
                     YOUR NaKi
                  </h2>

                  <form id="contactForm" class="contact__form grid">
                     <div class="contact__inputs grid">
                        <div class="contact__box">
                           <label for="name" class="contact__label">Names</label>
                         <input type="text" id="name" name="name" placeholder="Enter names" class="contact__input">
                        </div>

                        <div class="contact__box">
                           <label for="email" class="contact__label"></label>
                           <input type="email" id="email" name="email" placeholder="Enter email" class="contact__input">
                        </div>
                     </div>

                     <button class="button contact__button">
                        SEND EMAIL <i class="ri-arrow-right-s-line"></i>
                     </button>
                  </form>
               </div>

               <img src="assets/img/B1.gif" alt="image" class="contact__img">
            </div>
         </section>
      </main>

      <!--==================== FOOTER ====================-->
      <footer class="footer">
         <div class="footer__container container grid">
            <a href="#" class="footer__logo">NaKi</a>

            <ul class="footer__links">
                <li>
                  <a href="#" class="footer__link">Privacy & Legal</a>
                </li>

                <li>
                  <a href="#" class="footer__link">Contact</a>
                </li>

                <li>
                  <a href="#" class="footer__link">Locations</a>
                </li>

                <li>
                  <a href="#" class="footer__link">News</a>
                </li>

                <li>
                  <a href="#" class="footer__link">Forums</a>
                </li>
            </ul>

            <div class="footer__social">
                <a href="https://www.facebook.com/jirakit.yanjoho" target="_blank" class="footer__social-link">
                  <i class="ri-facebook-circle-line"></i>
                </a>

                <a href="https://www.instagram.com/diaw_2810/" target="_blank" class="footer__social-link">
                  <i class="ri-instagram-line"></i>
                </a>

                <a href="https://x.com/YamatoNaoki2810" target="_blank" class="footer__social-link">
                  <i class="ri-twitter-x-line"></i>
                </a>
            </div>
         </div>

         <span class="footer__copy">
              &#169; All Rights Reserved By Thiraphong (ให้ลิขสิทธิ์เขาหน่อยนะครับอาจารย์)
         </span>
      </footer>

      <!--========== SCROLL UP ==========-->
      <a href="#" class="scrollup" id="scroll-up">
         <i class="ri-arrow-up-line"></i>
      </a>

      <!--=============== SCROLLREVEAL ===============-->
      <script src="assets/js/scrollreveal.min.js"></script>

      <!--=============== SWIPER JS ===============-->
      <script src="assets/js/swiper-bundle.min.js"></script>

      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>


<script>
  const form = document.getElementById("contactForm");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    fetch("process.php", {
      method: "POST",
      body: formData
    })
    .then(res => res.text())
    .then(data => {
      if (data.trim() === "success") {
        alert("ส่งสำเร็จแล้ว ✅");
        form.reset();
      } else {
        alert("ส่งไม่สำเร็จ ❌");
      }
    });
  });
</script>



   </body>
</html>