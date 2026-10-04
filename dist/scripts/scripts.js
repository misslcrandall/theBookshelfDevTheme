//  Add class "page-scrolled" when page is scrolled
  $(window).on("load scroll", function() {
    var html = $("html");
    var windowScrollTop = $(window).scrollTop();
    if (windowScrollTop > 75) {
        html.addClass("page-scrolled");
    } else {
        html.removeClass("page-scrolled");
    }
  });

// Initialize Animate on Scroll (github.com/michalsnik/aos) 
$(document).ready(function() {
  AOS.init({
    disable: 'tablet',
    offset: 120
  });
  onElementHeightChange(document.body, function() {
    AOS.refresh();
  });
});

function onElementHeightChange(elm, callback) {
  var lastHeight = elm.clientHeight
  var newHeight;
  (function run() {
    newHeight = elm.clientHeight;
    if (lastHeight !== newHeight) callback();
    lastHeight = newHeight;
    if (elm.onElementHeightChangeTimer) {
      clearTimeout(elm.onElementHeightChangeTimer);
    }
    elm.onElementHeightChangeTimer = setTimeout(run, 200);
  })();
}