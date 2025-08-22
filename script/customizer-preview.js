(function ($) {
  wp.customize("hero_title", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-title").text(newval);
    });
  });

  wp.customize("hero_subtitle", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-subtitle").text(newval);
    });
  });

  wp.customize("hero_button_text", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-button").text(newval);
    });
  });

  wp.customize("hero_button_url", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-button").attr("href", newval);
    });
  });

  wp.customize("hero_title_color", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-title").css("color", newval);
    });
  });

  wp.customize("hero_subtitle_color", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-subtitle").css("color", newval);
    });
  });

  wp.customize("hero_button_bg_color", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-button").css("background-color", newval);
    });
  });

  wp.customize("hero_button_text_color", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-button").css("color", newval);
    });
  });

  wp.customize("footer_copyright_text", function (value) {
    value.bind(function (newval) {
      $("footer .footer-content p:first-child").text(newval);
    });
  });

  wp.customize("footer_address", function (value) {
    value.bind(function (newval) {
      $("footer .footer-content address").html(newval.replace(/\n/g, "<br>"));
    });
  });

  wp.customize("footer_email", function (value) {
    value.bind(function (newval) {
      $('footer .footer-content a[href^="mailto:"]')
        .attr("href", "mailto:" + newval)
        .text(newval);
    });
  });

  wp.customize("footer_social_label", function (value) {
    value.bind(function (newval) {
      $("footer .footer-social p").text(newval);
    });
  });

  wp.customize("footer_social_icon_color", function (value) {
    value.bind(function (newval) {
    });
  });
})(jQuery);
