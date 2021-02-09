(function ($) {
  $(".menu_btn").on("click", function () {
    $(".menu_layout").toggle();
    $(".menu").toggle();
    $("body").toggleClass("overflow");
  });
  $(".menu_layout").on("click", function () {
    $(".menu_layout").toggle();
    $(".menu").toggle();
    $("body").toggleClass("overflow");
  });

  $(".js-more").on("click", function () {
    $("html, body").animate({
      scrollTop: $("#js-more").offset().top,
    });
    return false;
  });

  if (!String.prototype.getDecimals) {
    String.prototype.getDecimals = function () {
      var num = this,
        match = ("" + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
      if (!match) {
        return 0;
      }
      return Math.max(
        0,
        (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0)
      );
    };
  }
  // Кнопки количества "plus" , "minus"
  $(document.body).on("click", ".plus, .minus", function () {
    var $qty = $(this).closest(".quantity").find(".qty"),
      currentVal = parseFloat($qty.val()),
      max = parseFloat($qty.attr("max")),
      min = parseFloat($qty.attr("min")),
      step = $qty.attr("step");

    // Format values
    if (!currentVal || currentVal === "" || currentVal === "NaN")
      currentVal = 0;
    if (max === "" || max === "NaN") max = "";
    if (min === "" || min === "NaN") min = 0;
    if (
      step === "any" ||
      step === "" ||
      step === undefined ||
      parseFloat(step) === "NaN"
    )
      step = 1;

    // Change the value
    if ($(this).is(".plus")) {
      if (max && currentVal >= max) {
        $qty.val(max);
      } else {
        $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
      }
    } else {
      if (min && currentVal <= min) {
        $qty.val(min);
      } else if (currentVal > 0) {
        $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
      }
    }

    // Trigger change event
    $qty.trigger("change");
    $('button[name="update_cart"]').trigger("click");
  });

  //Display quantity field
  $(".co2-quantity-wrapper label").each(function () {
    $(this).on("click", function () {
      let tab = $(this).attr("data-tab");
      $(".co2-quantity-wrapper .buy_from_choose_item").each(function () {
        $(this).removeClass("active");
      });
      $(this).parent().addClass("active");
      $(".quantity_method .co2-display-wrapper .buy_from_count").each(
        function () {
          $(this).hide();
        }
      );
      $("#" + tab).css("display", "flex");
    });
  });

  $(".quantity .price").on("change", function () {
    let quantity = Math.floor(jQuery(this).val() / product_price);
    let value = jQuery(this)
      .parents(".co2-display-wrapper")
      .siblings(".buy_from_choose")
      .find("#co2-manual")
      .val(quantity);

    let field_quantity = jQuery(this)
      .parents(".buy_from_count_tons")
      .siblings(".buy_from_count_tons")
      .find("span");

    field_quantity.html(quantity);
  });

  //Display price field

  $(".co2-price-wrapper label").each(function () {
    $(this).on("click", function () {
      let tab = $(this).attr("data-tab");
      $(".co2-price-wrapper .buy_from_choose_item").each(function () {
        $(this).removeClass("active");
      });
      $(this).parent().addClass("active");
      $(".price_method .co2-display-wrapper .buy_from_count").each(function () {
        $(this).hide();
      });
      $("#" + tab).css("display", "flex");
    });
  });

  $(".quantity .quantity").on("change", function () {
    let price = parseInt(jQuery(this).val() * product_price_2);
    let value = jQuery(this)
      .parents(".co2-display-wrapper")
      .siblings(".buy_from_choose")
      .find("#co2-manual-price")
      .val(jQuery(this).val());

    let field_quantity = jQuery(this)
      .parents(".buy_from_count_tons")
      .siblings(".buy_from_count_tons")
      .find("bdi");

    field_quantity.html(field_quantity.html().replace(/\d+/g, price));
  });

  // jQuery('.co2-quantity-label').on('click', function() {
  // 	let checkbox = $(this).siblings();
  // })
  // $("#clickme").click(function() {
  // 	$("#book").animate({
  // 		width: ["toggle", "swing"],
  // 		height: ["toggle", "swing"],
  // 		opacity: "toggle"
  // 	}, 5000, "linear", function() {
  // 		$(this).after("<div>Animation complete.</div>");
  // 	});
  // });

  // jQuery(".co2-quantity-wrapper label").each(function () {
  //   $(this).on("click", function () {
  //     let is_manual = $(this).is(".co2-manual-label");
  //     let is_quantity_field = $(this).is(".co2-quantity-label");
  //     if (is_quantity_field) {
  //       $.ajax({
  //         url: wc_add_to_cart_params.ajax_url,
  //         type: "POST",
  //         data: {
  //           action: "detect_method",
  //           method: "quantity_field",
  //         },
  //       })
  //         .then((res) => {
  //           console.log(res);
  //           $(".co2-display-method").html(res.html);
  //         })
  //         .fail((err) => {
  //           console.log(err.message);
  //         });
  //     } else if (is_manual) {
  //       $.ajax({
  //         url: wc_add_to_cart_params.ajax_url,
  //         type: "POST",
  //         data: {
  //           action: "detect_method",
  //           method: "manual",
  //         },
  //       })
  //         .then((res) => {
  //           console.log(res);
  //           $(".co2-display-method").html(res.html);
  //         })
  //         .fail((err) => {
  //           console.log(err.message);
  //         });
  //     } else {
  //       return false;
  //     }
  //   });
  // });

  jQuery(".lp_one_screen_slides").slick({
    dots: false,
    infinite: true,
    arrows: false,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 3000,
  });

  jQuery(".lp_one_screen_slides").on(
    "beforeChange",
    function (event, slick, currentSlide, nextSlide) {
      resetProgressBar();
    }
  );
  jQuery(".lp_one_screen_slides").on(
    "afterChange",
    function (event, slick, currentSlide, nextSlide) {
      jQuery(".lp_one_screen_slider_info_slide_num").text(
        "0" + (currentSlide + 1) + " — " + "0" + slick.slideCount
      );
      startProgressBar();
    }
  );
  jQuery(".lp_one_screen_slides").on("init reInit", function (event, slick) {
    startProgressBar();
    jQuery(".lp_one_screen_slider_info_slide_num").text(
      "0" + 1 + " — " + "0" + slick.slideCount
    );
  });

  function startProgressBar() {
    jQuery(".lp_one_screen_slider_line_track").css({
      width: "100%",
      transition: "width 3000ms",
    });
  }

  function resetProgressBar() {
    jQuery(".lp_one_screen_slider_line_track").css({
      width: "0%",
      transition: "width 0ms",
    });
  }

  $(".lp_slider").slick({
    autoplay: true,
    autoplaySpeed: 2000,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: "0px",
    variableWidth: true,
    arrows: false,
    draggable: true,
  });

  //Quiz
  document.addEventListener("DOMContentLoaded", function (event) {
    function checkForHeight() {
      let heightQuizForm = $(".quiz_step.shown").outerHeight();
      let heightButton = $(".quiz_right_btn_wrap").outerHeight();

      let formQuiz = $(".form-quiz");
      formQuiz.height(heightQuizForm + heightButton - 48);
    }
    checkForHeight();

    function currentStep() {
      for (let i = 0; i < $(".quiz_step").length + 1; i++) {
        if ($(`.quiz_step_${i}`).is(".shown")) {
          console.log(i);
          return i;
        }
      }
    }

    function lastStep() {
      return $(".quiz_step").length;
    }

    let currentQuizStep = currentStep();
    // console.log(currentQuizStep);

    function headerProgress() {
      let items = lastStep();
      let currentItem = currentStep();
      let step = 100 / items;
      let persantages = step * currentItem + "%";
      // console.log(step, currentItem, persantages);
      $(".quiz_right_header_progress").find("span").animate(
        {
          width: persantages,
          opacity: "swing",
        },
        1000,
        "swing"
      );
      //Question
      $(".quiz_right_header_num").find("span").html(currentItem);
    }
    headerProgress();

    $(".quiz_right_btn").on("click", function () {
      // $(".quiz_step.shown").next().addClass('shown');
      // let heightQuizForm = $(".quiz_step.shown").outerHeight();
      // formQuiz.height(heightQuizForm);
      currentQuizStep++;
      $(".quiz_step").each(function () {
        $(this).removeClass("shown");
      });

      $(`.quiz_step_${currentQuizStep}`).addClass("shown");

      checkForHeight();
      headerProgress();
      if (currentQuizStep == lastStep()) {
        $(this).parent().addClass("display_result_button");
      }
    });
  });
  ///Change project attr on quiz result page
  $(".quiz_result_projects input").on("change", function () {
    let prod_id = $(this).attr("data-id");
    $(".quiz_result_btn").attr("data-product_id", prod_id);
    let add_to_cart_url = new URLSearchParams();
    add_to_cart_url.set("add_to_cart", prod_id);
    $(".quiz_result_btn").attr("href", "?" + add_to_cart_url.toString());
  });

  ///
  $(document.body).on("added_to_cart", function () {
    window.location.href = CO2.cart_url;
  });
})(jQuery);
