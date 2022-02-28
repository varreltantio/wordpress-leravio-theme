(function (window, document, $, undefined) {
  "use strict";

  var axilInit = {
    i: function (e) {
      axilInit.s();
      axilInit.methods();
    },

    s: function (e) {
      (this._window = $(window)),
        (this._document = $(document)),
        (this._body = $("body")),
        (this._html = $("html"));
    },

    methods: function (e) {
      axilInit.w();
      axilInit.contactForm();
      axilInit.axilBackToTop();
      axilInit.stickyHeaderMenu();
      axilInit.mobileMenuActivation();
      axilInit.counterUp();
      axilInit.axilSlickActivation();
      axilInit.magnificPopupActivation();
      axilInit.countdownInit(".countdown", "2022/12/01");
      axilInit.menuLinkActive();
      axilInit.marqueImages();
      axilInit.axilHover();
      axilInit.onePageTopFixed();
      axilInit.blogModalActivation();
    },

    w: function (e) {
      this._window.on("load", axilInit.l).on("scroll", axilInit.res);
    },

    contactForm: function () {
      $(".axil-contact-form").on("submit", function (e) {
        e.preventDefault();
        var _self = $(this);
        var _selector = _self.closest("input,textarea");
        _self.closest("div").find("input,textarea").removeAttr("style");
        _self.find(".error-msg").remove();
        _self
          .closest("div")
          .find('button[type="submit"]')
          .attr("disabled", "disabled");
        var data = $(this).serialize();
        $.ajax({
          url: "mail.php",
          type: "post",
          dataType: "json",
          data: data,
          success: function (data) {
            _self
              .closest("div")
              .find('button[type="submit"]')
              .removeAttr("disabled");
            if (data.code === false) {
              _self.closest("div").find('[name="' + data.field + '"]');
              _self
                .find(".btn-primary")
                .after('<div class="error-msg"><p>*' + data.err + "</p></div>");
            } else {
              $(".error-msg").hide();
              $(".form-group").removeClass("focused");
              _self
                .find(".btn-primary")
                .after(
                  '<div class="success-msg"><p>' + data.success + "</p></div>"
                );
              _self.closest("div").find("input,textarea").val("");

              setTimeout(function () {
                $(".success-msg").fadeOut("slow");
              }, 5000);
            }
          },
        });
      });
    },

    axilBackToTop: function () {
      var btn = $("#backto-top");
      $(window).on("scroll", function () {
        if ($(window).scrollTop() > 300) {
          btn.addClass("show");
        } else {
          btn.removeClass("show");
        }
      });
      btn.on("click", function (e) {
        e.preventDefault();
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          "300"
        );
      });
    },

    stickyHeaderMenu: function () {
      $(window).on("scroll", function () {
        // Sticky Class Add
        if ($("body").hasClass("sticky-header")) {
          var stickyPlaceHolder = $("#axil-sticky-placeholder"),
            menu = $(".axil-mainmenu"),
            menuH = menu.outerHeight(),
            topHeaderH = $(".axil-header-top").outerHeight() || 0,
            targrtScroll = topHeaderH + 200;
          if ($(window).scrollTop() > targrtScroll) {
            menu.addClass("axil-sticky");
            stickyPlaceHolder.height(menuH);
          } else {
            menu.removeClass("axil-sticky");
            stickyPlaceHolder.height(0);
          }
        }
      });
    },

    mobileMenuActivation: function (e) {
      $(".menu-item-has-children > a").on("click", function (e) {
        var targetParent = $(this).parents(".mainmenu-nav"),
          target = $(this).siblings(".axil-submenu"),
          targetSiblings = $(this)
            .parent(".menu-item-has-children")
            .siblings()
            .find(".axil-submenu");

        if (targetParent.hasClass("offcanvas")) {
          $(target).slideToggle(400);
          $(targetSiblings).slideUp(400);
          $(this).parent(".menu-item-has-children").toggleClass("open");
          $(this)
            .parent(".menu-item-has-children")
            .siblings()
            .removeClass("open");
        }
      });

      function resizeClassAdd() {
        if (window.matchMedia("(min-width: 992px)").matches) {
          $("body").removeClass("mobilemenu-active");
          $("#mobilemenu-popup")
            .removeClass("offcanvas show")
            .removeAttr("style");
          $(".axil-mainmenu .offcanvas-backdrop").remove();
          $(".axil-submenu").removeAttr("style");
        } else {
          $("body").addClass("mobilemenu-active");
          $("#mobilemenu-popup").addClass("offcanvas");
          $(".menu-item-has-children > a").on("click", function (e) {
            e.preventDefault();
          });
        }
      }

      $(window).on("resize", function () {
        resizeClassAdd();
      });

      resizeClassAdd();
    },

    counterUp: function () {
      var elementSelector = $(".count");
      elementSelector.each(function () {
        elementSelector.appear(function (e) {
          var el = this;
          var updateData = $(el).attr("data-count");
          var od = new Odometer({
            el: el,
            format: "d",
            duration: 2000,
          });
          od.update(updateData);
        });
      });
    },

    axilSlickActivation: function (e) {
      $(".slick-slider").slick();
    },

    magnificPopupActivation: function () {
      var yPopup = $(".popup-youtube");
      if (yPopup.length) {
        yPopup.magnificPopup({
          disableOn: 300,
          type: "iframe",
          mainClass: "mfp-fade",
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false,
        });
      }
    },

    countdownInit: function (countdownSelector, countdownTime) {
      var eventCounter = $(countdownSelector);
      if (eventCounter.length) {
        eventCounter.countdown(countdownTime, function (e) {
          $(this).html(
            e.strftime(
              "<div class='countdown-section'><div><div class='countdown-number'>%D</div> <div class='countdown-unit'>Day%!D</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%H</div> <div class='countdown-unit'>Hour%!H</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%M</div> <div class='countdown-unit'>Minutes</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%S</div> <div class='countdown-unit'>Seconds</div> </div></div>"
            )
          );
        });
      }
    },

    menuLinkActive: function () {
      var currentPage = location.pathname.split("/"),
        current = currentPage[currentPage.length - 1];
      $(".mainmenu li a, .main-navigation li a").each(function () {
        var $this = $(this);
        if ($this.attr("href") === current) {
          $this.addClass("active");
          $this.parents(".menu-item-has-children").addClass("menu-item-open");
        }
      });
    },

    marqueImages: function () {
      $(".marque-images").each(function () {
        var t = 0;
        var i = 1;
        var $this = $(this);
        setInterval(function () {
          t += i;
          $this.css("background-position-x", -t + "px");
        }, 10);
      });
    },

    axilHover: function () {
      $(
        ".services-grid, .counterup-progress, .testimonial-grid, .pricing-table, .brand-grid, .blog-list, .about-quality, .team-grid, .splash-hover-control"
      ).mouseenter(function () {
        var self = this;
        setTimeout(function () {
          $(
            ".services-grid.active, .counterup-progress.active, .testimonial-grid.active, .pricing-table.active, .brand-grid.active, .blog-list.active, .about-quality.active, .team-grid.active, .splash-hover-control.active"
          ).removeClass("active");
          $(self).addClass("active");
        }, 0);
      });
    },

    onePageTopFixed: function () {
      if ($(".onepagefixed").length) {
        var fixedElem = $(".onepagefixed"),
          distance = fixedElem.offset().top - 100,
          $window = $(window),
          totalDistance =
            $(".service-scroll-navigation-area").outerHeight() + distance;

        $(window).on("scroll", function () {
          if ($window.scrollTop() >= distance) {
            fixedElem.css({
              position: "fixed",
              left: "0",
              right: "0",
              top: "0",
              zIndex: "5",
            });
          } else {
            fixedElem.removeAttr("style");
          }

          if ($window.scrollTop() >= totalDistance) {
            fixedElem.removeAttr("style");
          }
        });
      }
    },

    blogModalActivation: function () {
      var modalBox = $(".op-blog-modal");
      var blogList = $(".blog-list");
      var modalClose = modalBox.find(".close");

      if ($("body").hasClass("onepage-template")) {
        blogList.each(function () {
          var $this = $(this);
          var buttons = $this.find(".post-thumbnail a, .title a, .more-btn");
          var mainImg = $this.find(".modal-thumb");
          var title = $this.find(".title");
          var paragraph = $this.find(".post-content p");
          var socialShare = $this.find(".blog-share");

          buttons.on("click", function (e) {
            $("body").addClass("op-modal-open");
            modalBox.addClass("open");
            mainImg.clone().appendTo(".op-modal-content .post-thumbnail");
            title.clone().appendTo(".op-modal-content .post-content");
            paragraph.clone().appendTo(".op-modal-content .post-content");
            socialShare.clone().appendTo(".op-modal-content .post-content");
            e.preventDefault();
          });
        });

        modalClose.on("click", function (e) {
          $("body").removeClass("op-modal-open");
          modalBox.removeClass("open");
          modalBox.find(".op-modal-content .post-content").html("");
          modalBox.find(".op-modal-content .post-thumbnail").html("");
          e.preventDefault();
        });

        $("#onepagenav li a").on("click", function () {
          var popupMenuWrap = $(
            "#mobilemenu-popup .mobile-menu-close, .header-offcanvasmenu .btn-close"
          );
          if (
            $("#mobilemenu-popup, .header-offcanvasmenu").hasClass("offcanvas")
          ) {
            popupMenuWrap.trigger("click");
          }
        });
      }
    },
  };
  axilInit.i();
})(window, document, jQuery);
