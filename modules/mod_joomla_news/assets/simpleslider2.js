jQuery(document).ready(function() {
  var margin = 0;
  var count = jQuery('.slider').children().length;
  
  for (i = 0; i < count; i++) {
    jQuery('.tab-box').append(jQuery('<span>').addClass('tab'));
  }
  
  jQuery('.tab:first-child').addClass('tab-active');

  // handlers
  jQuery('.nav-prev').on('click', function() {
    margin += 100;
    
    if (margin/100 > 0) {
      margin = (count - 1) * -100;
    }
    
    update();
  });
  
  jQuery('.nav-next').on('click', function() {
    margin -= 100;
    
    if (margin/100 < 1 - count) {
      margin = 0;
    }
    
    update();
  });
  
  var $tabs = jQuery('.tab');
  
  $tabs.toArray().forEach(function(element, index, array) {
    (function() {
      jQuery(element).on('click', function() {
        margin = index * -100;
        update();
      });
    })();
  });  
  
  function update() {
    jQuery('.slider').css({'margin-left': margin + '%'});    

    jQuery('.tab-box .tab').removeClass('tab-active');    
    jQuery('.tab-box .tab:nth-child(' + (Math.abs(margin/100) + 1) + ')').addClass('tab-active');
  }
});
