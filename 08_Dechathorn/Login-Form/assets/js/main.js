/*=============== HIDE & SHOW PASSWORD ===============*/
const showHiddenPass = (password, eye) => {
  const input = document.getElementById(password),
        button = document.getElementById(eye),
        icon = button.querySelector("i")

  button.addEventListener("click", () => {
    // เปลี่ยนชนิดของ input
    input.type = input.type === "password" ? "text" : "password"

    // สลับไอคอน
    icon.classList.toggle("ri-eye-line")
    icon.classList.toggle("ri-eye-off-line")
  })
}

showHiddenPass("loginPass", "loginEye")

/*=============== SWIPER IMAGES ===============*/
const swiperLogin = new Swiper(".login__swiper", {
  loop: true,
  spaceBetween: 24,
  grabCursor: true,
  speed: 600,

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
})
