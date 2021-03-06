<!-- 
/* 
    Screw - A jQuery plugin
    ==================================================================
    ©2010-2011 JasonLau.biz - Version 1.0.1
    ==================================================================
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
*/

(function($){
 	$.fn.extend({ 
 		screw: function(options) {
			var defaults = {
			 loadingHTML : 'Loading ... '
			}				
			var option =  $.extend(defaults, options);
            var obj = $(this);

    		return this.each(function() {   		  
              $(window).scroll(function() {
                 screwIt($(this));                             
              });
              
              var screwIt = function(it){
                var h = $(window).height(), st = it.scrollTop(), t = h+st;
                $(".screw-image").each(function(){                   
                    var pos = $(this).offset(), rand = Math.round(Math.random()*1000);
                    if(t >= pos.top){
                    if(!$(this).hasClass('screw-loaded')){
                        
                        $(this).html('<div id="screw-loading-' + rand + '">' + option.loadingHTML + '</div>');
                        // Stop cache
                        var url = $(this).attr('rel'), patt = /&/g;
                        if(patt.test(url)){
                            url += '&screw_rand=' + rand;
                        } else {
                            url += '?screw_rand=' + rand;
                        }
                        // Preload image
                        objImage = new Image();
                        objImage.src = url;
                        var o = $(this);
                        objImage.onload = function(){
                            o.append('<img style="display:none" id="screw-content-' + rand + '" class="screw-content" src="' + url + '" />');                            
                            $('#screw-loading-' + rand).fadeOut('slow', function(){
                                $('#screw-content-' + rand).fadeIn('slow');
                                o.addClass('screw-loaded');
                            });
                        };
                    }                        
                    }
                });	
                
                $(".screw").each(function(){
                    var pos = $(this).offset(), rand = Math.round(Math.random()*1000);
                    if(t >= pos.top){
                    if(!$(this).hasClass('screw-loaded') || $(this).hasClass('screw-repeat')){
                        var o = $(this);
                        if(option.loadingHTML){
                            o.html('<div id="screw-loading-' + rand + '">' + option.loadingHTML + '</div>');
                        }
                        
                        if(o.hasClass('screw-append')){
                        if($(this).attr('rel')){
                          $.get($(this).attr('rel'), { screwrand : Math.round(Math.random()*1000) }, function(data) {
                             o.append('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + data + '</div>');
                             showContent(rand);
                        });  
                        } else if($(this).attr('rev')){
                            o.append('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + $(this).attr('rev') + '</div>');
                            showContent(rand);
                        } 
                        } else if(o.hasClass('screw-prepend')){
                        if($(this).attr('rel')){
                          $.get($(this).attr('rel'), { screwrand : Math.round(Math.random()*1000) }, function(data) {
                             o.prepend('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + data + '</div>');
                             showContent(rand);
                        });  
                        } else if($(this).attr('rev')){
                            o.prepend('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + $(this).attr('rev') + '</div>');
                            showContent(rand);
                        } 
                        } else if(o.hasClass('screw-before')){
                        if($(this).attr('rel')){
                          $.get($(this).attr('rel'), { screwrand : Math.round(Math.random()*1000) }, function(data) {
                             o.before('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + data + '</div>');
                             showContent(rand);
                        });  
                        } else if($(this).attr('rev')){
                            o.before('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + $(this).attr('rev') + '</div>');
                            showContent(rand);
                        }
                        
                        if(o.hasClass('screw-repeat') && pos.top < $(window).height()){
                            if($(this).attr('rel')){
                            $.get($(this).attr('rel'), { screwrand : Math.round(Math.random()*1000) }, function(data) {
                                    o.before('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + data + '</div>');
                                    showContent(rand);
                            });
                            } else if($(this).attr('rev')){
                                o.before('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + $(this).attr('rev') + '</div>');
                                showContent(rand);
                            }
                        }
                         
                        } else if(o.hasClass('screw-after')){
                        if($(this).attr('rel')){
                          $.get($(this).attr('rel'), { screwrand : Math.round(Math.random()*1000) }, function(data) {
                             o.after('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + data + '</div>');
                             showContent(rand);
                        });  
                        } else if($(this).attr('rev')){
                            o.after('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + $(this).attr('rev') + '</div>');
                            showContent(rand);
                        } 
                        } else {
                        if($(this).attr('rel')){
                          $.get($(this).attr('rel'), { screwrand : Math.round(Math.random()*1000) }, function(data) {
                             o.append('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + data + '</div>');
                             showContent(rand);
                        });  
                        } else if($(this).attr('rev')){
                            o.append('<div style="display:none" id="screw-content-' + rand + '" class="screw-content">' + $(this).attr('rev') + '</div>');
                            showContent(rand);
                        } 
                        }
                        o.addClass('screw-loaded');                                           
                    }                        
                    }
                });
              };
              
              var showContent = function(rand){
                if(option.loadingHTML){
                    $('#screw-loading-' + rand).fadeOut('slow', function(){
                        $('#screw-content-' + rand).fadeIn('slow');
                    });
                } else {
                    $('#screw-content-' + rand).fadeIn('slow');
                }               
              };
              
              screwIt($(window));
    		});
    	}
	});
	
})(jQuery);
 -->