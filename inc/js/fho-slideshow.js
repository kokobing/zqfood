var timer;
var slides = new Array();

//slides    FILENAME  ALT URL

slides[1] = ["/temp_/topbanner1.jpg", "", ""];
slides[2] = ["/temp_/topbanner2.jpg", "", ""];
slides[3] = ["/temp_/topbanner3.jpg", "", ""];


function getCurrentSlide() {

  var obj = document.getElementById("hdnSlideIndex");
  return parseInt(obj.value);

}

function saveCurrentSlide(slideIndex) {

  var obj = document.getElementById("hdnSlideIndex");
  obj.value = slideIndex;

}

function NextSlide() {

  ChangeSlide(getCurrentSlide() + 1);

}

function ChangeSlide(newSlideIndex) {


  if (newSlideIndex >= slides.length || newSlideIndex < 0) {
    newSlideIndex = 1;
  }


  jQuery("#main-body-bg").fadeOut("500", function() {
    jQuery("#main-body-bg").css("background", "url(" + slides[newSlideIndex][0] + ") no-repeat top left");
    jQuery("#main-body-bg").fadeIn("200");
  });

  saveCurrentSlide(newSlideIndex);

  timer = setTimeout("NextSlide()", 9500);

}



jQuery(document).ready(function() {
  
  timer = setTimeout("NextSlide()", 9500);

});


