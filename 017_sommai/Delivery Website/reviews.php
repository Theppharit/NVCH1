<?php include('include/head.php') ?>

<body>
    <!--==================== HEADER ====================-->
    <?php include('include/navbar.php') ?>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== REVIEWS ====================-->
        <section class="reviews section" id="reviews">
            <div class="reviews__container container grid">
                <div class="reviews__content">
                    <h4 class="section__subtitle">OUR REVIEWS</h4>
                    <h2 class="section__title">What They Say?</h2>

                    <div class="reviews__swiper swiper">
                        <div class="swiper-wrapper">
                            <article class="reviews__card swiper-slide">
                                <div class="reviews__profile">
                                    <img
                                        src="assets/img/reviews-img-1.png"
                                        alt="image"
                                        class="reviews__photo" />

                                    <div class="reviews__data">
                                        <h3 class="reviews__name">Emy Hawkins</h3>

                                        <div class="reviews__rating">
                                            <div class="reviews__stars">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                            </div>

                                            <h3 class="reviews__number">5.0</h3>
                                        </div>
                                    </div>
                                </div>

                                <p class="reviews__comment">
                                    Food is the best. Besides the many and delicious meals, the
                                    service is also very good, especially in the very fast
                                    delivery. I highly recommend food to you.
                                </p>
                            </article>

                            <article class="reviews__card swiper-slide">
                                <div class="reviews__profile">
                                    <img
                                        src="assets/img/reviews-img-2.png"
                                        alt="image"
                                        class="reviews__photo" />

                                    <div class="reviews__data">
                                        <h3 class="reviews__name">Aliz Doe</h3>

                                        <div class="reviews__rating">
                                            <div class="reviews__stars">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                            </div>

                                            <h3 class="reviews__number">5.0</h3>
                                        </div>
                                    </div>
                                </div>

                                <p class="reviews__comment">
                                    Food is the best. Besides the many and delicious meals, the
                                    service is also very good, especially in the very fast
                                    delivery. I highly recommend food to you.
                                </p>
                            </article>

                            <article class="reviews__card swiper-slide">
                                <div class="reviews__profile">
                                    <img
                                        src="assets/img/reviews-img-3.png"
                                        alt="image"
                                        class="reviews__photo" />

                                    <div class="reviews__data">
                                        <h3 class="reviews__name">Anna Wlhix</h3>

                                        <div class="reviews__rating">
                                            <div class="reviews__stars">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                            </div>

                                            <h3 class="reviews__number">5.0</h3>
                                        </div>
                                    </div>
                                </div>

                                <p class="reviews__comment">
                                    Food is the best. Besides the many and delicious meals, the
                                    service is also very good, especially in the very fast
                                    delivery. I highly recommend food to you.
                                </p>
                            </article>
                        </div>

                        <!-- Navigation buttons -->
                        <div class="swiper-button-prev">
                            <i class="ri-arrow-left-s-line"></i>
                        </div>

                        <div class="swiper-button-next">
                            <i class="ri-arrow-right-s-line"></i>
                        </div>
                    </div>
                </div>

                <div class="reviews__image">
                    <img
                        src="assets/img/review-img.png"
                        alt="image"
                        class="reviews__img" />
                </div>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <?php include('include/footer.php') ?>

    <?php include('include/add-js.php') ?>

</body>

</html>