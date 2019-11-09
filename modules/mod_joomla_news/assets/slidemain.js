"use strict"
jQuery.noConflict();

jQuery(function($) {
  var slideCache = [];
  var sliderInterval = 0;
  var i = 0;
  var markup = "";
  
  jQuery(".slider_container img").each(function(index) {
    // preload images
    slideCache[index] = new Image();
    slideCache[index].src = jQuery(this).attr("src");
    
    // create image navigation buttons
    if(i < 1) {
      markup += jQuery(".buttons").append("<span class=\"slide_counter_" + i + " current_slide_counter\"></span>");
    }
    else {
      markup += jQuery(".buttons").append("<span class=\"slide_counter_" + i + "\"></span>");
    }
    
    i++;
  });
  
  function changeImage(currentSlide, stopSliderInterval, direction, button) {
    if(currentSlide.length > 0) {
      var currentPosition = 0;
      var newPosition = 0;
      var newSlide = {};
      var fadeOut = {};
      
      // stop slide interval
      if(stopSliderInterval) {
        clearInterval(sliderInterval);
      }
      
      // get current slide position
      currentPosition = currentSlide.index() + 1;
      
      if(direction == 'prev') {
        if(currentSlide.prev().length > 0) {
          newSlide = currentSlide.prev();
          newPosition = currentPosition - 1;
        }
        else {
          newSlide = currentSlide.parent('ul').children('li').last();
          newPosition = newSlide.index() + 1;
        }
      }
      else if(direction == "next") {
        if(currentSlide.next().length > 0) {
          newSlide = currentSlide.next();
          newPosition = currentPosition + 1;
        }
        else {
          newSlide = jQuery(".slider_container li").first();
          newPosition = 1;
        }
      }
      else if(direction == "button") {
        newPosition = button.index() + 1;
        newSlide = jQuery(".slider_container li:nth-of-type(" + newPosition + ")");
      }
      
      fadeOut = currentSlide.fadeOut(1000).promise().done(function() {
        currentSlide.removeClass("current_slide");
        newSlide.addClass("current_slide");
        newSlide.fadeIn(1000);
        jQuery(".current_slide_counter").removeClass("current_slide_counter");
        jQuery(".buttons span:nth-of-type(" + currentPosition + ")").removeClass("current_slide_counter");
        jQuery(".buttons span:nth-of-type(" + newPosition + ")").addClass("current_slide_counter");
      });
    }
    else {
      return false;
    }
  }
  
  function slider() {
    changeImage(jQuery(".current_slide"), false, "next");
  }
  
  // set interval
  sliderInterval = setInterval(slider, 5000);
  
  // when the next slide button is clicked change image and stop slide interval
  jQuery(".next_slide").click(function() {
    // cancel all queued slider animations
    jQuery('.slider_container li').finish();
    
    // switch pause button with play button
    jQuery(".play_pause i").removeClass("fa-pause").addClass("fa-play");
    
    // change image
    changeImage(jQuery(".current_slide"), true, "next");
  });
  
  // when the previous slide button is clicked change image and stop slide interval
  jQuery(".prev_slide").click(function() {
    // cancel all queued slider animations
    jQuery('.slider_container li').finish();
    
    // switch pause button with play button
    jQuery(".play_pause i").removeClass("fa-pause").addClass("fa-play");
    
    
    // change image
    changeImage(jQuery(".current_slide"), true, "prev");
  });
  
  // when circle button is clicked
  jQuery(".buttons").on('click', "span", function() {
    // cancel all queued slider animations
    jQuery('.slider_container li').finish();
    
    // switch pause button with play button
    jQuery(".play_pause i").removeClass("fa-pause").addClass("fa-play");
    
    // change image
    changeImage(jQuery(".current_slide"), true, "button", jQuery(this));
  });
  
  jQuery(".play_pause i").click(function() {
    if(jQuery(this).hasClass("fa-pause")) {
      clearInterval(sliderInterval);
      jQuery(this).removeClass('fa-pause').addClass('fa-play');
    }
    else {
      sliderInterval = setInterval(slider, 5000);
      jQuery(this).removeClass('fa-play').addClass('fa-pause');
    }
  });
});