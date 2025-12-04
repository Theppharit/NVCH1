<?php include('include/head.php') ?>

<body>
    <!--==================== HEADER ====================-->
    <?php include('include/navbar.php') ?>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== MENU ====================-->

        <?php

    $sql_M = "SELECT * FROM tbl_menu";
    $result_M= mysqli_query($conn, $sql_M);

    ?>

        <section class="menu section" id="menu">
            <h4 class="section__subtitle">OUR MENU</h4>
            <h2 class="section__title">The Most Popular</h2>

            <div class="menu__container container grid">

            <?php while ($row_M = mysqli_fetch_assoc($result_M)) { ?>

                <article class="menu__card">
                    <img src="assets/img/<?= $row_M['M_img'] ?>" alt="image" class="menu__img" />

                    <div>
                        <h3 class="menu__name">
                            <?= $row_M['M_name'] ?>
                            
                        </h3>
                        <p class="menu__amount"><?= $row_M['M_amount'] ?></p>
                        <h3 class="menu__price"><?= $row_M['M_pirc'] ?></h3>
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

    <?php include('include/add-js.php') ?>

</body>

</html>