/*window.addEventListener("load", function () {
new Glider(document.querySelector(".glider"), {
  // Mobile-first defaults
  slidesToShow: 2,
  slidesToScroll: 2,
  scrollLock: true,
  dots: "#resp-dots",
  rewind: true,
  draggable: true,
  dragVelocity: 1.1,
  arrows: {
    prev: ".glider-prev",
    next: ".glider-next",
  },
  responsive: [
    {
      // screens greater than >= 775px
      breakpoint: 530,
      settings: {
        // Set to `auto` and provide item width to adjust to viewport
        slidesToShow: "auto",
        slidesToScroll: "auto",
        itemWidth: 150,
        duration: 0.5,
      },
    },
    {
      // screens greater than >= 1024px
      breakpoint: 950,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 5,
        itemWidth: 150,
        duration: 0.5,
      },
    },
  ],
});
});*/

const pestaña = document.querySelectorAll('.nav-link');
const block = document.querySelectorAll('.bloque');

pestaña.forEach((cada, i) => {
    pestaña[i].addEventListener('click', ()=>{

       pestaña.forEach((cada , i)=>{
           pestaña[i].classList.remove('active');
           block[i].classList.add('d-none')
       })

       pestaña[i].classList.add('active')
       block[i].classList.remove('d-none')

    })
});