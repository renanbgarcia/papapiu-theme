$(document).ready(function() {

  var siteMenuClone = function () {
    $(".js-clone-nav").each(function () {
      var $this = $(this);
      $this
        .clone()
        .attr("class", "site-nav-wrap")
        .appendTo(".site-mobile-menu-body");
    });

    setTimeout(function () {
      var counter = 0;
      $(".site-mobile-menu .has-children").each(function () {
        var $this = $(this);

        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find(".arrow-collapse").attr({
          "data-toggle": "collapse",
          "data-target": "#collapseItem" + counter,
        });

        $this.find("> ul").attr({
          class: "collapse",
          id: "collapseItem" + counter,
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

  var accordion = function () {
    $('.btn-link[aria-expanded="true"]')
      .closest(".accordion-item")
      .addClass("active");
    $(".collapse").on("show.bs.collapse", function () {
      $(this).closest(".accordion-item").addClass("active");
    });

    $(".collapse").on("hidden.bs.collapse", function () {
      $(this).closest(".accordion-item").removeClass("active");
    });
  };
  accordion();

  var siteSticky = function () {
    $(".js-sticky-header").sticky({ topSpacing: 0 });
  };
  siteSticky();

  /**
   * Back to top button
   */
  var backtotop = $('.back-to-top');
  if (backtotop.length > 0) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        $(backtotop[0]).addClass('active');
      } else {
        $(backtotop[0]).removeClass('active');
      }
    }
    $(document).scroll(toggleBacktotop);
  }

  function searchTopicSelect() {
    let select = document.getElementById("topic-select");
    if (select) {
      select.addEventListener('change', (e) => {
        if (e.target.value.length > 0) {
          window.location.assign(window.location.origin + window.location.pathname  + "?topic=" + e.target.value);
        }
      })
    }
  }
  searchTopicSelect();
});
