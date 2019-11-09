/**************************** SPLASH CONTROL *******************************/
BJSlider = {
    container_id:'splash',
    element_selector:'section',
    nav_id : 'splash_nav',
    active_class: 'active',
    nav_parent_selector: 'container-parent', /*Selector to append the nav div inside. If 'container-parent' value, main containers parent is searched.*/
    start_element: 0,
    max_width_mobiles: 960,
    time_interval: 5000 /*value > 1000*/
};


	jQuery(document).ready(function(){
		splash_num = jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector).length;
    if(BJSlider.nav_parent_selector === 'container-parent'){
        jQuery("#"+BJSlider.container_id).parent().append("<div id='"+BJSlider.nav_id+"'><ul></ul></div>");
    }else{
        jQuery(BJSlider.nav_parent_selector).append("<div id='"+BJSlider.nav_id+"'><ul></ul></div>");
    }

    for (t = 0; t < splash_num; t++) {
        jQuery("#"+BJSlider.nav_id+" ul").append('<li></li>');
    }
    
    current_splash = BJSlider.start_element;
    jQuery("#"+BJSlider.nav_id+" li").eq(current_splash).addClass(BJSlider.active_class);
    jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector).eq(current_splash).show();
    

    splash_interval = setInterval(function () {
        jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector+"."+BJSlider.active_class).removeClass(BJSlider.active_class);
        jQuery("#"+BJSlider.nav_id+" li."+BJSlider.active_class).removeClass(BJSlider.active_class);

        if(jQuery(window).width() > BJSlider.max_width_mobiles) {jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector).eq(current_splash).fadeOut(500);} 
        else {jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector).eq(current_splash).hide();}

        if (current_splash === splash_num - 1) {current_splash = 0;} 
        else {current_splash++;}

        if(jQuery(window).width() > BJSlider.max_width_mobiles) {jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector).eq(current_splash).fadeIn(1000);} 
        else{jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector).eq(current_splash).show();}

        jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector).eq(current_splash).addClass(BJSlider.active_class);
        jQuery("#"+BJSlider.nav_id+" li").eq(current_splash).addClass(BJSlider.active_class);

    }, BJSlider.time_interval);
});

jQuery(document).on('click',"#"+BJSlider.nav_id+" li", function () {
    jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector+"."+BJSlider.active_class).fadeOut();
    jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector+"."+BJSlider.active_class).removeClass(BJSlider.active_class);

    jQuery("#"+BJSlider.nav_id+" li."+BJSlider.active_class).removeClass(BJSlider.active_class);

    jQuery(this).addClass(BJSlider.active_class);
    splash_interval = window.clearInterval(splash_interval);

    jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector).eq(jQuery("#"+BJSlider.nav_id+" li").index(this)).fadeIn();
    jQuery("#"+BJSlider.container_id+" > "+BJSlider.element_selector).eq(jQuery("#"+BJSlider.nav_id+" li").index(this)).addClass(BJSlider.active_class);

});