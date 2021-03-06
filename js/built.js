/* Modernizr 2.6.2 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-fontface-backgroundsize-borderimage-borderradius-boxshadow-flexbox-hsla-multiplebgs-opacity-rgba-textshadow-cssanimations-csscolumns-generatedcontent-cssgradients-cssreflections-csstransforms-csstransforms3d-csstransitions-applicationcache-canvas-canvastext-draganddrop-hashchange-history-audio-video-indexeddb-input-inputtypes-localstorage-postmessage-sessionstorage-websockets-websqldatabase-webworkers-geolocation-inlinesvg-smil-svg-svgclippaths-touch-webgl-shiv-mq-cssclasses-addtest-prefixed-teststyles-testprop-testallprops-hasevent-prefixes-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function D(a){j.cssText=a}function E(a,b){return D(n.join(a+";")+(b||""))}function F(a,b){return typeof a===b}function G(a,b){return!!~(""+a).indexOf(b)}function H(a,b){for(var d in a){var e=a[d];if(!G(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function I(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:F(f,"function")?f.bind(d||b):f}return!1}function J(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+p.join(d+" ")+d).split(" ");return F(b,"string")||F(b,"undefined")?H(e,b):(e=(a+" "+q.join(d+" ")+d).split(" "),I(e,b,c))}function K(){e.input=function(c){for(var d=0,e=c.length;d<e;d++)u[c[d]]=c[d]in k;return u.list&&(u.list=!!b.createElement("datalist")&&!!a.HTMLDataListElement),u}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),e.inputtypes=function(a){for(var d=0,e,f,h,i=a.length;d<i;d++)k.setAttribute("type",f=a[d]),e=k.type!=="text",e&&(k.value=l,k.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(f)&&k.style.WebkitAppearance!==c?(g.appendChild(k),h=b.defaultView,e=h.getComputedStyle&&h.getComputedStyle(k,null).WebkitAppearance!=="textfield"&&k.offsetHeight!==0,g.removeChild(k)):/^(search|tel)$/.test(f)||(/^(url|email)$/.test(f)?e=k.checkValidity&&k.checkValidity()===!1:e=k.value!=l)),t[a[d]]=!!e;return t}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d="2.6.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k=b.createElement("input"),l=":)",m={}.toString,n=" -webkit- -moz- -o- -ms- ".split(" "),o="Webkit Moz O ms",p=o.split(" "),q=o.toLowerCase().split(" "),r={svg:"http://www.w3.org/2000/svg"},s={},t={},u={},v=[],w=v.slice,x,y=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},z=function(b){var c=a.matchMedia||a.msMatchMedia;if(c)return c(b).matches;var d;return y("@media "+b+" { #"+h+" { position: absolute; } }",function(b){d=(a.getComputedStyle?getComputedStyle(b,null):b.currentStyle)["position"]=="absolute"}),d},A=function(){function d(d,e){e=e||b.createElement(a[d]||"div"),d="on"+d;var f=d in e;return f||(e.setAttribute||(e=b.createElement("div")),e.setAttribute&&e.removeAttribute&&(e.setAttribute(d,""),f=F(e[d],"function"),F(e[d],"undefined")||(e[d]=c),e.removeAttribute(d))),e=null,f}var a={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return d}(),B={}.hasOwnProperty,C;!F(B,"undefined")&&!F(B.call,"undefined")?C=function(a,b){return B.call(a,b)}:C=function(a,b){return b in a&&F(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=w.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(w.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(w.call(arguments)))};return e}),s.flexbox=function(){return J("flexWrap")},s.canvas=function(){var a=b.createElement("canvas");return!!a.getContext&&!!a.getContext("2d")},s.canvastext=function(){return!!e.canvas&&!!F(b.createElement("canvas").getContext("2d").fillText,"function")},s.webgl=function(){return!!a.WebGLRenderingContext},s.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:y(["@media (",n.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c},s.geolocation=function(){return"geolocation"in navigator},s.postmessage=function(){return!!a.postMessage},s.websqldatabase=function(){return!!a.openDatabase},s.indexedDB=function(){return!!J("indexedDB",a)},s.hashchange=function(){return A("hashchange",a)&&(b.documentMode===c||b.documentMode>7)},s.history=function(){return!!a.history&&!!history.pushState},s.draganddrop=function(){var a=b.createElement("div");return"draggable"in a||"ondragstart"in a&&"ondrop"in a},s.websockets=function(){return"WebSocket"in a||"MozWebSocket"in a},s.rgba=function(){return D("background-color:rgba(150,255,150,.5)"),G(j.backgroundColor,"rgba")},s.hsla=function(){return D("background-color:hsla(120,40%,100%,.5)"),G(j.backgroundColor,"rgba")||G(j.backgroundColor,"hsla")},s.multiplebgs=function(){return D("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(j.background)},s.backgroundsize=function(){return J("backgroundSize")},s.borderimage=function(){return J("borderImage")},s.borderradius=function(){return J("borderRadius")},s.boxshadow=function(){return J("boxShadow")},s.textshadow=function(){return b.createElement("div").style.textShadow===""},s.opacity=function(){return E("opacity:.55"),/^0.55$/.test(j.opacity)},s.cssanimations=function(){return J("animationName")},s.csscolumns=function(){return J("columnCount")},s.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";return D((a+"-webkit- ".split(" ").join(b+a)+n.join(c+a)).slice(0,-a.length)),G(j.backgroundImage,"gradient")},s.cssreflections=function(){return J("boxReflect")},s.csstransforms=function(){return!!J("transform")},s.csstransforms3d=function(){var a=!!J("perspective");return a&&"webkitPerspective"in g.style&&y("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,c){a=b.offsetLeft===9&&b.offsetHeight===3}),a},s.csstransitions=function(){return J("transition")},s.fontface=function(){var a;return y('@font-face {font-family:"font";src:url("https://")}',function(c,d){var e=b.getElementById("smodernizr"),f=e.sheet||e.styleSheet,g=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"";a=/src/i.test(g)&&g.indexOf(d.split(" ")[0])===0}),a},s.generatedcontent=function(){var a;return y(["#",h,"{font:0/0 a}#",h,':after{content:"',l,'";visibility:hidden;font:3px/1 a}'].join(""),function(b){a=b.offsetHeight>=3}),a},s.video=function(){var a=b.createElement("video"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),c.h264=a.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),c.webm=a.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,"")}catch(d){}return c},s.audio=function(){var a=b.createElement("audio"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),c.mp3=a.canPlayType("audio/mpeg;").replace(/^no$/,""),c.wav=a.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),c.m4a=(a.canPlayType("audio/x-m4a;")||a.canPlayType("audio/aac;")).replace(/^no$/,"")}catch(d){}return c},s.localstorage=function(){try{return localStorage.setItem(h,h),localStorage.removeItem(h),!0}catch(a){return!1}},s.sessionstorage=function(){try{return sessionStorage.setItem(h,h),sessionStorage.removeItem(h),!0}catch(a){return!1}},s.webworkers=function(){return!!a.Worker},s.applicationcache=function(){return!!a.applicationCache},s.svg=function(){return!!b.createElementNS&&!!b.createElementNS(r.svg,"svg").createSVGRect},s.inlinesvg=function(){var a=b.createElement("div");return a.innerHTML="<svg/>",(a.firstChild&&a.firstChild.namespaceURI)==r.svg},s.smil=function(){return!!b.createElementNS&&/SVGAnimate/.test(m.call(b.createElementNS(r.svg,"animate")))},s.svgclippaths=function(){return!!b.createElementNS&&/SVGClipPath/.test(m.call(b.createElementNS(r.svg,"clipPath")))};for(var L in s)C(s,L)&&(x=L.toLowerCase(),e[x]=s[L](),v.push((e[x]?"":"no-")+x));return e.input||K(),e.addTest=function(a,b){if(typeof a=="object")for(var d in a)C(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},D(""),i=k=null,function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f||(f=m(c));var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return r.shivMethods?n(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){f=!0,j=!0}})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)}(this,b),e._version=d,e._prefixes=n,e._domPrefixes=q,e._cssomPrefixes=p,e.mq=z,e.hasEvent=A,e.testProp=function(a){return H([a])},e.testAllProps=J,e.testStyles=y,e.prefixed=function(a,b,c){return b?J(a,b,c):J(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+v.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};
;// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// loads up livereload for dev
var loadReload = function() {

    var lr = document.createElement("script");
        lr.type = "text/javascript";
        lr.src = "//localhost:35729/livereload.js";

    if (jQuery('#global_footer')) {
        jQuery('#global_footer').append(lr);
        console.log('livereload is locked and loaded!');
    }
}
;jQuery(document).ready(function($){

	if( location.hostname.indexOf("red8dev.com") == -1 && location.hostname.indexOf("gotahoenorth.com") == -1 ) {
		loadReload();
		$('body').css('opacity', '1');
	}


    $('#gform_submit_button_3').attr('value', '');
    
    var heroSwiper = new Swiper('.hero-swiper-container', {
	    mode: 'horizontal',
	    loop: true,
	    calculateHeight: true,
	    roundLength: true,
	    pagination: '.hero_pagination',
	    paginationClickable: true,
	    autoplay: 5000,
	    preloadImages: false,
	    lazyLoading: true,
	    lazyLoadingOnTransitionStart: true
    });
    
    var windowWidth = $(window).width();
    
    $(window).resize(function(e) {
	   windowWidth = $(window).width();
	   var imageSize = $('.swiper-slide-active .hero_slide_image img').css('height');
	   $('swiper-slide, .swiper-wrapper').css('height', imageSize); 
    });
    
    
	$('.slide_menu, #global_header .mobile_menu_button img').click(function(e){
	    e.preventDefault();
	    if($('.slide_menu').hasClass('menu_open') == false) {
		     $('.site_wrap').animate({
			   right: '235', 
		    }, 500, function(){
			    $('.slide_menu').addClass('menu_open');
			    $('html, body').css('overflow-y', 'hidden');
		    });
		    $('.slide_nav').animate({
			   right: '0', 
		    }, 500);
	    } else {
		    $('.site_wrap').animate({
			   right: '0', 
		    }, 500, function(){
			    $('.slide_menu').removeClass('menu_open');
			    $('html, body').css('overflow-y', 'scroll');
		    });
		    $('.slide_nav').animate({
			   right: '-235', 
		    }, 500);
		    $('[class*="sub_menu_page"]').animate({
				right: '-235'
			}, 500);
		}
	});
	
	var pageNum;
	
	$('.slide_nav li.has_sub > span').click(function(){
		pageNum = $(this).attr('data-menu-link');
		$('.sub_menu_page-' + pageNum).css('display', 'block');
		$('.sub_menu_page-' + pageNum).animate({
			right: '0'
		}, 500);
	});
	
	$('.slide_nav li.has_sub_dropdown span').click(function(){
		$(this).parent().removeClass('dropdown_open');
		if($(this).siblings('.sub_menu_dropdown').css('display') == 'none') {
			$(this).parent().addClass('dropdown_open');
			$(this).siblings('.sub_menu_dropdown').slideDown();
		} else {
			$(this).siblings('.sub_menu_dropdown').slideUp();
		}
	});
			
	$('.nav_close').click(function(){
		$('[class*="sub_menu_page"]').animate({
			right: '-235'
		}, 500);
		$('.slide_nav').animate({
			right: '-235'
		});
		$('.site_wrap').animate({
		   right: '0', 
	    }, 500, function(){
		    $('.slide_menu').removeClass('menu_open');
	    });
	    $('html, body').css('overflow-y', 'scroll');
		$('html, body').css('-ms-overflow-style', '-ms-autohiding-scrollbar');
	});
	
	$('.nav_back').click(function(){
		$(this).parent().animate({
			right: '-235'
		}, 500);
	});

	$('.tooltip').tooltipster({
	    theme: 'gotahoe-tooltip',
    });
    
    var alreadyLoaded = false;

	$('#filter_events').ddslick({
		onSelected: function (data) {
			if (alreadyLoaded === true && (data.selectedData.value != 'category-placeholder')) {
				window.location = data.selectedData.value;
			}
		}
	});

    $('#saved_venue').each(function(e) {
        var selectID = $(this).attr('id');
        var selectName = $(this).attr('name');
        $('#'+selectID).ddslick({
            width: '100%',
            background: '#ffffff',
            onSelected: function(data){
                $('#'+selectID+' .dd-selected-value').attr('name', selectName);
            }
        });
    });

    $('#EventCountry').each(function(e) {
       var selectID = $(this).attr('id');
        var selectName = $(this).attr('name');
        $('#'+selectID).ddslick({
            width: '100%',
            background: '#ffffff',
            onSelected: function(data){
                $('#'+selectID+' .dd-selected-value').attr('name', selectName);
            }
        });
    });

    $('#StateProvinceSelect').each(function(e) {
        var selectID = $(this).attr('id');
        var selectName = $(this).attr('name');
        $('#'+selectID).ddslick({
            width: '100%',
            background: '#ffffff',
            onSelected: function(data){
                $('#'+selectID+' .dd-selected-value').attr('name', selectName);
            }
        });
    });

    $('#saved_organizer').each(function(e) {
        var selectID = $(this).attr('id');
        var selectName = $(this).attr('name');
        $('#'+selectID).ddslick({
            width: '100%',
            background: '#ffffff',
            onSelected: function(data){
                $('#'+selectID+' .dd-selected-value').attr('name', selectName);
            }
        });
    });

    $('#filter_events').click(function(e) {
		alreadyLoaded = true;
	});
	
	// Display/Hide share buttons on blog page
	$('.share_link').click(function(e){
		e.preventDefault();
		if($(this).parent().next().css('display') == "none"){
			$(this).parent().next().slideDown(500);
		} else
			$(this).parent().next().slideUp(500);
	});
	
	/*$('.acf-form').submit(function() {
		console.log("Submit ACF Form");
		return true;
	});
	
	$('#dr_update_form').submit(function() {
		console.log("Submit DR Form");
		return true;
	});
	
	
	$('.acf-form-submit .button').click(function(e) {
		e.preventDefault();
		
		$('#dr_update_form').trigger('submit');
		$('.acf-form').trigger('submit');
	});*/

    // This displays a scroll to top anchor
    var offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
    //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
    //grab the "back to top" link
        $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if( $(this).scrollTop() > offset_opacity ) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
                scrollTop: 0 ,
            }, scroll_top_duration
        );
    });
});;jQuery(document).ready(function($){
		
	if($('.lodging_listings').length) {
		
		var map;
		var mapLatLng;
		
		$('.view_map').live('click', function(e) {
			e.preventDefault();
			$('.map_popup').css('display', 'block');
			google.maps.event.trigger(map, 'resize');
			map.setCenter(mapLatLng);
		});
		
		$('.map_close').click(function(e) {
			e.preventDefault();
			$('.map_popup').css('display', 'none');
		});
		
		function loadMapMarkers() {
			var firstLatLong = $('.lodging_search_results .listing_result:first-child').attr('data-latlong');
			firstLatLong = firstLatLong.replace('[', '').replace(']', '');
			firstLatLong = firstLatLong.split(',');
			mapLatLng = new google.maps.LatLng(firstLatLong[0], firstLatLong[1]);
			
			function initialize() {
				var mapProp = {
			    	center: mapLatLng,
					zoom: 11,
					mapTypeId: google.maps.MapTypeId.ROADMAP
			  	};
			  	
			  	map = new google.maps.Map(document.getElementById("lodgingMap"),mapProp);
			  	
			  	var marker;
			  	var infowindow;
							      
				infowindow = new google.maps.InfoWindow({
					content: '...'
			  	});
			  
			  	
			  	function setMarkers(map, marker) {
				  	var markerArray = new Array();
				  	var markerTitleArray = new Array();
				  	var markerLodgingTypeArray = new Array();
				  	var markerAddressArray = new Array();
				  	var markerLinkArray = new Array();
				  	$('.lodging_search_results .listing_result').each(function(e) {
				  		markerArray.push($(this).attr('data-latlong'));
				  		markerTitleArray.push($(this).find('.listing_result_title').text());
				  		markerLodgingTypeArray.push($(this).attr('data-lodging_type'));
				  		markerAddressArray.push($(this).children('.result_content').children('p').text());
				  		markerLinkArray.push($(this).find('.view_details').attr('href'));
					});
					
					//console.log(markerTitleArray);
					//console.log(markerLodgingTypeArray);

			        for (var i = 0; i < markerArray.length; i++) {
			            var sites = markerArray[i];
			            sites = sites.replace('[', '').replace(']', '');
			            sites = sites.split(',');
			            var siteLatLng = new google.maps.LatLng(sites[0], sites[1]);
			            
			            
			            
			            var lodgingTitle = '';
			            if(markerTitleArray.length > i) {
			            	lodgingTitle = markerTitleArray[i];
			            }
			            
			            var lodgingType = '';
			            if(markerLodgingTypeArray.length > i) {
			            	lodgingType = markerLodgingTypeArray[i];
			            }
			            
			            var siteLink = '';
			            if(markerLinkArray.length > i) {
				            siteLink = markerLinkArray[i];
			            }
			            
			            var address = '';
			            if(markerAddressArray.length > i) {
			            	address = '<div id="content">'+
								      '<div id="siteNotice">'+
								      '</div>'+
								      '<h1 id="firstHeading" class="firstHeading">'+ lodgingTitle +'</h1>'+
								      '<div id="bodyContent">'+
								      '<p>'+ markerAddressArray[i] +'</p>' + '<a href="'+ siteLink + '"> View Details </a>' + '</div>' + '</div>';
			            }
			            
			            if(lodgingType == 'none') {
				            marker = new google.maps.Marker({
				                position: siteLatLng,
				                map: map,
				                icon: 'http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/badge_resort.png',
						    	labelContent: lodgingTitle,
						    	labelAnchor: new google.maps.Point(60, 20),
						    	labelClass: "lodgingMapIconLabel",
						    	title: lodgingTitle,
						    	address: address
				            });
			            } else {
				            marker = new google.maps.Marker({
				                position: siteLatLng,
				                map: map,
				                icon: 'http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/badge_'+lodgingType+'.png',
						    	labelContent: lodgingTitle,
						    	labelAnchor: new google.maps.Point(60, 20),
						    	labelClass: "lodgingMapIconLabel",
						    	title: lodgingTitle,
						    	address: address
				            });
			            }
			            google.maps.event.addListener(marker, 'click', function() {
					        infowindow.setContent(this.address);
							infowindow.open(map, this);
						});
			        }
		        }
			  	
			  	setMarkers(map, marker);
			  	
			}
			initialize();
		}
		
		//Ajax loop for filtering
		var loading = false;
		var $lodgingContent = $('.lodging_search_results');
		var lodgingTypes = new Array();
		var lodgingTowns = new Array();
		var lodgingAmenities = new Array();
		var excludedLodging = new Array();
		var lodgingPage = 1;
		var filter_search = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "filter_lodging_by_type", types: lodgingTypes, towns: lodgingTowns, amenities: lodgingAmenities, paged: lodgingPage, excluded_posts: excludedLodging},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					if(lodgingPage == 1) {
						$lodgingContent.empty();
						$lodgingContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					} else {
						$('.lodging_search_results .large_blue_border_button').remove();
						$lodgingContent.find('ul').append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					}
					loading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
						if(lodgingPage == 1) {
		                    $lodgingContent.hide(); 
		                    $lodgingContent.append($data);  
		                    $lodgingContent.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    } else {
		                    $lodgingContent.find('ul').append($data);  
		                    $data.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    }
	                    lodgingPage++;
	                    loadMapMarkers();
	                    
	                    $('.tooltip').tooltipster({
						    theme: 'gotahoe-tooltip',
						    position: 'bottom'
					    });
					    
					    $('.full_list_tooltip').tooltipster({
						    theme: 'gotahoe-tooltip',
						    position: 'bottom',
						    contentAsHTML: true,
					    });
	                } else {  
	                    $("#temp_load").remove();
	                    loading = false;
	                } 
				},
				error		: function(jqXHR, textStatus, errorThrown) {
					$("#temp_load").remove();  
					alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
		};
		
		$('.full_list_tooltip').live(
			"click",
			function() {
				return false;
			}
		);
		
		function get_lodging_filters() {
			if(!loading) {
				lodgingTypes = new Array();
				lodgingTowns = new Array();
				lodgingAmenities = new Array();
				
				$('.filter_sidebar .type_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						lodgingTypes.push($(this).attr('data-taxonomy'));
					}
				});
				
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						lodgingTowns.push($(this).attr('data-taxonomy'));
					}
				});
				
				$('.filter_sidebar .amenity_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						lodgingAmenities.push($(this).attr('data-taxonomy'));
					}
				});
				
				lodgingPage = 1;
				excludedLodging = new Array();
				
				if($(window).width() <= 768) {
					$('html, body').animate({
						scrollTop: $('.lodging_search_results').offset().top
					}, 2000);
				}
				
				filter_search();
			}
		}
		
		get_lodging_filters();
		
		$('.lodging_listings .filter_sidebar .filter_section h3').click(function(e) {
			if($(this).siblings('ul').css('display') == 'none') {
				$(this).siblings('ul').slideDown();
				$(this).addClass('filter_open');
			} else {
				$(this).siblings('ul').slideUp();
				$(this).removeClass('filter_open');
			}
		});
		
		$('.lodging_listings .filter_sidebar .filter_section ul li a').click(function(e) {
			e.preventDefault();
					
			if(!loading) {
				if($(this).hasClass('filtered')) {
					$(this).removeClass('filtered');
				} else {
					$(this).addClass('filtered');
				}
				
				if(!$('.lodging_listings .filter_sidebar').hasClass('mobile_filter')) {
					get_lodging_filters();
				}
			}
		});
		
		$('.lodging_listings .filter_sidebar .town_filter .clear_filters').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					$(this).removeClass('filtered');
				});
				
				get_lodging_filters();
			}
		});
		
		$('.lodging_listings .filter_sidebar .town_filter .select_all').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					$(this).addClass('filtered');
				});
				
				get_lodging_filters();
			}
		});
		
		$('.lodging_listings .filter_sidebar .amenity_filter .clear_filters').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				$('.filter_sidebar .amenity_filter ul li a').each(function(e) {
					$(this).removeClass('filtered');
				});
				
				get_lodging_filters();
			}
		});
		
		$('.lodging_listings .filter_sidebar .amenity_filter .select_all').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				$('.filter_sidebar .amenity_filter ul li a').each(function(e) {
					$(this).addClass('filtered');
				});
				
				get_lodging_filters();
			}
		});
		
		$('.lodging_search_results .load_more').live('click', function(e) {
			e.preventDefault();
			
			excludedLodging = new Array();
			$('.lodging_search_results .listing_result').each(function(e) {
				var post_id = $(this).attr('id');
				if(post_id.length) {
					post_id = post_id.split("listing_result_")[1];
					excludedLodging.push(post_id);
				}
			});
				
			filter_search();
		});
		
		$('.lodging_search_results .mobile_filter_button a').live('click', function(e) {
			e.preventDefault();
			
			toggleLodgingSidebar(false, 'mobile');
		});
		
		$('.lodging_listings .filter_sidebar .mobile_filter_close a').click(function(e) {
			e.preventDefault();
			
			toggleLodgingSidebar(true, 'mobile');
		});
		
		$('.lodging_listings .filter_sidebar .mobile_apply_filters a').click(function(e) {
			e.preventDefault();
			
			get_lodging_filters();
			
			toggleLodgingSidebar(true, 'mobile');
		});
	
	
		$(window).resize(function(e) {
			if($(window).width() <= 855) {
				toggleLodgingSidebar(true, 'mobile');
			} else {
				toggleLodgingSidebar(false, 'desktop');
			}
		});
	
	
		function toggleLodgingSidebar(hidden, size) {
			if(hidden) {
				$('.lodging_listings .filter_sidebar').css('display', 'none');
				$('html, body').css('overflow-y', 'initial');
			} else {
				$('.lodging_listings .filter_sidebar').css('display', 'block');
				$('html, body').css('overflow-y', 'hidden');
			}
			
			if(size == 'desktop') {
				$('html, body').css('overflow-y', 'initial');
				$('.lodging_listings .filter_sidebar').removeClass('mobile_filter');
			} else {
				$('.lodging_listings .filter_sidebar').addClass('mobile_filter');
			}
		}
	}
});;jQuery(document).ready(function($){
		
	if($('section.deals').length) {
		//Ajax loop for filtering
		var loading = false;
		var $dealsContent = $('.deals_search_results');
		var dealTypes = new Array();
		var dealTowns = new Array();
		var dealPage = 1;
		var dealStart = null;
		var dealEnd = null;
		var excludedDeals = new Array();
		var deal_filter_search = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "filter_deals_by_type", startdate: dealStart, enddate: dealEnd, types: dealTypes, towns: dealTowns, paged: dealPage, excluded_posts: excludedDeals},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					if(dealPage == 1) {
						$dealsContent.empty();
						$dealsContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					} else {
						$('.deals_search_results .large_blue_border_button').remove();
						$dealsContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					}
					loading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
						if(dealPage == 1) {
		                    $dealsContent.hide(); 
		                    $dealsContent.append($data);  
		                    $dealsContent.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    } else {
		                    $data.hide();
		                    $dealsContent.find('ul').append($data);
		                    $data.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    }
	                    dealPage++;
	                } else {  
	                    $("#temp_load").remove();
	                } 
	                loading = false;
				},
				error		: function(jqXHR, textStatus, errorThrown) {
					$("#temp_load").remove();  
					alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
		};
		
		
		function get_deal_filters() {
			if(!loading) {
				dealTypes = new Array();
				dealTowns = new Array();
				
				$('.filter_sidebar .deal_type_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						dealTypes.push($(this).attr('data-taxonomy'));
					}
				});
				
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						dealTowns.push($(this).attr('data-taxonomy'));
					}
				});
				
				dealStart = $('#start_date').val().split(' ')[1];
				dealEnd = $('#end_date').val().split(' ')[1];
	
				var startTime = new Date(dealStart);
				var endTime = new Date(dealEnd);
				
				if(endTime < startTime) {
					$('#end_date').val($('#start_date').val());
					dealEnd = dealStart;
				}
				
				dealPage = 1;
				
				if($(window).width() <= 768) {
					$('html, body').animate({
						scrollTop: $('.deals_search_results').offset().top
					}, 2000);
				}
				
				deal_filter_search();
			}
		}
		
		var dealEndDate = $('#end_date').val();
			
		$('#start_date').datepicker({dateFormat: 'D mm/dd/yy', defaultDate: new Date(), onSelect: function(dateText) { if(!$('.deals .filter_sidebar').hasClass('mobile_filter')) { get_deal_filters(); } }});
		$('#end_date').datepicker({dateFormat: 'D mm/dd/yy', defaultDate: dealEndDate, onSelect: function(dateText) { if(!$('.deals .filter_sidebar').hasClass('mobile_filter')) { get_deal_filters(); } }});
			
		get_deal_filters();
		
		$('.deals .filter_sidebar .filter_section h3').click(function(e) {
			if($(this).siblings('.deals_calendar').length) {
				if($(this).siblings('.deals_calendar').css('display') == 'none') {
					$(this).siblings('.deals_calendar').slideDown();
					$(this).addClass('filter_open');
				} else {
					$(this).siblings('.deals_calendar').slideUp();
					$(this).removeClass('filter_open');
				}
			} else {
				if($(this).siblings('ul').css('display') == 'none') {
					$(this).siblings('ul').slideDown();
					$(this).addClass('filter_open');
				} else {
					$(this).siblings('ul').slideUp();
					$(this).removeClass('filter_open');
				}
			}
		});
		
		$('.deals .filter_sidebar .filter_section ul li a').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				if($(this).hasClass('filtered')) {
					$(this).removeClass('filtered');
				} else {
					$(this).addClass('filtered');
				}
				
				if(!$('.deals .filter_sidebar').hasClass('mobile_filter')) {
					get_deal_filters();
				}
			}
		});
		
		$('.deals .filter_sidebar .town_filter .clear_filters').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					$(this).removeClass('filtered');
				});
				
				get_deal_filters();
			}
		});
		
		$('.deals .filter_sidebar .town_filter .select_all').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				console.log('Select All');
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					$(this).addClass('filtered');
				});
				
				get_deal_filters();
			}
		});
		
		$('.deals_search_results .load_more').live('click', function(e) {
			e.preventDefault();
			
			excludedDeals = new Array();
			$('.deals_search_results ul li.deal_result').each(function(e) {
				var post_id = $(this).attr('data-post_id');
				if(post_id.length) {
					excludedDeals.push(post_id);
				}
			});
			
			deal_filter_search();
		});
		
		$('.deals_search_results .mobile_filter_button').live('click', function(e) {
			e.preventDefault();
			
			toggleDealsSidebar(false, 'mobile');
		});
		
		$('.deals .filter_sidebar .mobile_filter_close a').click(function(e) {
			e.preventDefault();
			
			toggleDealsSidebar(true, 'mobile');
		});
		
		$('.deals .filter_sidebar .mobile_apply_filters a').click(function(e) {
			e.preventDefault();
			
			get_deal_filters();
			
			toggleDealsSidebar(true, 'mobile');
		});
	
		$(window).resize(function(e) {
			if($(window).width() <= 768) {
				toggleDealsSidebar(true, 'mobile');
			} else {
				toggleDealsSidebar(false, 'desktop');
			}
		});
	
		function toggleDealsSidebar(hidden, size) {
			if(hidden) {
				$('.deals .filter_sidebar').css('display', 'none');
				$('html, body').css('overflow-y', 'initial');
			} else {
				$('.deals .filter_sidebar').css('display', 'block');
				$('html, body').css('overflow-y', 'hidden');
			}
			
			if(size == 'desktop') {
				$('html, body').css('overflow-y', 'initial');
				$('.deals .filter_sidebar').removeClass('mobile_filter');
			} else {
				$('.deals .filter_sidebar').addClass('mobile_filter');
			}
		}
	}
});;jQuery(document).ready(function($){
	
	if($('section.events').length) {
		//Ajax loop for events landing
		var loading = false;
		var $eventsContent = $('.events_list');
		var eventFilter = 'date';
		var eventPage = 1;
		var eventStart = null;
		var eventEnd = null;
		var eventCat = $('.events_top').attr('data-category');
		var event_filter_search = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "filter_events_by_type", startdate: eventStart, enddate: eventEnd, filterby: eventFilter, paged: eventPage, category: eventCat},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					if(eventPage == 1) {
						$eventsContent.empty();
						$eventsContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>');
					} else {
						$('.events_list .large_blue_border_button').remove();
						$eventsContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>');
					}
					loading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
	                    $eventsContent.hide(); 
	                    $eventsContent.append($data);  
	                    $eventsContent.fadeIn(500, function(){  
	                        $("#temp_load").remove();  
	                        loading = false;  
	                        var results_number = $('#events_count').val();
	                        console.log(eventPage);
	                        if(eventPage == 1) {
	                        	$('.sort_container .results_number').text(results_number+" Results");
	                        } else {
		                        var currentResults = $('.sort_container .results_number').text().split(' ')[0];
		                        results_number = parseInt(results_number) + parseInt(currentResults);
		                        $('.sort_container .results_number').text(results_number+" Results");
	                        }
	                        $('#events_count').remove();
	                        eventPage++;
	                    });
	                } else {  
	                    $("#temp_load").remove();
	                } 
				},
				error		: function(jqXHR, textStatus, errorThrown) {
					$("#temp_load").remove();  
					alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
		};
	
		function getEventFilters() {
			eventPage = 1;
			
			eventStart = $('#start_date').val().split(' ')[1];
			eventEnd = $('#end_date').val().split(' ')[1];
	
			var startTime = new Date(eventStart);
			var endTime = new Date(eventEnd);
			
			if(endTime < startTime) {
				$('#end_date').val($('#start_date').val());
				eventEnd = eventStart;
			}
			
			if($(window).width() <= 768) {
				$('html, body').animate({
					scrollTop: $('.sort_container').offset().top
				}, 2000);
			}
			
			event_filter_search();
		}
	
	
		$('#start_date').datepicker({dateFormat: 'D mm/dd/yy', defaultDate: new Date(), onSelect: function(dateText) { if(!$('section.events .filter_sidebar').hasClass('mobile_filter')) { getEventFilters(); } }});
		$('#end_date').datepicker({dateFormat: 'D mm/dd/yy', defaultDate: +14, onSelect: function(dateText) { if(!$('section.events .filter_sidebar').hasClass('mobile_filter')) { getEventFilters(); } }});
		
		getEventFilters();
		
		$('section.events .mobile_filter_button').live('click', function(e) {
			e.preventDefault();
			
			toggleEventsSidebar(false, 'mobile');
		});
		
		$('section.events .filter_sidebar .mobile_filter_close a').click(function(e) {
			e.preventDefault();
			
			toggleEventsSidebar(true, 'mobile');
		});
		
		$('section.events .filter_sidebar .mobile_apply_filters a').click(function(e) {
			e.preventDefault();
			
			getEventFilters();
			
			toggleEventsSidebar(true, 'mobile');
		});
		
		
		$('.events_list .load_more').live('click', function(e) {
			e.preventDefault();
				
			event_filter_search();
		});
		
		
		$(window).resize(function(e) {
			if($(window).width() <= 640) {
				toggleEventsSidebar(true, 'mobile');
			} else {
				toggleEventsSidebar(false, 'desktop');
			}
		});
	
	
		function toggleEventsSidebar(hidden, size) {
			if(hidden) {
				$('section.events .filter_sidebar').css('display', 'none');
				$('html, body').css('overflow-y', 'initial');
			} else {
				$('section.events .filter_sidebar').css('display', 'block');
				$('html, body').css('overflow-y', 'hidden');
			}
			
			if(size == 'desktop') {
				$('html, body').css('overflow-y', 'initial');
				$('section.events .filter_sidebar').removeClass('mobile_filter');
			} else {
				$('section.events .filter_sidebar').addClass('mobile_filter');
			}
		}
	}
});;jQuery(document).ready(function($){
		
	//Ajax loop for filtering
	var loadingResults = false;
	var listingContent = $('.vendor_listing_results');
	var listingType = $('#vendor_listing_type').val();
	var listingPage = 1;
	var excludedListings = new Array();
	var getResults = function() {
		$.ajax({
			type		: "POST",
			data 		: {action: "filter_vendor_listing_by_type", paged: listingPage, listing_type: listingType, excluded_posts: excludedListings},
			dataType	: "html",
			url			: ajaxObject.ajaxurl,
			beforeSend	: function() {
				if(listingPage == 1) {
					listingContent.empty();
					listingContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
				} else {
					$('.vendor_listing_results .large_blue_border_button').remove();
					listingContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
				}
				loadingResults = true;
			},
			success		: function(data) {
				result = $(data);
				if(result.length){  
					if(listingPage == 1) {
						listingContent.hide(); 
						listingContent.append(result);  
						listingContent.fadeIn(500, function(){
							$("#temp_load").remove();  
							loadingResults = false;  
	                    });
                    } else {
                    	$('.large_blue_border_button').remove();
	                    result.hide().fadeIn(500, function(){
		                    $("#temp_load").remove();  
	                    	loadingResults = false;  
	                    });
                    	listingContent.find('ul').append(result);
                    }
					listingPage++;
                }
			},
			error		: function(jqXHR, textStatus, errorThrown) {
				$("#temp_load").remove();
				alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}
		});
	};
	
	if(listingContent.length) {
		if(!loadingResults) {
			listingPage = 1;
			getResults();
		}
	}

	$('.vendor_listing_results .load_more').live('click', function(e) {
		e.preventDefault();
		
		
		excludedListings = new Array();
		$('.vendor_listing_results ul li.listing_info').each(function(e) {
			var post_id = $(this).attr('data-post_id');
			if(post_id.length) {
				excludedListings.push(post_id);
			}
		});
		
		getResults();
	});
});;jQuery(document).ready(function($){
	
	//Ajax loop for filtering
	var loadingSnowReport = false;
	var getReportByResortId = function(resortId) {
		$.ajax({
			type		: "POST",
			data 		: {action: "get_snow_report_ajax", resort_id: resortId},
			dataType	: "json",
			url			: ajaxObject.ajaxurl,
			beforeSend	: function() {
				loadingSnowReport = true;
			},
			success		: function(result) {

				if(result.success){
					$('.open_status').hide();
					$('.base_depth').hide();
					$('.snowfall').hide();
					$('.surface_condition').hide();
				
					$('.open_status').html(result.data.openStatus);	
					$('.base_depth').html(result.data.baseDepth + "&Prime;");	
					$('.snowfall').html(result.data.snowfall + "&Prime;");	
					$('.surface_condition').html(result.data.surfaceCondition);
					
					$('.open_status').fadeIn(500);
					$('.base_depth').fadeIn(500);
					$('.snowfall').fadeIn(500);
					$('.surface_condition').fadeIn(500);
					
					loadingSnowReport = false;
                } else {
                	alert('Error connecting to Snow Report provider');
                }
			},
			error		: function(result) {
				alert(result.data.message);
			}
		});
	};

	$('#resort_dropdown').ddslick({
		onSelected: function(){
			if(!loadingSnowReport) {
				resortId = $('#resort_dropdown .dd-selected-value').val();
				getReportByResortId(resortId);
			}
	    }
	});
});;jQuery(document).ready(function($){
		
	if($('.search_results').length) {
		
		//Ajax loop for filtering
		var searchLoading = false;
		var $searchContent = $('.search_results');
		var searchPage = 2;
		
		var load_more_search = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "load_more_search_results", paged: searchPage},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					$('.search_results .large_blue_border_button').remove();
					$searchContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					searchLoading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
	                    $searchContent.append($data);  
	                    $data.fadeIn(500, function(){  
	                        $("#temp_load").remove();  
	                        searchLoading = false;  
	                    });
	                    searchPage++;
	                } else {  
	                    $("#temp_load").remove();
	                } 
				},
				error		: function(jqXHR, textStatus, errorThrown) {
					$("#temp_load").remove();  
					alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
		};
		
		$('.search_page .search_results .load_more').live('click', function(e) {
			e.preventDefault();
			load_more_search();
		});
	}
});;jQuery(document).ready(function($){
		
	if($('.listing_taxonomy_page').length) {
		
		//Ajax loop for filtering
		var loading = false;
		var $listingTaxonomyContent = $('.listing_taxonomy_page .listing_results_container');
		var excludedListings = new Array();
		var listingPage = 2;
		var taxonomyName = $('#taxonomy_name').val();
		var taxonomyTerms = $('#taxonomy_terms').val();
		
		var load_more_listing_taxonomy = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "load_more_listing_taxonomy", paged: listingPage, excluded_posts: excludedListings, taxonomy_name: taxonomyName, taxonomy_terms: taxonomyTerms},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					$('.listing_results_container .large_blue_border_button').remove();
					$listingTaxonomyContent.find('ul').append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					loading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
	                    $listingTaxonomyContent.find('ul').append($data);  
	                    $data.fadeIn(500, function(){  
	                        $("#temp_load").remove();  
	                        loading = false;  
	                    });
	                    listingPage++;
	                } else {  
	                    $("#temp_load").remove();
	                } 
				},
				error		: function(jqXHR, textStatus, errorThrown) {
					$("#temp_load").remove();  
					alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
		};
		
		$('.listing_taxonomy_page .listing_results_container .load_more').live('click', function(e) {
			e.preventDefault();
			
			excludedListings = new Array();
			$('.listing_results_container .listing_result').each(function(e) {
				var post_id = $(this).attr('id');
				if(post_id.length) {
					post_id = post_id.split("listing_result_")[1];
					excludedListings.push(post_id);
				}
			});
		
			load_more_listing_taxonomy();
		});
	}
});;jQuery(document).ready(function($){
		
	if($('.single_listing').length) {
		
		var map;
		var mapLatLng;
		var lodgingType;
		
		$('.view_map').live('click', function(e) {
			e.preventDefault();
			$('.map_popup').css('display', 'block');
			google.maps.event.trigger(map, 'resize');
			map.setCenter(mapLatLng);
		});
		
		$('.map_close').click(function(e) {
			e.preventDefault();
			$('.map_popup').css('display', 'none');
		});
		
		function loadMapMarkers() {
			lodgingType = $('#lodging_type').val();
			var lodgingTitle = $('.content > h1').text();
			
			var firstLatLong = $('#latlong').val();
			firstLatLong = firstLatLong.replace('[', '').replace(']', '');
			firstLatLong = firstLatLong.split(',');
			mapLatLng = new google.maps.LatLng(firstLatLong[0], firstLatLong[1]);
			
			function initialize() {
				var mapProp = {
				    	center: mapLatLng,
						zoom: 10,
						mapTypeId: google.maps.MapTypeId.ROADMAP
				  	};
			  	
			  	var marker;
			  	
			  	function setMarkers(map, marker) {
				  	if(lodgingType == 'none') {
			            marker = new google.maps.Marker({
			                position: mapLatLng,
			                map: map,
			                icon: 'http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/badge_resort.png',
					    	labelContent: lodgingTitle,
					    	labelAnchor: new google.maps.Point(60, 20),
					    	labelClass: "lodgingMapIconLabel",
					    	title: lodgingTitle,
			            });
		            } else {
			            marker = new google.maps.Marker({
			                position: mapLatLng,
			                map: map,
			                icon: 'http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/badge_'+lodgingType+'.png',
					    	labelContent: lodgingTitle,
					    	labelAnchor: new google.maps.Point(60, 20),
					    	labelClass: "lodgingMapIconLabel",
					    	title: lodgingTitle,
			            });
		            }
		        }
			  	
			  	map = new google.maps.Map(document.getElementById("lodgingMap"),mapProp);
			  	
			  	setMarkers(map, marker);
			}
			initialize();
		}
		
		loadMapMarkers();
	}
	
});;jQuery(document).ready(function($) {
	
	if($('.press_images').length) {
		
		var pressSeason = 'summer';
		var pressPage = 1;
		var loading = false;
		var $pressImagesContent = $('.press_images_results ul');
		var pressPageID = $('#press_image_page_id').val();

		var filter_press_images = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "filter_press_images_by_season", season: pressSeason, pageID: pressPageID},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					if(pressPage == 1) {
						$pressImagesContent.empty();
						$pressImagesContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					} else {
						$('.press_images_results .large_blue_border_button').remove();
						$pressImagesContent.find('ul').append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					}
					loading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
						if(pressPage == 1) {
		                    $pressImagesContent.hide(); 
		                    $pressImagesContent.append($data);  
		                    $pressImagesContent.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    } else {
		                    $pressImagesContent.append($data);  
		                    $data.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    }
	                    //pressPage++;
	                } else {  
	                    $("#temp_load").remove();
	                    loading = false;
	                } 
	                loading = false;
				},
				error		: function(jqXHR, textStatus, errorThrown) {
					$("#temp_load").remove();  
					alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
		};
		
		function get_press_filters() {
			if(!loading) {
				
				$('.filter_sidebar .season_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						pressSeason = $(this).attr('data-taxonomy');
					}
				});
				
				pressPage = 1;
				
				if($(window).width() <= 768) {
					$('html, body').animate({
						scrollTop: $('.press_images_results').offset().top
					}, 2000);
				}
				
				filter_press_images();
			}
		}
		
		get_press_filters();
		
		$('.press_images .filter_sidebar .filter_section h3').click(function(e) {
			if($(this).siblings('ul').css('display') == 'none') {
				$(this).siblings('ul').slideDown();
				$(this).addClass('filter_open');
			} else {
				$(this).siblings('ul').slideUp();
				$(this).removeClass('filter_open');
			}
		});
		
		$('.press_images .filter_sidebar .filter_section ul a').click(function(e) {
			e.preventDefault();
					
			if(!loading) {
				if(!$(this).hasClass('filtered')) {
					$('.press_images .filter_sidebar .filter_section ul .filtered').removeClass('filtered');
					$(this).addClass('filtered');
				
					if(!$('.press_images .filter_sidebar').hasClass('mobile_filter')) {
						get_press_filters();
					}
				}
			}
		});
		
		$('.press_images_results .load_more').live('click', function(e) {
			e.preventDefault();
			
			/*excludedLodging = new Array();
			$('.press_images_results .press_image').each(function(e) {
				var post_id = $(this).attr('id');
				if(post_id.length) {
					post_id = post_id.split("listing_result_")[1];
					excludedLodging.push(post_id);
				}
			});
				
			filter_search();*/
		});
		
		$('.press_images .mobile_filter_button').live('click', function(e) {
			e.preventDefault();
			
			togglePressImagesSidebar(false, 'mobile');
		});
		
		$('.press_images .filter_sidebar .mobile_filter_close a').click(function(e) {
			e.preventDefault();
			
			togglePressImagesSidebar(true, 'mobile');
		});
		
		$('.press_images .filter_sidebar .mobile_apply_filters a').click(function(e) {
			e.preventDefault();
			
			get_press_filters();
			
			togglePressImagesSidebar(true, 'mobile');
		});
	
	
		$(window).resize(function(e) {
			if($(window).width() <= 768) {
				togglePressImagesSidebar(true, 'mobile');
			} else {
				togglePressImagesSidebar(false, 'desktop');
			}
		});
	
	
		function togglePressImagesSidebar(hidden, size) {
			if(hidden) {
				$('.press_images .filter_sidebar').css('display', 'none');
				$('html, body').css('overflow-y', 'initial');
			} else {
				$('.press_images .filter_sidebar').css('display', 'block');
				$('html, body').css('overflow-y', 'hidden');
			}
			
			if(size == 'desktop') {
				$('html, body').css('overflow-y', 'initial');
				$('.press_images .filter_sidebar').removeClass('mobile_filter');
			} else {
				$('.press_images .filter_sidebar').addClass('mobile_filter');
			}
		}
		
		
		$('a.login_alert').live('click', function(e) {
			e.preventDefault();
			alert('Please login to view photo.');
		});
	}
});;jQuery(document).ready(function($){
		
	if($('.blog.wrapper').length) {
		
		//Ajax loop for filtering
		var blogLoading = false;
		var $blogContent = $('.blog.wrapper .content');
		var blogPage = 2;
		
		var load_more_blog = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "load_more_blog_results", paged: blogPage},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					$('.blog.wrapper .content .large_blue_border_button').remove();
					$blogContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					blogLoading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
	                    $blogContent.append($data);  
	                    $data.fadeIn(500, function(){  
	                        $("#temp_load").remove();  
	                        blogLoading = false;  
	                    });
	                    blogPage++;
	                } else {  
	                    $("#temp_load").remove();
	                } 
				},
				error		: function(jqXHR, textStatus, errorThrown) {
					$("#temp_load").remove();  
					alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
		};
		
		$('.blog.wrapper .load_more').live('click', function(e) {
			e.preventDefault();
			load_more_blog();
		});
	}
});