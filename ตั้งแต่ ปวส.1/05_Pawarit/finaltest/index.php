<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- REMIX ICON -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">

   <!-- SWIPER -->
   <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

   <!-- MAIN CSS -->
   <link rel="stylesheet" href="assets/css/styles.css">

   <title>iPhone 17 Series</title>
</head>

<body>

<!--==================== HEADER ====================-->
<header class="header" id="header">
   <nav class="nav container">
      <a href="#" class="nav__logo">Apple</a>

      <div class="nav__menu" id="nav-menu">
         <ul class="nav__list">
            <li><a href="#home" class="nav__link">Home</a></li>
            <li><a href="#about" class="nav__link">About</a></li>
            <li><a href="#models" class="nav__link">Models</a></li>
            <li><a href="#info" class="nav__link">Technology</a></li>
            <li><a href="#contact" class="nav__link">Contact</a></li>

            <?php if (isset($_SESSION['user_name'])): ?>
               <li><a href="profile.php" class="nav__link"><?= htmlspecialchars($_SESSION['user_name']); ?></a></li>
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
</header>

<main class="main">

<!--==================== HOME ====================-->
<section class="home grid section" id="home">
   <img src="assets/img/bj.jpg" class="home__bg">
   <div class="home__gradient"></div>

   <div class="home__data">
      <h3 class="home__subtitle">Introducing</h3>
      <h1 class="home__title">iPhone 17</h1>
   </div>

   <div class="home__swiper swiper">
      <div class="swiper-wrapper">
         <article class="home__article swiper-slide">
            <img src="assets/img/17.png" class="home__img">
         </article>
         <article class="home__article swiper-slide">
            <img src="assets/img/17air.png" class="home__img">
         </article>
         <article class="home__article swiper-slide">
            <img src="assets/img/17pro.png" class="home__img">
         </article>
         <article class="home__article swiper-slide">
            <img src="assets/img/17promax.png" class="home__img">
         </article>
      </div>
   </div>

   <div class="swiper-pagination"></div>

   <a href="#about" class="home__button">
      <span>Explore</span>
      <i class="ri-arrow-down-s-line"></i>
   </a>
</section>

<!--==================== ABOUT ====================-->
<section class="about section" id="about">
   <div class="about__container container grid">
      <div class="about__data">
         <h2 class="section__title about__title">
            Designed for the <br>
            <span>Future</span>
         </h2>

         <p class="about__description">
            Revolutionary thinking lies at the heart of every iPhone.
            From a refined design inspired by the future
            to intelligent performance powered by Apple Intelligence.
         </p>
      </div>

      <div class="about__video">
         <video src="assets/img/video.mp4" autoplay muted loop class="about__file"></video>
      </div>
   </div>
</section>

<!--==================== MODELS ====================-->
<section class="models section" id="models">
   <h2 class="section__title">
      Choose your <br> iPhone
   </h2>

   <div class="models__container container grid">

      <!-- iPhone 17 -->
      <article class="models__card">
         <img src="assets/img/17.png" class="models__img">
         <div class="models__gradient"></div>
         <div class="models__data">
            <h3 class="models__name">iPhone 17</h3>
            <span class="models__info">Light. Powerful.</span>
         </div>
      </article>

      <!-- iPhone 17 Air (เบา เรียบ) -->
      <article class="models__card models__air">
         <img src="assets/img/17air.png" class="models__img">
         <div class="models__gradient"></div>
         <div class="models__data">
            <h3 class="models__name">iPhone 17 Air</h3>
            <span class="models__info">Ultra-thin design</span>
         </div>
      </article>

      <!-- iPhone 17 Pro (เด่น) -->
      <article class="models__card models__pro">
         <img src="assets/img/17pro.png" class="models__img">
         <div class="models__gradient"></div>
         <div class="models__data">
            <h3 class="models__name">iPhone 17 Pro</h3>
            <span class="models__info">A18 Pro • Pro Camera</span>
         </div>
      </article>

      <!-- iPhone 17 Pro Max (เด่นสุด) -->
      <article class="models__card models__pro">
         <img src="assets/img/17promax.png" class="models__img">
         <div class="models__gradient"></div>
         <div class="models__data">
            <h3 class="models__name">iPhone 17 Pro Max</h3>
            <span class="models__info">Largest display • Ultimate power</span>
         </div>
      </article>

   </div>
</section>

<!--==================== INFO ====================-->
<section class="info section" id="info">
   <span class="section__subtitle">Apple Intelligence</span>
   <h2 class="section__title info__title">
      A18 Pro Chip
   </h2>

   <div class="info__container container grid">
      <div class="info__content">
         <h1 class="info__number">Pro</h1>
         <img src="assets/img/17promax.png" class="info__img">
      </div>

      <div class="info__data">
         <div class="info__group">
            <h3>PROCESSOR</h3>
            <p>A18 Pro</p>
         </div>

         <div class="info__group">
            <h3>DISPLAY</h3>
            <p>Super Retina XDR<br>ProMotion</p>
         </div>

         <div class="info__group">
            <h3>CAMERA</h3>
            <p>48MP Pro Camera<br>4K Cinematic</p>
         </div>
      </div>
   </div>
</section>

<!--==================== CONTACT ====================-->
<section class="contact section" id="contact">
   <div class="contact__container container grid">
      <div class="contact__content">
         <h2 class="section__title contact__title">
            Stay connected <br> with iPhone
         </h2>

         <form class="contact__form grid">
            <div class="contact__inputs grid">
               <input type="text" placeholder="Name" class="contact__input">
               <input type="email" placeholder="Email" class="contact__input">
            </div>

            <button class="button contact__button">
               Subscribe <i class="ri-arrow-right-s-line"></i>
            </button>
         </form>
      </div>

      <img src="assets/img/f2.jpg" class="contact__img">
   </div>
</section>

</main>

<!--==================== FOOTER ====================-->
<footer class="footer">
   <span class="footer__copy">
      © Apple-style demo project
   </span>
</footer>

<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
