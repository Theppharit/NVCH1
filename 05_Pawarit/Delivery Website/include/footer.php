 <?php
$sql_c="SELECT * FROM tbl_company";
$result_c=mysqli_query($conn,$sql_c);
?>
 
 
 <!--==================== FOOTER ====================-->
    <footer class="footer">
      <div class="footer__container container grid">
        <div class="footer__data">
          <div class="footer__info">
            <a href="#" class="footer__logo">
              <<?php while ($row_c = mysqli_fetch_assoc($result_c)) { ?>

        <?= $row_c['clogo'] ?><span><?= $row_c['cname'] ?></span>

      <?php } ?>
      
            </a>

            <p class="footer__description">
              We will fill your tummy with <br />
              delicious food with fast delivery.
            </p>
          </div>

          <div class="footer__socail">
            <a
              href="https://www.facebook.com/bedimcode"
              target="_blank"
              class="footer__socail-link"
            >
              <i class="ri-facebook-circle-fill"></i>
            </a>

            <a
              href="https://www.instagram.com/bedimcode/"
              target="_blank"
              class="footer__socail-link"
            >
              <i class="ri-instagram-fill"></i>
            </a>

            <a
              href="https://x.com/bedimcode"
              target="_blank"
              class="footer__socail-link"
            >
              <i class="ri-twitter-x-fill"></i>
            </a>

            <a
              href="https://www.youtube.com/@Bedimcode"
              target="_blank"
              class="footer__socail-link"
            >
              <i class="ri-youtube-fill"></i>
            </a>
          </div>
        </div>

        <div class="footer__content grid">
          <div>
            <h3 class="footer__title">Company</h3>

            <ul class="footer__links">
              <li>
                <a href="#" class="footer__link"> Why Food? </a>
              </li>

              <li>
                <a href="#" class="footer__link"> Partner with us </a>
              </li>

              <li>
                <a href="#" class="footer__link"> About us </a>
              </li>

              <li>
                <a href="#" class="footer__link"> FAQ </a>
              </li>
            </ul>
          </div>

          <div>
            <h3 class="footer__title">Support</h3>

            <ul class="footer__links">
              <li>
                <a href="#" class="footer__link"> Account </a>
              </li>

              <li>
                <a href="#" class="footer__link"> Support center </a>
              </li>

              <li>
                <a href="#" class="footer__link"> Feedback </a>
              </li>

              <li>
                <a href="#" class="footer__link"> Contacts </a>
              </li>
            </ul>
          </div>

          <div class="footer__newsletter">
            <h3 class="footer__title">Stay Connected</h3>

            <p>
              Questions or feedback? we'd <br />
              love to hear from you.
            </p>

            <form action="" class="footer__form">
              <input
                type="email"
                placeholder="Email address"
                name=""
                id=""
                class="footer__input"
              />

              <button class="footer__button">
                <i class="ri-arrow-right-s-line"></i>
              </button>
            </form>
          </div>
        </div>
      </div>

      <span class="footer__copy">
        &#169; All Rights Reserved By 
      </span>
    </footer>
    