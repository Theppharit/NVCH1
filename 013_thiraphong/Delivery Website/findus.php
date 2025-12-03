<?php include('include/head.php') ?>
   
   <body>
      <!--==================== HEADER ====================-->
<?php include('include/navbar.php') ?>

      <!--==================== MAIN ====================-->
      <main class="main">
        
      <!--==================== MAP ====================-->
         <section class="map section" id="map">
            <h4 class="section__subtitle">OUR LOCATION</h4>
            <h2 class="section__title">Find Us On The Map</h2>

            <div class="map__container container grid">
               <div class="map__area">
                    <img src="assets/img/map-img.png" alt="image" class="map__img">

                    <!-- Insert your location into Google Maps (https://www.google.com/maps) -->
                     <!-- Click Share -> Embed Map -> Copy HTML -->
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249743.73289546714!2d-77.15258824874827!3d-12.026589994263663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c5f619ee3ec7%3A0x14206cb9cc452e4a!2z4Lil4Li04Lih4LiyIOC5gOC4m-C4o-C4uQ!5e0!3m2!1sth!2sth!4v1764230080891!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>

               <div class="map__content grid">
                    <div class="map__card">
                       <h3 class="map__title">
                           <i class="ri-map-pin-2-fill"></i>
                           Location
                       </h3>

                       <address class="map__info">
                        Lima - Sun City - Peru <br> Av. Moon #4321
                       </address>
                    </div>

                    <div class="map__card">
                       <h3 class="map__title">
                         <i class="ri-calendar-schedule-fill"></i>
                         Schedule
                       </h3>

                       <address class="map__info">
                         Monday - Sunday <br> 24/7
                       </address>
                    </div>

                    <div class="map__card">
                       <h3 class="map__title">
                          <i class="ri-phone-fill"></i>
                          Phones
                       </h3>

                       <address class="map__info">
                          +321(00)123-45-67 <br> +11-1234567
                       </address>
                    </div>
               </div>
            </div>
         </section>
      </main>

      <!--==================== FOOTER ====================-->
<?php include('include/footer.php') ?>
      
      <!--==================== JS ====================-->
<?php include('include/add-js.php') ?>
   </body>
</html>