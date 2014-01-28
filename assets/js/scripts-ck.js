/******

Scripts.js includes all the basic JS scripts for this theme.

******/// SVG fallback
// toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script#update
// DOM Ready
/*$(function() {
	
	if (!Modernizr.svg) {
		var imgs = document.getElementsByTagName('img');
		var dotSVG = /.*\.svg$/;
		for (var i = 0; i != imgs.length; ++i) {
			if(imgs[i].src.match(dotSVG)) {
				imgs[i].src = imgs[i].src.slice(0, -3) + "png";
			}
		}
	}

});*//*!
 *  FluidVids.js v2.1.0
 *  Responsive and fluid YouTube/Vimeo video embeds.
 *  Project: https://github.com/toddmotto/fluidvids
 *  by Todd Motto: http://toddmotto.com
 *
 *  Copyright 2013 Todd Motto. MIT licensed.
 */window.Fluidvids=function(e,t){"use strict";var n,r,i=t.head||t.getElementsByTagName("head")[0],s=".fluidvids-elem{position:absolute;top:0px;left:0px;width:100%;height:100%;}.fluidvids{width:100%;position:relative;}",o=function(e){return n=new RegExp("^(https?:)?//(?:"+r.join("|")+").*$","i"),n.test(e)},u=function(e){var n=t.createElement("div"),r=e.parentNode,i=100*(parseInt(e.height?e.height:e.offsetHeight,10)/parseInt(e.width?e.width:e.offsetWidth,10));r.insertBefore(n,e),e.className+=" fluidvids-elem",n.className+=" fluidvids",n.style.paddingTop=i+"%",n.appendChild(e)},a=function(){var e=t.createElement("div");e.innerHTML="<p>x</p><style>"+s+"</style>",i.appendChild(e.childNodes[1])},f=function(e){var n=e||{},i=n.selector||"iframe";r=n.players||["www.youtube.com","player.vimeo.com"];for(var s=t.querySelectorAll(i),f=0;f<s.length;f++){var l=s[f];o(l.src)&&u(l)}a()};return{init:f}}(window,document);