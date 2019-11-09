###
 # jQuery MrJared Scroll Slide v0.1
 #
 #
 # TERMS OF USE - MrJared Scroll Slide
 # 
 # Open source under the BSD License. 
 # 
 # Copyright © 2013 Rafael Jared Vásquez Montero
 # All rights reserved.
 # 
 # Redistribution and use in source and binary forms, with or without modification, 
 # are permitted provided that the following conditions are met:
 # 
 # Redistributions of source code must retain the above copyright notice, this list of 
 # conditions and the following disclaimer.
 # Redistributions in binary form must reproduce the above copyright notice, this list 
 # of conditions and the following disclaimer in the documentation and/or other materials 
 # provided with the distribution.
 # 
 # Neither the name of the author nor the names of contributors may be used to endorse 
 # or promote products derived from this software without specific prior written permission.
 # 
 # THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 # EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 # MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 #  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 #  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 #  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 # AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 #  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 # OF THE POSSIBILITY OF SUCH DAMAGE. 
 #
###
###Editar valores para controlar los deplazamientos y velocidade los mismos###
$ = jQuery
$.fn.MrJaredScrollSlide = (options) ->
	defaults = 
		scrollwidth: 327
		speed: 500	 
	options = $.extend defaults, options	 
	@each ->
		pag = 1
		elemento = $(@)
		cantMax = $(elemento).find('.pages .page').length-3
    	$(elemento).find('.arrow-right').click (e) ->
    		if pag<=cantMax
            	$(elemento).find('.pages').animate({left:"-=#{options.scrollwidth}px"},options.speed,'easeInOutExpo')
				pag++
			e.preventDefault()
		$(elemento).find('.arrow-left').click (e) ->
			if(pag>1)
            	$('.scroll-gallery .pages').animate({left:"+=#{options.scrollwidth}px"},options.speed,'easeInOutExpo')
				pag--
			e.preventDefault()