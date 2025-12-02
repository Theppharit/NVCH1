/*=============== SHOW MENU ===============*/
const showMenu = (navId, toggleId) =>{
   const nav = document.getElementById(navId),
         toggle = document.getElementById(toggleId)

    toggle.addEventListener('click', () => {
        nav.classList.toggle('show-menu')
    })
}
showMenu('nav-menu','nav-toggle')

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav__link')

const linkAction = () =>{
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*=============== ADD SHADOW HEADER ===============*/
const shadowHeader = () =>{
    const header = document.getElementById('header')
    // Add a class if the bottom offset is greater than 50 of the viewport
    this.scrollY >= 50 ? header.classList.add('shadow-header') 
                       : header.classList.remove('shadow-header')
}
window.addEventListener('scroll', shadowHeader)

/*===============  SWIPER REVIEWS ===============*/ 
const swiperReviews = new Swiper('.reviews__swiper',{ 
  loop: true,
  spaceBetween: 16,
  grabCursor: true,
  speed: 600,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  }
})
/*=============== SHOW SCROLL UP ===============*/ 
const scrollUP = () =>{
  const scrollUP = document.getElementsByID('scroll-up')
  this.scrollY >= 350 ? scrollUP.classList.add('show-scroll')
                      : scrollUP.classList.remove('show-scroll')
  window.addEventListener('scroll', scrollUP)  
}

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
const sections = document.querySelectorAll('section[id]')

const scrollActive = () =>{
  const scrollDown = window.scrollY

  sections.forEach(current =>{
    const sectionHeight = current.offsetHeight,
    sectionTop = current.offsetTop - 58,
    sectionId = current.getAttribute('id')
    // FIX: Change the declared variable name to 'sectionClass' (singular)
    const sectionClass = document.querySelector('.nav__menu a[href*=' + sectionId + ']') 

    if(scrollDown > sectionTop && scrollDown <= sectionTop + sectionHeight){
      sectionClass.classList.add('active-link')
    }else{
      sectionClass.classList.remove('active-link')
    }
  })
}
window.addEventListener('scroll', scrollActive)
/*=============== DARK LIGHT THEME ===============*/
/*========== DARK LIGHT THEME ==========*/
const themeButton = document.getElementById('theme-button')
const darkTheme = 'dark-theme'
const iconTheme = 'ri-sun-fill'

// Previously selected topic (if user selected)
const selectedTheme = localStorage.getItem('selected-theme')
const selectedIcon = localStorage.getItem('selected-icon')
// We obtain the current theme that the interface has by validating the dark-theme class
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light';
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'ri-moon-fill' : 'ri-sun-fill';

// We validate if the user previously chose a topic
if (selectedTheme) {
    // If the validation is fulfilled, we ask what the issue was to know if we activated or de
    document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
    themeButton.classList[selectedIcon === 'ri-moon-fill' ? 'add' : 'remove'](iconTheme)
}

// Activate / deactivate the theme manually with the button
themeButton.addEventListener('click', () => {
    // Add or remove the dark / icon theme
    document.body.classList.toggle(darkTheme)
    themeButton.classList.toggle(iconTheme)

    // We save the theme and the current icon that the user chose
    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrentIcon())
})

/*=============== SCROLL REVEAL ANIMATION ===============*/
