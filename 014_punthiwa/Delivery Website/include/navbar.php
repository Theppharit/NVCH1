    <?php 
    $sql_c ="SELECT * FROM tbl_company";
    $result_c  = mysqli_query($conn,$sql_c);
    
    ?>
    
    
    
    
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
      <nav class="nav container">
        <a href="#" class="nav__logo">
         
        <?php 
        while ($row_c = mysqli_fetch_assoc($result_c))
           { ?>  
          
        # code...<?php= $row_c['c_logo']  ?>

        <?php } ?>
        
        <i class="ri-bowl-fill"></i> <span>Food Lover</span>
        </a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li>
              <a href="index.php" class="nav__link active-link">Home</a>
            </li>

            <li>
              <a href="menu.php" class="nav__link">Menu</a>
            </li>

            <li>
              <a href="reviews.php" class="nav__link">Reviews</a>
            </li>

            <li>
              <a href="ourapp.php" class="nav__link">Our App</a>
            </li>

            <li>
              <a href="map.php" class="nav__link">Find Us</a>
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