    <?php 
    $sql_c ="SELECT * FROM tbl_company";
    $result_c  = mysqli_query($conn,$sql_c);
    
    ?>
    
    
     <!--==================== HEADER ====================-->
    <header class="header" id="header">
      <nav class="nav container">
        <a href="#" class="nav__logo">
         
        <?php while ($row_c = mysqli_fetch_assoc($result_c))  { ?>  
          
         <?= $row_c['c_logo']  ?><span><?=  $row_c['c_name'] ?></span> 

        <?php } ?>
        
        
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
         
         <?php if(isset($_SESSION['me_id'])) { ?>
            <a href="dashboard.php?me_id" class="nav__link"><?= $_mename ?></a>
           <?php }else { ?>

           <a href="index-login.php" class="nav__link">Log In</a>
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