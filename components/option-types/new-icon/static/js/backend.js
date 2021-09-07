jQuery(function($) {
  var optionTypeClass = ".dms-option-type-new-icon";

  dmsEvents.on("dms:options:init", function(data) {
    var $options = data.$elements.find(optionTypeClass + ":not(.initialized)");

    // handle click on an icon
    $options.find(".js-option-type-new-icon-item").on("click", function() {
      var $this = $(this);

      if ($this.hasClass("active")) {
        $this.removeClass("active");
        $this
          .closest(optionTypeClass)
          .find("input")
          .val("")
          .trigger("change");
      } else {
        $this
          .addClass("active")
          .siblings()
          .removeClass("active");
        $this
          .closest(optionTypeClass)
          .find("input")
          .val($this.data("value"))
          .trigger("change");
      }
    });

    // show current icon
    $dms_current_icon = $options.find(".dms-show-current");
    $dms_current_class = $options
      .find(".js-option-type-new-icon-item.active")
      .data("value");
    $dms_current_icon.addClass($dms_current_class).css("display", "block");

    // search for icon
    $options.find(".dms-icon-search").keyup(function() {
      var filter = $(this).val();

      $options.find(".js-option-type-new-icon-item").each(function() {
        if (
          $(this)
            .data("value")
            .search(new RegExp(filter, "i")) > 0
        ) {
          $(this).insertBefore(
            $(this)
              .parent()
              .find("i")
              .eq(0)
          );
          $(this).css("display", "block");
        }
      });
    });

    // show clicked icon class in search and current
    $options.find(".js-option-type-new-icon-item").on("click", function() {
      var faclass = $(this).data("value");
      $options.find(".dms-icon-search").val(faclass);
      $dms_current_icon
        .removeClass()
        .addClass(faclass)
        .css("display", "block");
    });

    // handle changing active category
    $options
      .find(".js-option-type-new-icon-dropdown")
      .on("change", function() {
        var $this = $(this);
        var group = $this.val();

        $this
          .closest(optionTypeClass)
          .find(".js-option-type-new-icon-item")
          .each(function() {
            $(this).toggle(group == "all" || group == $(this).data("group"));
          });
      })
      .trigger("change");

    $options.addClass("initialized");
  });
});
