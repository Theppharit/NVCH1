/*=============== HIDE & SHOW PASSWORD ===============*/
const showHiddenPass = (password, eye) => {
    const input = document.getElementsById(password),
          iconEye = document.getElementById(eye)

    iconEye.addEventListener('click', () => {
        input.type === 'password' ? input.type = 'text'
                                  : input.type = 'password'

        iconEye.classList.toggle('ri-eye-off-line')
        iconEye.classList.toggle('ri-eye-line')
    }) 
}
showHiddenPass('loginPass','loginEye')

/*=============== SWIPER IMAGES ===============*/
