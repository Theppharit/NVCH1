/*=============== HIDE & SHOW PASSWORD ===============*/
const showHiddenPass = (passwordId, eyeId) => {
  const input = document.getElementById(passwordId),
        iconEye = document.getElementById(eyeId);

  if (!input || !iconEye) return;

  iconEye.addEventListener('click', () => {
    if (input.type === 'password') {
      input.type = 'text';
      iconEye.classList.remove('ri-eye-line');
      iconEye.classList.add('ri-eye-off-line');
    } else {
      input.type = 'password';
      iconEye.classList.remove('ri-eye-off-line');
      iconEye.classList.add('ri-eye-line');
    }
  });
};

showHiddenPass('loginPass', 'loginEye');

/*=============== SWIPER IMAGES ===============*/
const swiperLogin = new Swiper('.login__swiper', {
  loop: true,
  spaceBetween: 24,
  grabCursor: true,
  effect: 'fade',
  speed: 800,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
});
