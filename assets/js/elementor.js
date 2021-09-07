(function($, elementor) {
  "use strict";

  var Kinter = {
    init: function init() {
      var widgets = {
        "kinter-icon-box.default": Kinter.Icon_Box,
        "kinter-trainer.default": Kinter.Trainer_Slider,
        "kinter-bmi-calculator.default": Kinter.BMI_Calculator
      };

      $.each(widgets, function(widget, callback) {
        elementor.hooks.addAction("frontend/element_ready/" + widget, callback);
      });

      elementor.hooks.addAction(
        "frontend/element_ready/global",
        Kinter.GlobalCallback
      );
    },
    Icon_Box: function($scope) {
      if ($scope.find(".xs-svg").length > 0) {
        $scope.find(".xs-svg").each(function() {
          var content = $(this).data();
          var vivus = new Vivus($(this)[0], {
            file: content.svg,
            duration: 200,
            type: "sync",
            start: "autostart",
            animTimingFunction: Vivus.EASE_OUT,
            forceRender: false,
            dashGap: 200
          });
          if (content.hover) {
            $(content.hover).hover(
              function() {
                vivus
                  .stop()
                  .reset()
                  .play(2);
              },
              function() {
                vivus.finish();
              }
            );
          }
        });
      }
    },
    Trainer_Slider: function($scope) {
      let target = $scope.find(".trainer_slider_carousel"),
        spaceBetween = target.data("space-between"),
        autoplay = target.data("autoplay"),
        respoonsive_seetings = target.data("responsive-settings");

      new Swiper(target, {
        spaceBetween: spaceBetween && Number(spaceBetween),
        slidesPerView:
          respoonsive_seetings &&
          Number(respoonsive_seetings["trainer_columns_mobile"]),
        autoplay: autoplay && autoplay,
        navigation: {
          nextEl: $scope.find(".trainer-button-next"),
          prevEl: $scope.find(".trainer-button-prev")
        },
        breakpointsInverse: true,
        breakpoints: {
          640: {
            slidesPerView:
              respoonsive_seetings &&
              Number(respoonsive_seetings["trainer_columns_mobile"]),
            spaceBetween: spaceBetween && Number(spaceBetween)
          },
          768: {
            slidesPerView:
              respoonsive_seetings &&
              Number(respoonsive_seetings["trainer_columns_tablet"]),
            spaceBetween: spaceBetween && Number(spaceBetween)
          },
          1024: {
            slidesPerView:
              respoonsive_seetings &&
              Number(respoonsive_seetings["trainer_columns_desktop"]),
            spaceBetween: spaceBetween && Number(spaceBetween)
          }
        }
      });
    },
    BMI_Calculator: function($scope) {
      function convertHeight(cm) {
        return cm / 100;
      }

      let form = $scope.find(".xs-form");
      form.on("submit", function(e) {
        e.preventDefault();

        let result = $scope.find(".xs-bmi-info"),
          weight = $scope.find(".bmi_calculator_weight").val(),
          height = $scope.find(".bmi_calculator_height").val();

        result.fadeOut();

        if (height !== "" && weight !== "") {
          let bmi = parseFloat(weight / (height * height)).toFixed(2);
          height = convertHeight(height);

          if (bmi > 25) {
            result
              .html(
                '<div class="xs-icon bg-warning"><i class="fas fa-thumbs-down"></i></div><p> <span class="text-warning"><strong>Oops! You are Overweight.</strong></span> Your BMI is: ' +
                  bmi +
                  " </p>"
              )
              .fadeIn();
          } else if (bmi < 18.5) {
            result
              .html(
                '<div class="xs-icon bg-info"><i class="fas fa-thumbs-down"></i></div><p> <span class="text-info"><strong>Oops! You are Underweight.</strong></span> Your BMI is: ' +
                  bmi +
                  " </p>"
              )
              .fadeIn();
          } else {
            result
              .html(
                '<div class="xs-icon xs-green-bg"><i class="fas fa-thumbs-up"></i></div><p> <span class="xs-green-color"><strong>Nice! You are healthy.</strong></span> Your BMI is: ' +
                  bmi +
                  " </p>"
              )
              .fadeIn();
          }
        }
      });
    }
  };

  $(window).on("elementor/frontend/init", Kinter.init);
})(jQuery, window.elementorFrontend);
