<?php include('include/head.php') ?>

<body>
    <!--==================== HEADER ====================-->
    <?php include('include/navbar.php') ?>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== REVIEWS ====================-->


        <?php  

  $sql_R = "SELECT * FROM tbl_reviews";
  $result_R = mysqli_query($conn, $sql_R);
  
?> 
        <section class="reviews section" id="reviews">
            <div class="reviews__container container grid">
                <div class="reviews__content">
                    <h4 class="section__subtitle">OUR REVIEWS</h4>
                    <h2 class="section__title">What They Say?</h2>

                    <div class="reviews__swiper swiper">
                        <div class="swiper-wrapper">

                        
                            <?php while ($row_R = mysqli_fetch_assoc ($result_R)) { ?>
                     <article class="reviews__card swiper-slide">
                           <div class="reviews__profile">
                              <img src="assets/img/<?= $row_R['R_img'] ?>" alt="image" class="reviews__photo">

                              <div class="reviews__data">
                                 <h3 class="reviews__name"><?= $row_R['R_name'] ?></h3>

                                 <div class="reviews__ratting">
                                    <div class="reviews__stars">
                                       <i class="ri-star-fill"></i>
                                       <i class="ri-star-fill"></i>
                                       <i class="ri-star-fill"></i>
                                       <i class="ri-star-fill"></i>
                                       <i class="ri-star-fill"></i>
                                    </div>

                                    <h3 class="reviews__number"><?= $row_R['R_number'] ?></h3>
                                 </div>
                              </div>
                           </div>

                           <p class="reviews__comment">
                               <?= $row_R['R_comment'] ?>
                           </p>
                        </article>

                         <?php } ?>
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