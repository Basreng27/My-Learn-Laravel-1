//REMOTE MODAL
function initModalAjax(selector) {
  console.log("msk");
  return;
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
