!function(t){function e(n){if(i[n])return i[n].exports;var a=i[n]={exports:{},id:n,loaded:!1};return t[n].call(a.exports,a,a.exports,e),a.loaded=!0,a.exports}var i={};return e.m=t,e.c=i,e.p="",e(0)}([function(t,e,i){t.exports=i(1)},function(t,e,i){i(2),i(3),jQuery(function(t){var e=t(".J_visibleSectionContainer"),i=t(".J_videoSwitchTrigger"),n=t("#J_modalVideo");t(".J_modalTrigger").on("click",function(e){e.preventDefault(),i.eq(0).addClass("active").siblings(".J_videoSwitchTrigger").removeClass("active"),n.find(".modal-body").html('<iframe height=348 width=530 src="http://player.youku.com/embed/'+t(this).attr("data-video")+'" frameborder=0 allowfullscreen></iframe>'),n.modal({backdrop:"static",show:!0}).removeClass("hide")}),n.on("hide",function(){n.find(".modal-body").empty()}),i.on("click",function(e){e.preventDefault(),t(this).hasClass("active")||(t(this).addClass("active").siblings(".J_videoSwitchTrigger").removeClass("active"),n.find(".modal-body").html('<iframe height=348 width=530 src="http://player.youku.com/embed/'+t(this).attr("data-video")+'" frameborder=0 allowfullscreen></iframe>'))}),MI.products.isAndroid?e.children(".section").addClass("xm-visible-section"):MI.products.visibleWatcher(e,null);var a=t(".J_introSlide"),s=t('<p class="slide-title"></p>');a.xmSlide({width:960,height:1100,navigation:{effect:"fade"},effect:{fade:{speed:400}},play:{effect:"fade",interval:5e3,auto:!0,pauseOnHover:!1,restartDelay:2500},callback:{loaded:function(t){a.append(s),s.text(a.find(".slide").eq(t-1).attr("data-title"))},complete:function(t){s.text(a.find(".slide").eq(t-1).attr("data-title"))}}}),MI.products.tabSwitch(t(".J_tabSwitch"),null)})},function(t,e){MI.namespace("products"),MI.products=function(){function t(e,i){return i=i>e.length?e.length:i,0>i?0:t(e,i-1)+e[i]}function e(t){return"number"==typeof t&&isFinite(t)&&t%1===0}function i(t,e,i){var n,a,s,o;n={triggerSelectorIndex:0,tabSelector:".tab",containerSelector:".tab-container",contentSelector:".tab-content",callback:function(){}},a=$.extend({},n,i),s=$(t),o=s.first().attr("data-tab-target")?$("#"+s.first().attr("data-tab-target")):s.first().siblings(a.containerSelector),e="number"==typeof e?e:0,s.each(function(){$(this).children(a.tabSelector).eq(e).addClass("tab-active").siblings(a.tabSelector).removeClass("tab-active")}),o.children(a.contentSelector).eq(e).addClass("tab-content-active").removeClass("hide").show().siblings(a.contentSelector).removeClass("tab-content-active").hide(),"function"==typeof a.callback&&a.callback(s,e,a)}function n(t,e){var a,s,o;if(a={isSync:!1,events:"click",tabSelector:".tab",containerSelector:".tab-container",contentSelector:".tab-content",after:function(){}},s=$.extend({},a,e),o=$(t),s.isSync===!1){if(0===o.length)return o;if(o.length>1)return o.each(function(){n($(this),e)}),o}o.each(function(t){var e=$(this);s=$.extend(s,{triggerSelectorIndex:t}),e.children(s.tabSelector).on(s.events,function(t){var n=e.children(s.tabSelector).index($(this));if(t.preventDefault(),$(this).attr("href")&&$(this).attr("href").split("#")[1]){var a=$(window).scrollTop();window.location.hash=$(this).attr("href").split("#")[1],$("body, html").scrollTop(a)}i(o,n,s),"function"==typeof s.after&&s.after(o,n,s)})})}function a(e,i){function n(){var t=-1;return $(p).each(function(e){return u+c-p[e]>0?void(t+=1):!1}),0>t?!1:void(d.eq(t).hasClass("xm-visible-section")||(o.onlyOneVisible&&d.removeClass("xm-visible-section"),d.eq(t).addClass("xm-visible-section"),"function"==typeof o.onVisible&&o.onVisible(t)))}var s,o,r,d,c,l=$(e),h=[],p=[],u=0;if(0===l.length)return e;if(l.length>1)return l.each(function(){a($(this),i)}),l;s={selector:".section",viewport:$(window),sectionOffsetFix:300,onlyOneVisible:!1,onLoad:function(){},onVisible:function(){}},o=$.extend({},s,i),d=l.children(o.selector),r=l.addClass("xm-visible-section-container").offset().top,u=$(document).scrollTop()-r,c=o.viewport.height(),d.each(function(){h.push($(this).height())});for(var f=0;f<h.length;f+=1){var m=d.eq(f).attr("data-offset-fix")?parseInt(d.eq(f).attr("data-offset-fix")):o.sectionOffsetFix;p[f]=t(h,f-1)+m}"function"==typeof o.onLoad&&o.onLoad(),$(window).on({"resize.visible":function(){c=$(window).height(),n()},"scroll.visible":function(){u=$(document).scrollTop()-r,n()}}),$(document).ready(function(){n()})}function s(t,i){function n(t,i){return e(t)?t:t.toFixed(i)}function a(){if(1e3*h/r.time>100){var t=Math.floor(h/50);l*=t,h/=t,a()}}var o,r,d,c,l,h,p,u=$(t);return 0===u.length?t:u.length>1?(u.each(function(){s($(this),i)}),u):(o={stepBase:1,startNum:0,fixed:1,time:1e3},r=$.extend({},o,i),c=Number(u.attr("data-end-number"))||Number(u.text()),c&&0!==c?(d=r.startNum,!e(c)&&e(r.stepBase)?(l=.1*r.stepBase,h=Math.ceil(c/l)):(l=1*r.stepBase,h=Math.ceil(c/l)),a(),u.text(d),void(p=window.setInterval(function(){d+=l,h-=1,u.text(n(d,r.fixed)),1>h&&(window.clearInterval(p),u.text(c))},r.time/h))):!1)}function o(){function t(t,i){try{if(e&&e.trigger)return"string"!=typeof i&&(i=JSON.stringify(i)),e.trigger(t,i)}catch(n){}return!1}var e=window.WE||window.WE_PAD;/mi pad/i.test(navigator.userAgent)&&e&&($(document.body).css("padding","75px 0 0"),$(document.head).append('<meta name="viewport" content="width=device-width, user-scalable=no" />'),$(".site-topbar, .site-header, .site-footer").hide(),$(".J_linkFcode").removeAttr("target").attr("href","http://m.mi.com/pad/queue/f2code.html"),$(".J_productStockStatus").removeAttr("target").on("click",function(e){e.preventDefault(),t("opennew","http://hd.mi.com/f/zt/open/cn/index.html")}))}function r(){o()}var d=function(){var t=document.createElement("p").style,e=["ms","O","Moz","Webkit"];if(""===t.transition)return!0;for(;e.length;)return e.pop()+"Transition"in t?!0:!1}(),c=function(){return!!document.createElement("video").canPlayType}(),l=/constructor/i.test(window.HTMLElement),h=/android/i.test(navigator.userAgent.toLowerCase());return{supportsTransitions:d,supportsVideo:c,isSafari:l,isAndroid:h,switchSection:i,tabSwitch:n,visibleWatcher:a,jumpNumber:s,init:r}}(),jQuery(function(){MI.products.init()})},function(t,e){(function(){!function(t,e,i){var n,a,s;return s="xmSlide",a={width:940,height:528,responsiveWidth:960,start:1,navigation:{active:!0,effect:"slide"},pagination:{active:!0,effect:"slide"},play:{active:!1,effect:"slide",interval:5e3,auto:!1,swap:!0,pauseOnHover:!1,restartDelay:2500},effect:{slide:{speed:500},fade:{speed:300,crossfade:!0}},callback:{loaded:function(){},start:function(){},complete:function(){}}},n=function(){function e(e,i){this.element=e,this.options=t.extend(!0,{},a,i),this._defaults=a,this._name=s,this.init()}return e}(),n.prototype.init=function(){var i,n,a,s,o,r,d,c=this;return i=t(this.element),d=i.find("img").length>1?!1:!0,this.data=t.data(this),t.data(this,"animating",!1),t.data(this,"total",i.children().not(".xm-slider-navigation",i).length),t.data(this,"current",this.options.start-1),t.data(this,"vendorPrefix",this._getVendorPrefix()),"undefined"!=typeof TouchEvent&&(t.data(this,"touch",!0),this.options.effect.slide.speed=this.options.effect.slide.speed/2),i.css({overflow:"hidden"}),i.slidesContainer=i.children().not(".xm-slider-navigation",i).wrapAll("<div class='xm-slider-container'>",i).parent().css({overflow:"hidden",position:"relative"}),t(".xm-slider-container",i).wrapInner("<div class='xm-slider-control'>",i).children(),t(".xm-slider-control",i).css({position:"relative",left:0}),t(".xm-slider-control",i).children().addClass("xm-slider-slide").css({position:"absolute",top:0,left:0,width:"100%",zIndex:0,display:"none",webkitBackfaceVisibility:"hidden"}),t.each(t(".xm-slider-control",i).children(),function(e){var i;return i=t(this),i.attr("xm-slider-index",e)}),this.data.touch&&(t(".xm-slider-control",i).on("touchstart",function(t){return c._touchstart(t)}),t(".xm-slider-control",i).on("touchmove",function(t){return c._touchmove(t)}),t(".xm-slider-control",i).on("touchend",function(t){return c._touchend(t)})),i.fadeIn(0),i.find("img").each(e.devicePixelRatio<1.5?function(){t(this).attr("data-src-orig",t(this).attr("src"))}:function(){var e=t(this).attr("srcset");e&&e.split(" 2x")[0]&&t(this).attr("data-src-orig",e.split(" 2x")[0]).removeAttr("srcset")}),this.update(),this.data.touch&&!d&&this._setuptouch(),t(".xm-slider-control",i).children(":eq("+this.data.current+")").eq(0).fadeIn(0,function(){return t(this).css({zIndex:10})}),this.options.navigation.active&&!d&&(o=t("<a>",{"class":"xm-slider-previous xm-slider-navigation icon-slides icon-slides-prev",href:"#",title:"上一张",text:"上一张"}).appendTo(i),n=t("<a>",{"class":"xm-slider-next xm-slider-navigation icon-slides icon-slides-next",href:"#",title:"下一张",text:"下一张"}).appendTo(i)),t(".xm-slider-next",i).click(function(t){return t.preventDefault(),c.stop(!0),c.next(c.options.navigation.effect)}),t(".xm-slider-previous",i).click(function(t){return t.preventDefault(),c.stop(!0),c.previous(c.options.navigation.effect)}),this.options.play.active&&(s=t("<a>",{"class":"xm-slider-play xm-slider-navigation",href:"#",title:"Play",text:"Play"}).appendTo(i),r=t("<a>",{"class":"xm-slider-stop xm-slider-navigation",href:"#",title:"Stop",text:"Stop"}).appendTo(i),s.click(function(t){return t.preventDefault(),c.play(!0)}),r.click(function(t){return t.preventDefault(),c.stop(!0)}),this.options.play.swap&&r.css({display:"none"})),this.options.pagination.active&&(a=t("<ul>",{"class":"xm-slider-pagination"}).appendTo(i),t.each(new Array(this.data.total),function(e){var i,n;return i=t("<li>",{"class":"xm-slider-pagination-item"}).appendTo(a),n=t("<a>",{href:"#","data-xm-slider-item":e,html:e+1}).appendTo(i),n.click(function(e){return e.preventDefault(),c.stop(!0),c["goto"](1*t(e.currentTarget).attr("data-xm-slider-item")+1)})})),t(e).bind("resize",function(){return c.update()}),this._setActive(),this.options.play.auto&&!d&&this.play(),this.options.callback.loaded(this.options.start)},n.prototype._setActive=function(e){var i,n;return i=t(this.element),this.data=t.data(this),n=e>-1?e:this.data.current,t(".active",i).removeClass("active"),t(".xm-slider-pagination li:eq("+n+") a",i).addClass("active")},n.prototype.update=function(){var i,n,a;return i=t(this.element),a=i.width(),this.options.width=a,n=this.options.height,a<=this.options.responsiveWidth&&i.find("img").each(e.devicePixelRatio<1.5?function(){t(this).attr("data-src-r")&&t(this).attr("src",t(this).attr("data-src-r"))}:function(){t(this).attr("data-src-r-2x")?t(this).attr({src:t(this).attr("data-src-r-2x")}):t(this).attr("data-src-r")&&t(this).attr("src",t(this).attr("data-src-r"))}),a>this.options.responsiveWidth&&i.find("img").each(function(){t(this).attr({src:t(this).attr("data-src-orig")})}),t(".xm-slider-control, .xm-slider-container",i).css({width:a,height:n})},n.prototype.next=function(e){var i;return i=t(this.element),this.data=t.data(this),t.data(this,"direction","next"),void 0===e&&(e=this.options.navigation.effect),"fade"===e?this._fade():this._slide()},n.prototype.previous=function(e){var i;return i=t(this.element),this.data=t.data(this),t.data(this,"direction","previous"),void 0===e&&(e=this.options.navigation.effect),"fade"===e?this._fade():this._slide()},n.prototype["goto"]=function(e){var i,n;if(i=t(this.element),this.data=t.data(this),void 0===n&&(n=this.options.pagination.effect),e>this.data.total?e=this.data.total:1>e&&(e=1),"number"==typeof e)return"fade"===n?this._fade(e):this._slide(e);if("string"==typeof e){if("first"===e)return"fade"===n?this._fade(0):this._slide(0);if("last"===e)return"fade"===n?this._fade(this.data.total):this._slide(this.data.total)}},n.prototype._setuptouch=function(){var e,i,n,a;return e=t(this.element),this.data=t.data(this),a=t(".xm-slider-control",e),i=this.data.current+1,n=this.data.current-1,0>n&&(n=this.data.total-1),i>this.data.total-1&&(i=0),a.children(":eq("+i+")").css({display:"block",left:"100%"}),a.children(":eq("+n+")").css({display:"block",left:"-100%"})},n.prototype._touchstart=function(e){var i,n;return i=t(this.element),this.data=t.data(this),n=e.originalEvent.touches[0],this._setuptouch(),t.data(this,"touchtimer",Number(new Date)),t.data(this,"touchstartx",n.pageX),t.data(this,"touchstarty",n.pageY),e.stopPropagation()},n.prototype._touchend=function(e){var i,n,a,s,o,r,d,c=this;return i=t(this.element),this.data=t.data(this),r=e.originalEvent.touches[0],s=t(".xm-slider-control",i),s.position().left>.5*this.options.width||s.position().left>.1*this.options.width&&Number(new Date)-this.data.touchtimer<250?(t.data(this,"direction","previous"),this._slide()):s.position().left<-(.5*this.options.width)||s.position().left<-(.1*this.options.width)&&Number(new Date)-this.data.touchtimer<250?(t.data(this,"direction","next"),this._slide()):(a=this.data.vendorPrefix,d=a+"Transform",n=a+"TransitionDuration",o=a+"TransitionTimingFunction",s[0].style[d]="translateX(0px)",s[0].style[n]=.85*this.options.effect.slide.speed+"ms"),s.on("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd",function(){return a=c.data.vendorPrefix,d=a+"Transform",n=a+"TransitionDuration",o=a+"TransitionTimingFunction",s[0].style[d]="",s[0].style[n]="",s[0].style[o]=""}),e.stopPropagation()},n.prototype._touchmove=function(e){var i,n,a,s,o;return i=t(this.element),this.data=t.data(this),s=e.originalEvent.touches[0],n=this.data.vendorPrefix,a=t(".xm-slider-control",i),o=n+"Transform",t.data(this,"scrolling",Math.abs(s.pageX-this.data.touchstartx)<Math.abs(s.pageY-this.data.touchstarty)),this.data.animating||this.data.scrolling||(e.preventDefault(),this._setuptouch(),a[0].style[o]="translateX("+(s.pageX-this.data.touchstartx)+"px)"),e.stopPropagation()},n.prototype.play=function(e){var i,n,a,s=this;return i=t(this.element),this.data=t.data(this),!this.data.playInterval&&(e&&(n=this.data.current,this.data.direction="next","fade"===this.options.play.effect?this._fade():this._slide()),t.data(this,"playInterval",setInterval(function(){return n=s.data.current,s.data.direction="next","fade"===s.options.play.effect?s._fade():s._slide()},this.options.play.interval)),a=t(i),this.options.play.pauseOnHover&&(a.unbind(),a.bind("mouseenter",function(){return t(".xm-slider-navigation",i).show(),s.stop()}),a.bind("mouseleave",function(){return t(".xm-slider-navigation",i).hide(),s.play()})),t.data(this,"playing",!0),t(".xm-slider-play",i).addClass("xm-slider-playing"),this.options.play.swap)?(t(".xm-slider-play",i).hide(),t(".xm-slider-stop",i).show()):void 0},n.prototype.stop=function(e){var i;return i=t(this.element),this.data=t.data(this),clearInterval(this.data.playInterval),this.options.play.pauseOnHover&&e&&t(".xm-slider-container",i).unbind(),t.data(this,"playInterval",null),t.data(this,"playing",!1),t(".xm-slider-play",i).removeClass("xm-slider-playing"),this.options.play.swap?(t(".xm-slider-stop",i).hide(),t(".xm-slider-play",i).show()):void 0},n.prototype._slide=function(e){var i,n,a,s,o,r,d,c,l,h,p=this;return i=t(this.element),this.data=t.data(this),this.data.animating||e===this.data.current+1?void 0:(t.data(this,"animating",!0),n=this.data.current,e>-1?(e-=1,h=e>n?1:-1,a=e>n?-this.options.width:this.options.width,o=e):(h="next"===this.data.direction?1:-1,a="next"===this.data.direction?-this.options.width:this.options.width,o=n+h),-1===o&&(o=this.data.total-1),o===this.data.total&&(o=0),this._setActive(o),d=t(".xm-slider-control",i),e>-1&&d.children(":not(:eq("+n+"))").css({display:"none",left:0,zIndex:0}),d.children(":eq("+o+")").css({display:"block",left:h*this.options.width,zIndex:10}),this.options.callback.start(n+1),this.data.vendorPrefix?(r=this.data.vendorPrefix,l=r+"Transform",s=r+"TransitionDuration",c=r+"TransitionTimingFunction",d[0].style[l]="translateX("+a+"px)",d[0].style[s]=this.options.effect.slide.speed+"ms",d.on("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd",function(){return d[0].style[l]="",d[0].style[s]="",d.children(":eq("+o+")").css({left:0}),d.children(":eq("+n+")").css({display:"none",left:0,zIndex:0}),t.data(p,"current",o),t.data(p,"animating",!1),d.unbind("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd"),d.children(":not(:eq("+o+"))").css({display:"none",left:0,zIndex:0}),p.data.touch&&p._setuptouch(),p.options.callback.complete(o+1)})):d.stop().animate({left:a},this.options.effect.slide.speed,function(){return d.css({left:0}),d.children(":eq("+o+")").css({left:0}),d.children(":eq("+n+")").css({display:"none",left:0,zIndex:0},t.data(p,"current",o),t.data(p,"animating",!1),p.options.callback.complete(o+1))}))},n.prototype._fade=function(e){var i,n,a,s,o,r=this;return i=t(this.element),this.data=t.data(this),this.data.animating||e===this.data.current+1?void 0:(t.data(this,"animating",!0),n=this.data.current,e?(e-=1,o=e>n?1:-1,a=e):(o="next"===this.data.direction?1:-1,a=n+o),-1===a&&(a=this.data.total-1),a===this.data.total&&(a=0),this._setActive(a),s=t(".xm-slider-control",i),s.children(":eq("+a+")").css({display:"none",left:0,zIndex:10}),this.options.callback.start(n+1),this.options.effect.fade.crossfade?(s.children(":eq("+this.data.current+")").stop().fadeOut(this.options.effect.fade.speed),s.children(":eq("+a+")").stop().fadeIn(this.options.effect.fade.speed,function(){return s.children(":eq("+a+")").css({zIndex:0}),t.data(r,"animating",!1),t.data(r,"current",a),r.options.callback.complete(a+1)})):s.children(":eq("+n+")").stop().fadeOut(this.options.effect.fade.speed,function(){return s.children(":eq("+a+")").stop().fadeIn(r.options.effect.fade.speed,function(){return s.children(":eq("+a+")").css({zIndex:10})}),t.data(r,"animating",!1),t.data(r,"current",a),r.options.callback.complete(a+1)}))},n.prototype._getVendorPrefix=function(){var t,e,n,a,s;for(t=i.body||i.documentElement,n=t.style,a="transition",s=["Moz","Webkit","Khtml","O","ms"],a=a.charAt(0).toUpperCase()+a.substr(1),e=0;e<s.length;){if("string"==typeof n[s[e]+a])return s[e];e++}return!1},t.fn[s]=function(e){return this.each(function(){return t.data(this,"plugin_"+s)?void 0:t.data(this,"plugin_"+s,new n(this,e))})}}(jQuery,window,document)}).call(this)}]);