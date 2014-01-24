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

});*/// Fluid Videos script for YouTube and Vimeo
// http://toddmotto.com/fluid-and-responsive-youtube-and-vimeo-videos-with-fluidvids-js/
window.Fluidvids=function(e,t,n){"use strict";var r,i,s=t.head||t.getElementsByTagName("head")[0],o=".fluidvids-elem{position:absolute;top:0px;left:0px;width:100%;height:100%;}.fluidvids{width:100%;position:relative;}",u=function(e){r=new RegExp("^(https?:)?//(?:"+i.join("|")+").*$","i");return r.test(e)},a=function(e){var n=t.createElement("div"),r=e.parentNode,i=parseInt(e.height?e.height:e.offsetHeight,10)/parseInt(e.width?e.width:e.offsetWidth,10)*100;r.insertBefore(n,e);e.className+=" fluidvids-elem";n.className+=" fluidvids";n.style.paddingTop=i+"%";n.appendChild(e)},f=function(){var e=t.createElement("style");e.styleSheet?e.styleSheet.cssText=o:e.appendChild(t.createTextNode(o));s.appendChild(e)},l=function(e){var n=e||{},r=n.selector||"iframe";i=n.players||["www.youtube.com","player.vimeo.com"];var s=t.querySelectorAll(r);for(var o=0;o<s.length;o++){var l=s[o];u(l.src)&&a(l)}f()};return{init:l}}(window,document);