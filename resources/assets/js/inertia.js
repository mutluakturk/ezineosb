function isElementInViewport(t){"use strict";"function"==typeof jQuery&&t instanceof jQuery&&(t=t[0]);var e=t.getBoundingClientRect();return 0<=e.top&&0<=e.left&&e.bottom<=(window.innerHeight||document.documentElement.clientHeight)&&e.right<=(window.innerWidth||document.documentElement.clientWidth)}!function(a){"use strict";a.fn.zanimationSplit=function(t){var e=this,n=e.data("zanim-text"),i=new SplitText(e,{type:"lines, words, chars"});function o(){isElementInViewport(e)&&e.attr("data-zanim-text")&&(TweenMax.staggerFromTo(i[n.split],n.duration,n.from,n.to,n.delay,function(){i.revert()}),e.removeAttr("data-zanim-text"))}n.delay||(n.delay=.02),n.split||(n.split="chars"),n.ease&&(n.to.ease=n.ease)&&n.to.ease||(n.to.ease="Expo.easeOut"),o(),a(window).on("scroll",o)}}(jQuery),function(c){"use strict";c.fn.inertia=function(t){var e=this,n=e.data("inertia"),i=e.offset().top,o=c(window).height(),a=c(window).scrollTop(),r=0,s=0;n&&(t=n)||(t=t||{}),t.weight||(t.weight=2),t.duration||(t.duration=.7),t.ease||(t.ease="Power3.easeOut"),e.css("transform","translateY("+100*(e.offset().top-c(window).scrollTop())/o+"px)"),c(window).on("resize scroll",function(){a=c(window).scrollTop(),r=t.weight*(i-a)*100/o,a==s||TweenMax.to(e,t.duration,{y:r,ease:t.ease}),s=a})}}(jQuery);