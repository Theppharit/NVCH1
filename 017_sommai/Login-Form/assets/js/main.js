/*=============== HIDE & SHOW PASSWORD ===============*/
const showHiddenPass = (password, eye ) =>{
    const input = document.getElementById(password),
          iconEye = document.getElementById(eye)
    iconEye.addEventListener('click' , () => {
        input.type ==='password' ? input.type = 'text'
                                 : input.type = 'password'
        iconEye.classlist.toggle('')
    })      
}

showHiddenPass('loginPass','login Eye')
/*=============== SWIPER IMAGES ===============*/
