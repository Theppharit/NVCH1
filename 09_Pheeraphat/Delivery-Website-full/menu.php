<?php include('include/head.php') ?>
   
<body>
      <!--==================== HEADER ====================-->
        <?php include('include/navbar.php') ?>

      <!--==================== MAIN ====================-->
      <main class="main">

         <!--==================== MENU ====================-->
         <?php 

$sql_mn = "SELECT * FROM tb_menu";
$resualt_mn = mysqli_query($conn, $sql_mn);

?>
         <section class="menu section" id="menu">
            <h4 class="section__subtitle">OUR MENU</h4>
            <h2 class="section__title">The Most Popular</h2>
            <div class="menu__container container grid">

            <?php while ($row_mn = mysqli_fetch_assoc($resualt_mn)) { ?>

               <article class="menu__card">
                  <img src="assets/img/<?= $row_mn['mn_img'] ?>" alt="image" class="menu__img">

                  <div>
                     <h3 class="menu__name"><?= $row_mn['mn_name'] ?> </h3>
                     <p class="menu__amount"><?= $row_mn['mn_mount'] ?> </p>
                     <h3 class="menu__price"><?= $row_mn['mn_price'] ?> </h3>
                  </div>

                  <button class="menu__button">
                     <i class="ri-shopping-bag-3-fill"></i>
                  </button>
               </article>

               <?php } ?>

            </div>
         </section>


      </main>

      <!--==================== FOOTER ====================-->
      <?php include('include/footer.php') ?>
      
      <!--==================== JS ====================-->
      <?php include('include/add-js.php') ?>
   </body>
</html>