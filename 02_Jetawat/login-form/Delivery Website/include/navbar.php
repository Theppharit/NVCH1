<?php

$sql_C = 'SELECT * FROM table_company';
$resualt_c = mysqli_query($conn,$sql_C);

?>


<header class="header" id="header">
      <nav class="nav container">
        <a href="#" class="nav__logo">

<?php while ($row_c = mysqli_fetch_assoc($resualt_c)) { ?>
  
  <?= $row_c['C_logo'] ?><span><?= $row_c['C_name'] ?></span>

<?php } ?>

        </a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li>
              <a href="index.php#home" class="nav__link active-link">Home</a>
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
              <a href="find.php#map" class="nav__link">Find Us</a>
            </li>
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