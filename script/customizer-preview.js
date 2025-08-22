// your-theme-name/js/customizer-preview.js

(function ($) {
  // Hero Title
  wp.customize("hero_title", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-title").text(newval);
    });
  });

  // Hero Subtitle
  wp.customize("hero_subtitle", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-subtitle").text(newval);
    });
  });

  // Hero Button Text
  wp.customize("hero_button_text", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-button").text(newval);
    });
  });

  // Hero Button URL
  wp.customize("hero_button_url", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-button").attr("href", newval);
    });
  });

  // Hero Title Color
  wp.customize("hero_title_color", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-title").css("color", newval);
    });
  });

  // Hero Subtitle Color
  wp.customize("hero_subtitle_color", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-subtitle").css("color", newval);
    });
  });

  // Hero Button Background Color
  wp.customize("hero_button_bg_color", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-button").css("background-color", newval);
    });
  });

  // Hero Button Text Color
  wp.customize("hero_button_text_color", function (value) {
    value.bind(function (newval) {
      $(".hero-content .hero-button").css("color", newval);
    });
  });

  // Footer Copyright Text
  wp.customize("footer_copyright_text", function (value) {
    value.bind(function (newval) {
      // Adjust selector if your footer structure differs
      $("footer .footer-content p:first-child").text(newval);
    });
  });

  // Footer Address
  wp.customize("footer_address", function (value) {
    value.bind(function (newval) {
      // Adjust selector if your footer structure differs
      $("footer .footer-content address").html(newval.replace(/\n/g, "<br>"));
    });
  });

  // Footer Email
  wp.customize("footer_email", function (value) {
    value.bind(function (newval) {
      // Adjust selector if your footer structure differs
      $('footer .footer-content a[href^="mailto:"]')
        .attr("href", "mailto:" + newval)
        .text(newval);
    });
  });

  // Footer Social Label
  wp.customize("footer_social_label", function (value) {
    value.bind(function (newval) {
      // Assuming the label is in a <p> within .footer-social
      $("footer .footer-social p").text(newval);
    });
  });

  // Footer Social Icon Color (this might need special handling for SVGbox to update live without refresh)
  // For SVGbox, the color is embedded in the URL. Live previewing this specific change
  // would require re-generating the image source, which JS cannot easily do on the fly
  // without more complex logic (like an AJAX call or full refresh).
  // The current setup uses 'refresh' for image settings and will refresh the preview.
  // For general CSS color properties, the postMessage works great.
  // If you need truly live preview for SVGbox colors, it's more involved.
  // For this assignment, a refresh on image/SVG URL changes is often acceptable.
  wp.customize("footer_social_icon_color", function (value) {
    value.bind(function (newval) {
      // This is complex for SVGbox as it requires modifying the image src.
      // For the purpose of the assignment, the 'refresh' transport would typically handle this
      // for image-based color changes. If you had CSS-based icons, you could do:
      // $('footer .sociaux img').css('fill', newval); // if using SVG directly in HTML and fill property
      // As your icons are imgs from svgbox, a full refresh is likely the simplest for live update.
      // For postMessage, you'd need to reconstruct the image src, which is beyond simple CSS property updates.
    });
  });
})(jQuery);
