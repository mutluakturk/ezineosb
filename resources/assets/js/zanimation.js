!function(e){"use strict";function i(a,t){var o=e(a).data("zanim");return void 0===t&&(t={delay:0,duration:.8,ease:"Expo.easeOut",from:{},to:{}}),o.delay||(o.delay=t.delay),o.duration||(o.duration=t.duration),o.from||(o.from=t.from),o.to||(o.to=t.to),o.ease&&(o.to.ease=o.ease)&&o.to.ease||(o.to.ease=t.ease),o}e.fn.zanimation=function(t){var a=e(this);if(a.data("zanim-timeline")){var o=new TimelineMax;return a.find("*[data-zanim]").each(function(){var a=i(this,t);o.fromTo(e(this),a.duration,a.from,a.to,a.delay).pause()}),o}if(a.parents("[data-zanim-timeline]").length)return new TimelineMax;var n=i(this,t);return TweenMax.fromTo(a,n.duration,n.from,n.to).delay(n.delay).pause()}}(jQuery),function(i){function t(a){var t,o,n,e;t=a,o=i(window).height(),n=t.offset().top,e=t.height(),windowScrollTop=i(window).scrollTop(),n<=windowScrollTop+o&&windowScrollTop<=n+e&&"scroll"==a.attr("data-zanim-trigger")&&(a.zanimation(zanimationDefaults).play(),a.removeAttr("data-zanim-trigger"))}i(document).ready(function(){i("*[data-zanim-trigger='scroll']").each(function(){var a=i(this);t(a),i(window).on("scroll",function(){t(a)})})})}(jQuery);