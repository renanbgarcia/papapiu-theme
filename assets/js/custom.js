"use strict";

$(document).ready(function () {
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
function usePDF() {
  viewer = document.getElementById('the-canvas');
  if (!viewer) return;
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
}
usePDF();
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