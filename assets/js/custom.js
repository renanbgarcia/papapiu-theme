"use strict";

$(document).ready(function () {
  "use strict";

  var siteMenuClone = function siteMenuClone() {
    $(".js-clone-nav").each(function () {
      var $this = $(this);
      $this.clone().attr("class", "site-nav-wrap").appendTo(".site-mobile-menu-body");
    });
    setTimeout(function () {
      var counter = 0;
      $(".site-mobile-menu .has-children").each(function () {
        var $this = $(this);
        $this.prepend('<span class="arrow-collapse collapsed">');
        $this.find(".arrow-collapse").attr({
          "data-toggle": "collapse",
          "data-target": "#collapseItem" + counter
        });
        $this.find("> ul").attr({
          class: "collapse",
          id: "collapseItem" + counter
        });
        counter++;
      });
    }, 1000);
    $("body").on("click", ".arrow-collapse", function (e) {
      var $this = $(this);
      if ($this.closest("li").find(".collapse").hasClass("show")) {
        $this.removeClass("active");
      } else {
        $this.addClass("active");
      }
      e.preventDefault();
    });
    $(window).resize(function () {
      var $this = $(this),
        w = $this.width();
      if (w > 768) {
        if ($("body").hasClass("offcanvas-menu")) {
          $("body").removeClass("offcanvas-menu");
        }
      }
    });
    $("body").on("click", ".js-menu-toggle", function (e) {
      var $this = $(this);
      e.preventDefault();
      if ($("body").hasClass("offcanvas-menu")) {
        $("body").removeClass("offcanvas-menu");
        $("body").find(".js-menu-toggle").removeClass("active");
      } else {
        $("body").addClass("offcanvas-menu");
        $("body").find(".js-menu-toggle").addClass("active");
      }
    });

    // click outisde offcanvas
    $(document).mouseup(function (e) {
      var container = $(".site-mobile-menu");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($("body").hasClass("offcanvas-menu")) {
          $("body").removeClass("offcanvas-menu");
          $("body").find(".js-menu-toggle").removeClass("active");
        }
      }
    });
  };
  siteMenuClone();
  var owlPlugin = function owlPlugin() {
    if ($(".owl-3-slider").length > 0) {
      var owl3 = $(".owl-3-slider").owlCarousel({
        loop: true,
        autoHeight: true,
        margin: 40,
        autoplay: true,
        smartSpeed: 700,
        items: 4,
        stagePadding: 0,
        nav: true,
        dots: true,
        navText: ['<span class="icon-keyboard_backspace"></span>', '<span class="icon-keyboard_backspace"></span>'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          800: {
            items: 2
          },
          1000: {
            items: 2
          },
          1100: {
            items: 3
          }
        }
      });
    }
    $(".js-custom-next-v2").click(function (e) {
      e.preventDefault();
      owl3.trigger("next.owl.carousel");
    });
    $(".js-custom-prev-v2").click(function (e) {
      e.preventDefault();
      owl3.trigger("prev.owl.carousel");
    });
    if ($(".owl-4-slider").length > 0) {
      var owl4 = $(".owl-4-slider").owlCarousel({
        loop: true,
        autoHeight: true,
        margin: 10,
        autoplay: true,
        smartSpeed: 700,
        items: 4,
        nav: false,
        dots: true,
        navText: ['<span class="icon-keyboard_backspace"></span>', '<span class="icon-keyboard_backspace"></span>'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          800: {
            items: 2
          },
          1000: {
            items: 3
          },
          1100: {
            items: 4
          }
        }
      });
    }
    if ($(".owl-single-text").length > 0) {
      var owlText = $(".owl-single-text").owlCarousel({
        loop: true,
        autoHeight: true,
        margin: 0,
        autoplay: true,
        smartSpeed: 1200,
        items: 1,
        nav: false,
        navText: ['<span class="icon-keyboard_backspace"></span>', '<span class="icon-keyboard_backspace"></span>']
      });
    }
    if ($(".events-slider").length > 0) {
      var owl = $(".events-slider").owlCarousel({
        loop: true,
        autoHeight: true,
        margin: 0,
        autoplay: true,
        smartSpeed: 800,
        mouseDrag: false,
        touchDrag: false,
        items: 1,
        nav: false,
        navText: ['<span class="icon-keyboard_backspace"></span>', '<span class="icon-keyboard_backspace"></span>']
      });
    }
    if ($(".owl-single").length > 0) {
      var changed = function changed(event) {
        var i = event.item.index;
        if (i == 0 || i == null) {
          i = 1;
        } else {
          i = i - 1;
          $(".js-custom-dots li").removeClass("active");
          $('.js-custom-dots li[data-index="' + i + '"]').addClass("active");
        }
      };
      var owl = $(".owl-single").owlCarousel({
        loop: true,
        autoHeight: true,
        margin: 0,
        autoplay: true,
        smartSpeed: 800,
        mouseDrag: false,
        touchDrag: false,
        items: 1,
        nav: false,
        navText: ['<span class="icon-keyboard_backspace"></span>', '<span class="icon-keyboard_backspace"></span>'],
        onChanged: changed
      });
      $(".js-custom-dots li").each(function (i) {
        var i = i + 1;
        $(this).attr("data-index", i);
      });
      $(".js-custom-dots a").on("click", function (e) {
        e.preventDefault();
        owl.trigger("stop.owl.autoplay");
        var k = $(this).closest("li").data("index");
        k = k - 1;
        owl.trigger("to.owl.carousel", [k, 500]);
      });
    }
    if ($(".carousel-testimony").length > 0) {
      $('.carousel-testimony').owlCarousel({
        autoplay: true,
        center: true,
        loop: true,
        items: 1,
        margin: 30,
        stagePadding: 0,
        nav: false,
        navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 2
          }
        }
      });
    }
  };
  owlPlugin();
  var accordion = function accordion() {
    $('.btn-link[aria-expanded="true"]').closest(".accordion-item").addClass("active");
    $(".collapse").on("show.bs.collapse", function () {
      $(this).closest(".accordion-item").addClass("active");
    });
    $(".collapse").on("hidden.bs.collapse", function () {
      $(this).closest(".accordion-item").removeClass("active");
    });
  };
  accordion();
  var siteSticky = function siteSticky() {
    $(".js-sticky-header").sticky({
      topSpacing: 0
    });
  };
  siteSticky();

  /**
   * Back to top button
   */
  var backtotop = $('.back-to-top');
  if (backtotop.length > 0) {
    var toggleBacktotop = function toggleBacktotop() {
      if (window.scrollY > 100) {
        $(backtotop[0]).addClass('active');
      } else {
        $(backtotop[0]).removeClass('active');
      }
    };
    $(document).scroll(toggleBacktotop);
  }
  function searchTopicSelect() {
    var select = document.getElementById("topic-select");
    if (select) {
      select.addEventListener('change', function (e) {
        if (e.target.value.length > 0) {
          window.location.assign(window.location.origin + window.location.pathname + "?topic=" + e.target.value);
        }
      });
    }
  }
  searchTopicSelect();
});
"use strict";

/* global bootstrap: false */
(function () {
  'use strict';

  var tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl);
  });
  var lessonSidebarAction = function lessonSidebarAction() {
    var lessonSidebar = document.querySelector(".pp-lessons-sidebar");
    if (lessonSidebar) {
      if (window.innerWidth >= 768) {
        lessonSidebar.classList.add('show');
      }
    }
  };
  lessonSidebarAction();
  window.addEventListener("resize", lessonSidebarAction);
})();
"use strict";

var thePdf = null;
var scale = 1,
  pageNum = 1,
  isRendering = false;
pageNumPending = null;
viewer = document.getElementById('the-canvas');
var url = viewer.dataset.src;
var buttonL = document.createElement('button');
var buttonR = document.createElement('button');
buttonL.className = 'pdf-button-left btn';
buttonR.className = 'pdf-button-right btn';
buttonL.innerHTML = "<i class='icon-arrow-left'></i>";
buttonR.innerHTML = "<i class='icon-arrow-right'></i>";
buttonL.onclick = onPrevPage;
buttonR.onclick = onNextPage;
viewer.append(buttonL, buttonR);
var canvasLeft = document.createElement("canvas");
canvasLeft.className = 'pdf-page-canvas col-12 col-sm-6';
var canvasRight = document.createElement("canvas");
canvasRight.className = 'pdf-page-canvas col-12 col-sm-6';

// Asynchronous download of PDF
var loadingTask = pdfjsLib.getDocument(url);
loadingTask.promise.then(function (pdf) {
  thePdf = pdf;
  viewer.appendChild(canvasLeft);
  viewer.appendChild(canvasRight);
  renderPages(pageNum);
}, function (reason) {
  // PDF loading error
  console.error(reason);
});
function renderPages(pageNum) {
  isRendering = true;
  thePdf.getPage(pageNum).then(function (page) {
    viewport = page.getViewport({
      scale: scale
    });
    canvasLeft.height = viewport.height;
    canvasLeft.width = viewport.width;
    page.render({
      canvasContext: canvasLeft.getContext('2d'),
      viewport: viewport
    });
  });
  if (pageNum + 1 >= thePdf.numPages) {
    canvasRight.getContext('2d').clearRect(0, 0, canvasRight.width, canvasRight.height);
    isRendering = false;
    return;
  }
  thePdf.getPage(pageNum + 1).then(function (page) {
    viewport = page.getViewport({
      scale: scale
    });
    canvasRight.height = viewport.height;
    canvasRight.width = viewport.width;
    page.render({
      canvasContext: canvasRight.getContext('2d'),
      viewport: viewport
    });
  });
}

/**
 * If another page rendering in progress, waits until the rendering is
 * finised. Otherwise, executes rendering immediately.
 */
function queuerenderPages(num) {
  if (isRendering && false) {
    return;
  } else {
    renderPages(num);
  }
}

/**
 * Displays previous page.
 */
function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum = pageNum - 2;
  queuerenderPages(pageNum);
}

/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= thePdf.numPages) {
    return;
  }
  pageNum = pageNum + 2;
  queuerenderPages(pageNum);
}