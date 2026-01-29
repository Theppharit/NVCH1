/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

/* Show menu */
if(navToggle){
   navToggle.addEventListener('click', () =>{
      navMenu.classList.add('show-menu')
   })
}

/* Hide menu */
if(navClose){
   navClose.addEventListener('click', () =>{
      navMenu.classList.remove('show-menu')
   })
}

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav__link')

const linkAction = () =>{
   const navMenu = document.getElementById('nav-menu')
   // When we click on each nav__link, we remove the show-menu class
   navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*=============== SWIPER HOME ===============*/ 
const swiperHome = new Swiper('.home__swiper', {
   pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet:  (index, className) => {
          return '<span class="' + className + '">' + String(index + 1).padStart(2, '0') + "</span>";
        },
    },

    autoplay:{
        delay: 5000,
    }
})

/*=============== CHANGE BACKGROUND HEADER ===============*/
const bgHeader = () =>{
   const header = document.getElementById('header')
   // Add the .scroll-header class if the bottom scroll of the viewport is greater than 50
   this.scrollY >= 50 ? header.classList.add('bg-header') 
                      : header.classList.remove('bg-header')
}
window.addEventListener('scroll', bgHeader)

/*=============== SHOW SCROLL UP ===============*/ 
const scrollUp = () =>{
	const scrollUp = document.getElementById('scroll-up')
   // Add the .scroll-header class if the bottom scroll of the viewport is greater than 350
	this.scrollY >= 350 ? scrollUp.classList.add('show-scroll')
						     : scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
const sections = document.querySelectorAll('section[id]')

const scrollActive = () => {
   const scrollY = window.scrollY

   sections.forEach(section => {
      const id = section.id, 
            top = section.offsetTop - 50, 
            height = section.offsetHeight, 
            link = document.querySelector('.nav__menu a[href*=' + id + ']') 

      if(!link) return

      link.classList.toggle('active-link', scrollY > top && scrollY <= top + height)
   })
}
window.addEventListener('scroll', scrollActive)

/*=============== SCROLL REVEAL ANIMATION ===============*/
const sr = ScrollReveal({
   origin: 'top',
   distance: '60px',
   duration: 2000,
   delay: 300,

})

sr.reveal(`.home__bg`, {scale: 1.1, opacity: 1})
sr.reveal(`.home__swiper`, {origin: 'right', distance: '300px', delay: 800})
sr.reveal(`.home__data`, {origin: 'bottom', distance: '120px', delay: 1600})
sr.reveal(`.swiper-pagination-bullet`, {origin: 'top', delay: 1600, opacity: 0})
sr.reveal(`.home__button`, {origin: 'top', delay: 2200})
sr.reveal(`.about__data, .contact__content`, {origin: 'left'})
sr.reveal(`.about__video, .contact__img`, {origin: 'right'})
sr.reveal(`.models__card`, {interval: 100})
sr.reveal(`.info__img`, {distance: '120px'})
sr.reveal(`.info__number`, {origin: 'bottom', distance: '80px', delay: 800})
sr.reveal(`.info__group`, {interval:100, delay: 1300})
sr.reveal(`.footer__container`)