<?php include ('include/head.php')?>
  <body>
    <!--==================== HEADER ====================-->
    <?php include ('include/navbar.php')?>
  <body>

    <!--==================== MAIN ====================-->
    <main class="main">
      <!--==================== HOME ====================-->
      <section class="home section" id="home">
        <div class="home__container container grid">
          <div class="home__data">
            <div>
              <h1 class="home__title">
                Enjoy Your Delicious <span>Food</span>
              </h1>

              <p class="home__description">
                We'll delight your stomach with a variety of delicious
                home-delivered food, delivered quickly and without delay.
              </p>

              <a href="#menu" class="button">Order Now</a>
            </div>

            <div class="home__social">
              <a
                href="https://m.me/bedimcode"
                target="_blank"
                class="home__link"
              >
                <i class="ri-messenger-fill"></i>
              </a>

              <a
                href="https://www.instagram.com/bedimcode/"
                target="_blank"
                class="home__link"
              >
                <i class="ri-instagram-fill"></i>
              </a>

              <a
                href="https://api.whatsapp.com/send?phone=51123456789&text=Hello, more information!"
                target="_blank"
                class="home__link"
              >
                <i class="ri-whatsapp-fill"></i>
              </a>

              <a
                href="https://web.telegram.org/"
                target="_blank"
                class="home__link"
              >
                <i class="ri-telegram-2-fill"></i>
              </a>
            </div>
          </div>

          <div class="home__image">
            <img src="assets/img/home-img.png" alt="image" class="home__img" />

            <div class="home__phone">
              <div class="home__icon">
                <i class="ri-phone-fill"></i>
              </div>

              <address class="home__number">
                Phone number:
                <span>+321(00)123-45-67</span>
              </address>
            </div>

            <p class="home__comment">
              Fast delivery and friendly staff. The food was good and very tasty
              10/10.
            </p>
          </div>
        </div>
      </section>

      <!--=======11============= SERVICE ====================-->
      <section class="service section">
        <h4 class="section__subtitle">OUR SERVICE</h4>
        <h2 class="section__title">How Does It Work?</h2>

        <div class="service__container container grid">
          <div class="service__card">
            <img
              src="assets/img/service-img-1.svg"
              alt="image"
              class="service__img"
            />

            <h3 class="service__title">Easy To Order</h3>
            <p class="service__description">
              You only need a few steps in ordering food.
            </p>
          </div>

          <div class="service__card">
            <img
              src="assets/img/service-img-2.svg"
              alt="image"
              class="service__img"
            />

            <h3 class="service__title">Fastest Delivery</h3>
            <p class="service__description">
              Always delivered on time and even faster.
            </p>
          </div>

          <div class="service__card">
            <img
              src="assets/img/service-img-3.svg"
              alt="image"
              class="service__img"
            />

            <h3 class="service__title">Best Quality</h3>
            <p class="service__description">
              Not only fast for us quality is also number one.
            </p>
          </div>
        </div>
      </section>

    <!--==================== FOOTER ====================-->
     <?php include ('include/footer.php')?>
    <?php include ('include/add-js.php')?>
  </body>
</html>
