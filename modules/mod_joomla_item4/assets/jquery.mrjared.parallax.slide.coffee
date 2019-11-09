###
 # jQuery MrJared Parallax Slide v0.1
 #
 #
 # TERMS OF USE - MrJared Parallax Slide
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
$.fn.MrJaredParallaxSlide = (options) ->
	defaults = 
		pagewidth: 986	 
	options = $.extend defaults, options	 
	@each ->
		page = 1
		maxpage = $(@).find(".pages .page").length
		pw = options.pagewidth
		elemento = $(@)
		$(elemento).find(".arrow-right").click (e) ->
			if(page<maxpage)
				###Parallax de la página actual###			
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page .divnimate").animate({left:"1200px"},700,"easeInOutExpo")
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page").animate({left:"1200px"},800,"easeInOutExpo")	
				###Fin Parallax de la página actual###						
				page++
				###Parallax de la siguiente página###
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page .divnimate").css({"left":"1000px"})
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page .divnimate").animate({left:"0px"},1300,"easeInOutExpo")
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page").css({"left":"1000px"})
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page").animate({left:"660px"},1200,"easeInOutExpo")
				$(elemento).find(".pages").animate({left:"-=#{pw}px"},800,"easeInOutExpo")
				###Fin de Parallax de la siguiente página###
			e.preventDefault();		
		$(elemento).find(".arrow-left").click (e) ->
			if(page>1)
				###Parallax de la página actual###			
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page .divnimate").animate({left:"-1000px"},700,"easeInOutExpo")
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page").animate({left:"-1000px"},800,"easeInOutExpo")
				###Fin Parallax de la página actual###	
				page--
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page .divnimate").css({"left":"1000px"})
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page .divnimate").animate({left:"0px"},1300,"easeInOutExpo")
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page").css({"left":"1000px"})
				$(elemento).find(".pages .page:nth-child(#{page}) .text-page").animate({left:"660px"},1200,"easeInOutExpo")
				$(elemento).find(".pages").animate({left:"+=#{pw}px"},1000,"easeInOutExpo")
			e.preventDefault()	