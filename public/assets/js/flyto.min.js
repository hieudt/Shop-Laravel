/*!
 * jQuery lightweight Fly to
 * Author: @ElmahdiMahmoud
 * Licensed under the MIT license
 */
(function(c,b,a,d){c.fn.flyto=function(e){var f=c.extend({item:".flyto-item",target:".flyto-target",button:".flyto-btn",shake:true},e);return this.each(function(){var j=c(this),h=j.find(f.button),i=c(f.target),g=j.find(f.item);h.on("click",function(){var m=c(this),l=m.parent().find("img").eq(0);if(l){var k=l.clone().offset({top:l.offset().top,left:l.offset().left}).css({opacity:"0.5",position:"absolute",height:l.height()/2,width:l.width()/2,"z-index":"100"}).appendTo(c("body")).animate({top:i.offset().top+10,left:i.offset().left+15,height:l.height()/2,width:l.width()/2},1000,"easeInOutExpo");if(f.shake){setTimeout(function(){i.effect("shake",{times:2},200)},1500)}k.animate({width:0,height:0},function(){c(this).detach()})}})})}})(jQuery,window,document);