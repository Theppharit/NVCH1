<?php

$sql_c = "SELECT * FROM tbl_company";
$result_c = mysqli_query($conn, $sql_c);

?>

<header class="header" id="header">
  <nav class="nav container">
    <a href="#" class="nav__logo">

      <?php while ($row_c = mysqli_fetch_assoc($result_c)) { ?>

        <?= $row_c['c_logo'] ?><span><?= $row_c['c_name'] ?></span>

      <?php } ?>

    </a>

    <div class="nav__menu" id="nav-menu">
      <ul class="nav__list">
        <li>
          <a href="index.php#home" class="nav__link">Home</a>
        </li>

        <li>
          <a href="menu.php#menu" class="nav__link">Menu</a>
        </li>

        <li>
          <a href="reviews.php#reviews" class="nav__link">Reviews</a>
        </li>

        <li>
          <a href="our-app.php#app" class="nav__link">Our App</a>
        </li>

        <li>
          <a href="find-us.php#map" class="nav__link">Find Us</a>
        </li>



        <?php if (isset($me_id)) { ?>

          <li>
            <a href="member/dashboard.php?me_id=<?= $me_id ?>" class="nav__link"><?= $me_name ?></a>

          </li>

          <li>
            <a href="check/logout.php" class="nav__link">Logout</a>

          </li>

        <?php } else { ?>

          <li>
            <a href="login-form.php" class="nav__link">Login</a>
          </li>

        <?php } ?>


      </ul>

      <!-- Theme button -->
      <i class="ri-moon-fill nav__theme" id="theme-button"></i>
    </div>

    <!-- Toggle button -->
    <div class="nav__toggle" id="nav-toggle">
      <i class="ri-menu-5-fill"></i>
    </div>
  </nav>
</header>