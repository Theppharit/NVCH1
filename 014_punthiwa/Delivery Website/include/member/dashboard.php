<?php include('include/head.php') ?>

  <body>
    <!--==================== HEADER ====================-->
   <?php include('include/navbar.php') ?>

<main class="main">

<section class="menu section" id="menu">

<form action="add-menu.php?me_id=<?= $_SESSION['me_id'] ?>"method="post">
<h1 class="">เพิ่มเมนูอาหาร</h1>

<input type="text" name="m_name" placeholder="ชื่อเมนู">
<input type="text" name="m_amount" placeholder="จำนวน">
<input type="text" name="m_price" placeholder="ราคา">
<input type="hidden" name="m_img">
<input type="hidden"name="me_id" value="<?= $_SESSION['me_id'] ?>">

</form>

</section>

</main>


<?php
$sql_m = "SELECT * FROM tbl_menu ";
$result_m = mysqli_query($conn, $sql_m);
?>

     <section class="menu section" id="menu">
            <h4 class="section__subtitle">OUR MENU</h4>
            <h2 class="section__title">The Most Popular</h2>

            <div class="menu__container container grid">

            <?php while ($row_m = mysqli_fetch_assoc( $result_m)) { ?>
                
                <article class="menu__card">
                    <img src="assets/img/<?= $row_m['m_img'] ?>" alt="image" class="menu__img" />

                    <div>
                        <h3 class="menu__name">
                            <?= $row_m['m_name'] ?>
                            
                        </h3>
                        <p class="menu__amount"><?= $row_m['m_amount'] ?></p>
                        <h3 class="menu__price"><?= $row_m['m_price'] ?></h3>
                    </div>

                    <button class="menu__button">
                        <i class="ri-shopping-bag-3-fill"></i>
                    </button>
                </article>

            <?php } ?>
          </article>
        </div>
      </section>

<!--==================== FOOTER ====================-->
    <?php include('include/footer.php') ?>

   <?php include('include/add-js.php') ?> 
  </body>
</html>