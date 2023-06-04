function initPage() {
  bsCustomFileInput.init();
  $(".select2").select2({
    theme: "bootstrap4",
  });

  if ($("select.select2").length) {
    $.each($("select.select2"), function () {
      var opt = {
        width: "100%",
        theme: "bootstrap4",
      };

      if (
        typeof $(this).data("search") != "undefined" &&
        $(this).data("search") == false
      ) {
        opt = $.extend(true, opt, { minimumResultsForSearch: -1 });
      }
      $(this).select2(opt);
    });
  }

  $('[data-toggle="tooltip"]').tooltip();

  $(".cb-dynamic-label input[type=checkbox]").on("change", function () {
    cbCustomInput(this);
  });

  if ($(".cb-dynamic-label input[type=checkbox]").length > 0) {
    $.each($(".cb-dynamic-label input[type=checkbox]"), function () {
      cbCustomInput(this);
    });
  }
}

function initDatatableTools(table_id, oTable) {
  var header_id = $('[data-table="#' + $(table_id).attr("id") + '"]');
  var $form_filter = $(table_id).attr("data-table-filter");

  $($form_filter).on("submit", function (e) {
    e.preventDefault();
    oTable.reload();
  });

  $(".filter-select", $($form_filter)).on("change", function (event) {
    event.preventDefault();

    var $auto_filter = $(table_id).attr("data-auto-filter");
    if ($auto_filter == "true") {
      oTable.reload();
    }
  });

  $('a[href="#btn-checked-all"], a[href="#btn-unchecked-all"]', table_id).on(
    "click",
    function () {
      var id = $(this).attr("href");
      if (id == "#btn-checked-all") {
        $(".dt-checkbox", table_id).prop("checked", true);
      } else {
        $(".dt-checkbox", table_id).prop("checked", false);
      }
      return false;
    }
  );

  $(".btn-delete-selected", table_id).on("click", function () {
    var id = [];

    $.each($(".dt-checkbox", table_id), function () {
      if ($(this).is(":checked")) {
        id.push($(this).val());
      }
    });

    if (id.length > 0) {
      $(this)
        .myAjax({
          data: {
            id: id,
          },
          success: function (data) {
            oTable.reload();
          },
        })
        .delete({
          confirm: {
            text: __("helpers.common.multiple_delete", { total: id.length }),
          },
        });
    } else {
      command: toastr["warning"](__("helpers.common.nf_cb_selected"));
    }

    return false;
  });

  $(".auto_filter", header_id).on("switchChange.bootstrapSwitch", function (
    event,
    state
  ) {
    $("table#main-table").attr(
      "data-auto-filter",
      $(this).is(":checked") ? "true" : "false"
    );
  });

  $(".reload-table", header_id).on("click", function () {
    oTable.reload();
    return false;
  });

  $(".reset-filter", header_id).on("click", function () {
    oTable.filterReset();
    return false;
  });
}

function initModalAjax(selector) {
  var selector_triger =
    typeof selector !== "undefined" ? selector : '[data-toggle="modal"]';
  $(selector_triger).on("click", function (e) {
    /* Parameters */
    var url = $(this).attr("href");
    let containerTarget = $(this).attr("data-target");
    let form = $(this).attr("data-form");
    let data = $(form).serialize();

    if (url.indexOf("#") == 0) {
      $(containerTarget).modal();
    } else {
      /* XHR */
      var loading =
        '<div class="text-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>';

      $(containerTarget).modal();
      $(".modal-content", $(containerTarget))
        .html(loading)
        .load(url, data, function () {});
    }
    return false;
  });
}

function initDatatableAction(table_id, callback) {
  $(".btn-delete", table_id).on("click", function () {
    $(this)
      .myAjax({
        waitMe: "body",
        success: function (data) {
          callback();
        },
      })
      .delete();

    return false;
  });
}
