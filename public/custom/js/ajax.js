$(document).ready(function () {
  // Menggunakan AJAX untuk memuat isi file form.blade.php
  $.ajax({
    url: "{{ asset('Pages/Menu/form.blade.php') }}", // Ganti dengan path yang sesuai ke file form.blade.php
    type: "GET",
    success: function (response) {
      $("#modal-content").html(response);
    },
    error: function (xhr) {
      console.log(xhr.responseText);
    },
  });
});
