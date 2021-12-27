//Header Shadow
var header = $(".header");

$(window).scroll(function(e) {
  if (header.offset().top !== 48) {
    if (!header.hasClass("shadow")) {
      header.addClass("shadow");
    }
  } else {
    header.removeClass("shadow");
  }
});

//MainSliderImage
var images = [
  "public/assets/pics/slider/DQN29l.jpg",
  "public/assets/pics/slider/megan-hodges-xMh_ww8HN_Q-unsplash.jpg",
  "public/assets/pics/slider/wilsan-u-BCATbA86WAw-unsplash.jpg"
]
var current = 0;
setInterval(function(){
  $('#SliderImage').attr('src', images[current]);
  current = (current < images.length - 1)? current + 1: 0;
},3000); /*3000 = 3 sec*/

